<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //logika untuk register 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required |email|unique:users',
            'password' => 'required | min:8',
        ]);
        //logika perbanddingan yang digunakan jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        //logika pengembalian data jika user berhasil  register
        if($user){
            return response()->json([
                'success' => true,
                'data' => $user,
            ], 201);
        }

    }
}
