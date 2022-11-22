<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function getLogin()
    {
        return view('admin.auth.login');
    }

    function postLogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth()->guard('admin')->attempt($credentials))
            return redirect()->route('admin.dashboard');

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}