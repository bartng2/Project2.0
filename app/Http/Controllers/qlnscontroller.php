<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\nhansu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Resources\data as dataresource;

class qlnscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $nhansu = nhansu::all();

        return response()->json($nhansu);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
            $nameavatar = Str::random(32).".".$request->Avatar->getClientOriginalExtension();
     
            // Create Product
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

            return response()->json($nhansu);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
        return response()->json($nhansu);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $model = nhansu::find($id);

        if (!$model) {
            return response()->json(['message' => 'Nhân viên không tồn tại'], 404);
        }

        return response()->json($model, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Find product
            $nhansu = nhansu::find($id);
            if(!$nhansu){
              return response()->json([
                'message'=>'Không tìm thấy nhân viên.'
              ],404);
            }
     
            $nhansu->MaNv = $request->MaNv;
            $nhansu->HoTen = $request->HoTen;
            $nhansu->NgaySinh = $request->NgaySinh;
            $nhansu->GioiTinh = $request->GioiTinh;
            $nhansu->ChucVu = $request->ChucVu;
     
            if($request->hasFile('Avatar') && $request->file('Avatar')->isValid()) {
                // Public storage
                $storage = Storage::disk('public');
     
                // Old iamge delete
                if($storage->exists($nhansu->Avatar))
                    $storage->delete($nhansu->Avatar);
     
                // Image name
                $avatarname = Str::random(32).".".$request->Avatar->getClientOriginalExtension();
                $nhansu->Avatar = $avatarname;
     
                // Image save in public folder
                $storage->put($avatarname, file_get_contents($request->Avatar));
            }
     
            // Update Product
            $nhansu->save();
     
            // Return Json Response
            return response()->json([
                'message' => "nhân viên đã được cập nhật."],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Lỗi"],500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storage = Storage::disk('public');
        $nhansu = nhansu::findOrFail($id);
        // Iamge delete
        if($storage->exists($nhansu->Avatar)){
             // Public storage
            $storage->delete($nhansu->Avatar);
        }
          // Detail
        $nhansu = nhansu::destroy($id);
        return response()->json($nhansu, 200);
    }

    public function search(Request $request)
{
        $keyword = $request->input('keyword');

        $nhansu = nhansu::where('MaNv', 'LIKE', '%' . $keyword . '%')
            ->orWhere('HoTen', 'LIKE', '%' . $keyword . '%')
            ->orWhere('ChucVu', 'LIKE', '%' . $keyword . '%')
            ->get();

        return response()->json($nhansu, 200);
}
}

