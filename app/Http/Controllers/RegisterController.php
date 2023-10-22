<?php

namespace App\Http\Controllers;

use App\Models\UserAccounts;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email'  => 'required',
            'password' => 'required',
        ]);

        $registeruser = [
            'email'  => $request->email,
            'password' => $request->password,
        ];

        UserAccounts::create($registeruser);

        return response()->json(['message' => 'Berhasil Register'], 201);
    }
}
