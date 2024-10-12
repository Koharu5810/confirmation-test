{{-- ユーザ登録ページ --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('button')
    <button class="hedaer_button">register</button>
@endsection

@section('content')

<div>
    <div>
        <h3 calss="content-title">Register</h3>
    </div>

    <div class="form-container">
        <form action="" class="register-form">
            @csrf
{{-- お名前 --}}
            <div class="register-form__group">
                <div class="register-form__label">
                    <label class="register-form__label--item" for="register_name">お名前</label>
                </div>
                <div class="regiser-form__content">
                    <input type="text" name="register_name" placeholder="例:山田　太郎" value="{{ old('register_name') }}">
                </div>
                <div class="register-form__error">
                    @error('register_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            @csrf
{{-- メールアドレス --}}
            <div class="register-form__group">
                <div class="register-form__label">
                    <label class="register-form__label--item" for="register_email">メールアドレス</label>
                </div>
                <div class="regiser-form__content">
                    <input type="text" name="register_email" placeholder="例:test@example.com" value="{{ old('register_email') }}">
                </div>
                <div class="register-form__error">
                    @error('register_email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            @csrf
{{-- パスワード --}}
            <div class="register-form__group">
                <div class="register-form__label">
                    <label class="register-form__label--item" for="register_password">お名前</label>
                </div>
                <div class="regiser-form__content">
                    <input type="text" name="register_password" placeholder="例:coachtech1106" value="{{ old('register_password') }}">
                </div>
                <div class="register-form__error">
                    @error('register_password')
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
