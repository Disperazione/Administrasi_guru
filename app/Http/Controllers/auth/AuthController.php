<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
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

    public function PostLogin(UserRequest $request)
    {
        $request->validated();
        $rememberme = ($request->rememberme) ? true : false;
        if(Auth::attempt(['name' => $request, 'password' => $request->password], $rememberme)){
            if (Auth::user()->role === 'admin' or Auth::user()->role === 'guru') {
                session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success','anda berhasil login');
            }
        }else {
            return redirect('/login')->withErrors(['username' => 'Wrong username or password','password' => 'Wrong username or password']);
        }
    }

    public function logout(Request $request)
    {
        session()->flush();
        Auth::logout();
        return response()->json($data = 'berhasil');;
    }
}
