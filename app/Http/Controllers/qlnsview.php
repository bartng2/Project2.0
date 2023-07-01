<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use App\Models\nhansu;

class qlnsview extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost/qlns_n2/public/api/qlns');
        $nhansu = $response->json();

        return view('home.layout', compact('nhansu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
         if ($request->hasFile('Avatar') && $request->file('Avatar')->isValid()) {
            $nameavatar = Str::random(32) . "." . $request->Avatar->getClientOriginalExtension();

            // Create Nhansu
            $nhansu = nhansu::create([
                'MaNv' => $request->MaNv,
                'HoTen' => $request->HoTen,
                'NgaySinh' => $request->NgaySinh,
                'GioiTinh' => $request->GioiTinh,
                'ChucVu' => $request->ChucVu,
                'Avatar' => $nameavatar,
            ]);

            // Save Image in Storage folder
            Storage::disk('public')->put($nameavatar, file_get_contents($request->Avatar));

            // Generate the URL for the API endpoint
            $apiUrl = 'http://localhost/qlns_n2/public/api/qlns';

            // Send a cURL request to the API endpoint
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, [
                'MaNv' => $request->MaNv,
                'HoTen' => $request->HoTen,
                'NgaySinh' => $request->NgaySinh,
                'GioiTinh' => $request->GioiTinh,
                'ChucVu' => $request->ChucVu,
                'Avatar' => $nameavatar,
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            return redirect()->route('qlns.index')->with('Thành công', 'Cập nhật nhân viên thành công.');
        }else{
            return response()->json([
                'message' => "Invalid or missing 'Avatar' file."
            ], 400);
        }
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went wrong!"
            ], 500);
        }
        }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get("http://localhost/qlns_n2/public/api/qlns/{$id}");
        $show = $response->json();

        return view('home.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get('http://localhost/qlns_n2/public/api/qlns/' . $id);
        $edit = $response->json();

        return view('home.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         try {
        // Tìm nhân viên
        $nhansu = nhansu::find($id);
        if (!$nhansu) {
            return response()->json([
                'message' => 'Nhân viên không tồn tại.'
            ], 404);
        }

        // Cập nhật thông tin
        $nhansu->MaNv = $request->MaNv;
        $nhansu->HoTen = $request->HoTen;
        $nhansu->NgaySinh = $request->NgaySinh;
        $nhansu->GioiTinh = $request->GioiTinh;
        $nhansu->ChucVu = $request->ChucVu;

        if ($request->hasFile('Avatar') && $request->file('Avatar')->isValid()) {
            // Xóa ảnh cũ
            if (Storage::disk('public')->exists($nhansu->Avatar)) {
                Storage::disk('public')->delete($nhansu->Avatar);
            }

            // Lưu ảnh mới
            $nameavatar = Str::random(32) . "." . $request->Avatar->getClientOriginalExtension();
            $nhansu->Avatar = $nameavatar;
            Storage::disk('public')->put($nameavatar, file_get_contents($request->Avatar));
        }

        // Lưu thông tin cập nhật
        $nhansu->save();

        // Tạo yêu cầu HTTP tới API endpoint
        $apiUrl = 'http://localhost/qlns_n2/public/api/qlns/' . $id;
        $response = Http::put($apiUrl, $nhansu->toArray());

        // Kiểm tra phản hồi từ API
        if ($response->successful()) {
            return redirect()->route('qlns.index');
        } else {
            return response()->json([
                'message' => 'Cập nhật nhân viên thất bại.'
            ], $response->status());
        }
    } catch (\Exception $e) {
        // Trả về JSON response khi có lỗi xảy ra
        return response()->json([
            'message' => 'Đã xảy ra lỗi.'
        ], 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost/qlns_n2/public/api/qlns/' . $id);
        return redirect()->route('qlns.index');
    }

    public function search(Request $request)
    {
         $keyword = $request->input('keyword');

        $response = Http::get('http://localhost/qlns_n2/public/api/qlns/search', [
            'keyword' => $keyword
        ]);

        $searchResults = $response->json();

        return view('home.searchindex', compact('searchResults', 'keyword'));
    }
}
