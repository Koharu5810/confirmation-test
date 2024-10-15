{{-- 管理画面 --}}
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    {{-- Bootstrap --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
@endsection

@section('button')
    <button class="header_button">logout</button>
@endsection

@section('title')
    Admin
@endsection

@section('content')
<div class="content-group">

{{-- 検索フォーム --}}
    <div class="search-group">
        <form class="search-form" action="/search" method="GET">
            @csrf
        {{-- 検索窓 --}}
            <input class="search-form__input" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください" />
        {{-- 性別 --}}
            <select class="search-form__select" name="gender">
                <option selected disabled>性別</option>
                @foreach($genders as $value => $label)
                    <option value="{{ $value }}" {{ request('gender') == $value}}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        {{-- お問い合わせの種類 --}}
            <select class="search-form__select" name="category_id">
                <option selected disabled>お問い合わせの種類</option>
                @foreach( $categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
        {{-- 年月日 --}}
            <input class="search-form__input" type="date" name="date" id="date" value="年/月/日">
        {{-- 検索ボタン --}}
            <button class="search-form__search-button" type="submit" name="submit">検索</button>
        {{-- リセットボタン --}}
            <button class="search-form__reset-button">
                <a href="{{ url('/admin') }}" name="reset">リセット</a>
            </button>
        </form>
    </div>

{{-- CSV・ページネーション --}}
    <div class="foruser-group">
        <button class="csv_button">エクスポート</button>
        <div class="paginate-group">
            {{ $contacts->links('vendor.pagination.user') }}
        </div>
    </div>

{{-- データ表示テーブル --}}
    <div class="admin-table">
        <table class="admin-table__inner">
            <thead>
                <tr class="admin-table__row">
                    <th class="admin-table__header">お名前</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせの種類</th>
                    <th class="admin-table__header"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__item">{{ $contact['last_name'] }}{{ $contact['first_name'] }}</td>
                    <td class="admin-table__item">{{ $contact['gender_text'] }}</td>
                    <td class="admin-table__item">{{ $contact['email'] }}</td>
                    <td class="admin-table__item">{{ $contact['content'] }}</td>
                    <td class="admin-table__item">
                        {{-- モーダル用詳細ボタン --}}
                        <button type="button" class="modal__open-button" wire:click="openModal({{ $contact['id'] }})">詳細</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
{{--
        <!-- モーダルウィンドウ -->
    @if($showModal)
    <div class="modal-wrapper">
        <div class="modal-window">
            <button wire:click="closeModal()" type="button" class="modal-close">×</button>
            <table class="modal__content">
                <tr class="modal-inner">
                    <th class="modal-ttl">お名前</th>
                    <td class="modal-data">
                        {{ $contact['last_name'] }} <span class="space"></span>
                        <span class="firstName">{{ $contact['first_name'] }}</span>
                    </td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">性別</th>
                    <td class="modal-data">{{ $contact['gender_text'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">メールアドレス</th>
                    <td class="modal-data">{{ $contact['email'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">電話番号</th>
                    <td class="modal-data">{{ $contact['tell'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">住所</th>
                    <td class="modal-data">{{ $contact['address'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">建物名</th>
                    <td class="modal-data">{{ $contact['building'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl">お問い合わせの種類</th>
                    <td class="modal-data">{{ $contact['category']['content'] }}</td>
                </tr>
                <tr class="modal-inner">
                    <th class="modal-ttl--last">お問い合わせ内容</th>
                    <td class="modal-data--last">{{ $contact['detail'] }}</td>
                </tr>
            </table>
            <form class="delete-form" action="/delete" method="post">
                @method('delete')
                @csrf
                <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                <button class="delete-btn">削除</button>
            </form>
        </div>
    </div>
    @endif --}}

    {{-- @livewire('modal') --}}

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
