<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class adcontroller extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

     public function loginpost(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password không lấy được.',
                ], 401);
            }


            $user = User::where('email', $request->email)->first();

            // Lưu thông tin người dùng vào session
            session(['user' => $user]);

            // Lưu cookie sau khi đăng nhập thành công
            $token = $user->createToken("API TOKEN")->plainTextToken;
            $cookie = cookie('api_token', $token, 60); // Thay số 60 bằng thời gian hết hạn của cookie (tính bằng phút)
            return view('home.layout');

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
