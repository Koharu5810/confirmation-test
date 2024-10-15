<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthenticatedSessionController extends Controller
{
    /**
     * ユーザーをログアウトします。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // ユーザーをログアウト
        Auth::logout();

        // セッションをクリア
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // リダイレクト先を指定
        return redirect('/login');
    }
}
