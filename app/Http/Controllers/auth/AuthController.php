<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Routing\Router;
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function PostLogin(Request $request)
    {
        $rememberme = ($request->rememberme) ? true : false;
        if(Auth::attempt(['name' => $request, 'password' => $request->password], $rememberme)){
            if (Auth::user()->role === 'admin' or Auth::user()->role === 'guru') {
                session()->regenerate();
                return redirect()->route('admin.dashboard')->with('anda berhasil login');
            }
        }else {
            return redirect('/')->with('username or password salah');
        }
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
