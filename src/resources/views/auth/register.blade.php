{{-- ユーザ登録ページ --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('button')
    <button class="hedaer_button">login</button>
@endsection

@section('content')

<div>
    <div>
        <h3 calss="content-title">Register</h3>
    </div>

    <div class="form-container">
        <form class="register-form" action="/register" method="post">
            @csrf
{{-- お名前 --}}
            <div class="register-form__group">
                <div class="register-form__label">
                    <label class="register-form__label--item" for="name">お名前</label>
                </div>
                <div class="register-form__content">
                    <input type="text" name="name" placeholder="例:山田  太郎" value="{{ old('name') }}">
                </div>
                <div class="register-form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
{{-- メールアドレス --}}
            <div class="register-form__group">
                <div class="register-form__label">
                    <label class="register-form__label--item" for="email">メールアドレス</label>
                </div>
                <div class="register-form__content">
                    <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                </div>
                <div class="register-form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
{{-- パスワード --}}
            <div class="register-form__group">
                <div class="register-form__label">
                    <label class="register-form__label--item" for="password">パスワード</label>
                </div>
                <div class="register-form__content">
                    <input type="password" name="password" placeholder="例:coachtech1106" value="{{ old('password') }}">
                </div>
                <div class="register-form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
{{-- 登録ボタン --}}
            <div class="register-form__button">
                <button class="register-form__button-submit">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection
