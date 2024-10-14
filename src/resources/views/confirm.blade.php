{{-- お問い合わせフォーム確認ページ --}}
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('title')
    Confirm
@endsection

@section('content')
<div class="confirm__content">
    <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
        {{-- お名前 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                        {{ $contact['last_name'] }}&nbsp;&nbsp;&nbsp;{{ $contact['first_name'] }}
                    </td>
                </tr>
        {{-- 性別 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                        {{ $contact['gender'] }}
                    </td>
                </tr>
        {{-- メールアドレス --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                        {{ $contact['email'] }}</td>
                </tr>
        {{-- 電話番号 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="email" value="{{ $contact['tell'] }}" />
                        {{ $contact['tell'] }}</td>
                </tr>
        {{-- 住所 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                        {{ $contact['address'] }}</td>
                </tr>
        {{-- 建物名 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                        {{ $contact['building'] }}</td>
                </tr>
        {{-- お問い合わせの種類 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}"  />
                        {{ $contact['category'] }}
                    </td>
                </tr>
        {{-- お問い合わせ内容 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                        {{ $contact['detail'] }}
                    </td>
                </tr>
            </table>
        </div>
        {{-- 送信・修正ボタン --}}
        <div class="form__button">
            <button class="form__button-submit">送信</button>
            <button class="form__button-correct" type="button" onclick="history.back()">修正</button>
        </div>
    </form>

@endsection
