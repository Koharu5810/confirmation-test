{{-- ログインページ --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('button')
    <button class="hedaer_button">
        <a href="/register">register</a>
    </button>
@endsection

@section('content')
<div>
    <div>
        <h3 calss="content-title">Login</h3>
    </div>

    <div class="form-container">
        <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
{{-- メールアドレス --}}
            <div class="login-form__group">
                <div class="login-form__label">
                    <label class="login-form__label--item" for="email">メールアドレス</label>
                </div>
                <div class="login-form__content">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                </div>
                <div class="login-form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
{{-- パスワード --}}
            <div class="login-form__group">
                <div class="login-form__label">
                    <label class="login-form__label--item" for="password">パスワード</label>
                </div>
                <div class="login-form__content">
                    <input type="password" name="password" placeholder="例:coachtech1106">
                </div>
                <div class="login-form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
{{-- 登録ボタン --}}
            <div class="login-form__button">
                <button class="login-form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection
