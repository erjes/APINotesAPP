<?php

namespace App\Http\Controllers;

use App\Models\UserAccounts;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'  => 'required',
            'password' => 'required',
        ]);

        $email   = $request->email;
        $password = $request->password;

        $user = UserAccounts::where('email', $email)->where('password', $password)->first();

        if ($user) {
            return response()->json(['message' => 'Berhasil Login'], 201);
        }
        else {
            return response()->json(['message' => 'Email atau Password Salah'], 401);
        }
    }
}
