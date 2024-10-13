<?php

namespace App\Http\Controllers;

// use App\Models\User;
use App\Models\Auth;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as AuthFacade;

class AuthController extends Controller
{
// 登録画面の表示
    public function register()
    {
        return view('auth/register');
    }
// 登録→データベースへ挿入
    public function store(AuthRequest $request)
    {
        $auth = $request->only(['name', 'email', 'password']);
        $auth['password'] = bcrypt($auth['password']);  // パスワードをハッシュ化（セキュリティ上の対応）
        Auth::create($auth);

        return redirect('admin');
    }

// ログインフォーム表示
    public function showLoginForm()
    {
        return view('auth/login');
    }
// ログイン→管理画面
    public function login(AuthRequest $request)
    {
        $admin_users = $request->only(['email', 'password']);

        // ID以外でDB検索
        $user = Auth::where('email', $admin_users['email'])->first();

        if ($user && Hash::check($admin_users['password'], $user->password)) {
            //ユーザをログインさせる
            Auth::login($user);

            //認証成功後管理画面へ
            return redirect()->route('admin');
        } else {
            // 認証失敗時ログイン画面にリダイレクト
            return redirect()->back();
        }
    }

}
