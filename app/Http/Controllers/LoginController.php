<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        if (Auth::check()) {
            return redirect()->route('developer.index');
        } else {
            return view('auth.login');
        }
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('developer.index')->with('success', 'Login Successfully');
        } else {
            return redirect()->back()->with('error', 'Wrong Credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');  
    }
}
