<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            session()->put('name', $user->name);

            return response()->json([
                'success' => true,
                'message' => 'Log In Success!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Data!'
            ]);
        }
    }

    public function out()
    {
        Auth::logout();
    }
}
