<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Fortify認証（認証されれば管理画面へ）
Route::middleware('auth')->group(function() {
    // ログイン画面→管理画面
    Route::get('/admin', [ContactController::class, 'admin'])->name('admin');
    // 管理画面での検索フォーム
    Route::get('/search', [ContactController::class, 'search'])->name('contacts.search');
    // ログアウト（Laravel標準でOK？）
    Route::post('/logout', [CustomAuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// お問い合わせフォーム
Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);

// 新規登録・ログイン画面
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
