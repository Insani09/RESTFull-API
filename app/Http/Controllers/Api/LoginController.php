<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
     public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        //logika perbandingan digunakan jika validasi yang user lakukan gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //logika jika user atau password salah
        $credentials = $request->only('email', 'password');
        if(!$token = auth()->guard('api')->attempt($credentials)) { //tanda ! berguna untuk logika kesalahan atau else pada operasi perbandingan.
            return response()->json([
                'success' => false,
                'message' => 'User atau password salah',
            ], 401);
        };
        //logika pengembalian data jika user berhasil login
        return response()->json([
            'success' => true,
            'message' => 'Login Berhasil',
            'user' => auth()->guard('api')->user(),
            'token' => $token,
        ], 200);
        
    }
}
