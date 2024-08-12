<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect('/dashboard')->with('sukses', 'Selamat Datang!');
        } else {
            return redirect()->back()->with('gagal', 'Username atau Password salah');
        }
    }
    function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}
