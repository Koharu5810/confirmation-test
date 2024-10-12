<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
    public function confirm(AuthRequest $request)
    {
        $auth = $request->only(['name', 'email', 'password']);
        return view('admin', ['auth' => $auth]);
    }

// 登録→データベースへ挿入
    public function store(AuthRequest $request)
    {
        $auth = $request->only(['name', 'email', 'password']);
        Auth::create($auth);

        return view('admin', ['auth' => $auth]);
    }

// ログイン→管理画面
    public function login()
    {
        return view('admin');
    }

}
