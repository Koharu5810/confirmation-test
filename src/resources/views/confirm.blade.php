{{-- お問い合わせフォーム確認ページ --}}
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')

<div>
    <div>
        <h3>Confirm</h3>
    </div>

    <form class="form" action="" method="">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
        {{-- お名前 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="text" name="" value="" readonly />
                    </td>
                </tr>
        {{-- 性別 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="text" name="gender" value="" readonly />
                    </td>
                </tr>
        {{-- メールアドレス --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="" readonly />
                    </td>
                </tr>
        {{-- 電話番号 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="tel" name="tell" value="" readonly />
                    </td>
                </tr>
        {{-- 住所 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="" readonly />
                    </td>
                </tr>
        {{-- 建物名 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="" readonly />
                    </td>
                </tr>
        {{-- お問い合わせの種類 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="text" name="content" value="" readonly />
                    </td>
                </tr>
        {{-- お問い合わせ内容 --}}
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="" readonly />
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit">送信</button>
            <button class="form__button-correct">修正</button>
        </div>
    </form>

@endsection
