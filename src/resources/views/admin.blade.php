{{-- 管理画面 --}}
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    {{-- Bootstrap --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
@endsection

@section('button')
    <button class="hedaer_button">logout</button>
@endsection

@section('content')
<div class="contet-group">
{{-- タイトル --}}
    <div>
        <h3 calss="content-title">Admin</h3>
    </div>

{{-- 検索フォーム --}}
    <div>
        <form action="/search" method="GET">
            @csrf
        {{-- 検索窓 --}}
            <input class="" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください" />
        {{-- 性別 --}}
            <select class="" name="gender">
                <option selected disabled>性別</option>
                @foreach($genders as $value => $label)
                    <option value="{{ $value }}" {{ request('gender') == $value}}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        {{-- お問い合わせの種類 --}}
            <select name="category_id">
                <option selected disabled>お問い合わせの種類</option>
                @foreach( $categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
        {{-- 年月日 --}}
            <input type="date" name="date" id="date" value="年/月/日">
        {{-- 検索ボタン --}}
            <button type="submit" name="submit">検索</button>
        {{-- リセットボタン --}}
            <a href="{{ url('/admin') }}" name="reset">リセット</a>
        </form>
    </div>

{{-- CSV・ページネーション --}}
    <div class="foruser-group">
        <div>
            <button class="csv_button">エクスポート</button>
        </div>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailModal" data-contact-id="{{ $contact['id'] }}">詳細</button>
                        {{-- モーダルウィンドウ --}}
                        {{-- @if($showModal) --}}
                        <div id="detailModal" class="modal" style="display: none;">
                            <div class="modal-content">
                                {{-- 閉じるボタン --}}
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
                                </div>
                                {{-- 詳細欄 --}}
                                <div class="modal-body">
                                    <table class="modal-group">
                                        <tr class="modal-row">
                                            <th class="modal-ttl">お名前</th>
                                            <td class="modal-content">{{ $contact['last_name'] }} {{ $contact['first_name'] }}
                                            </td>
                                        </tr>
                                        <tr class="modal-row">
                                            <th class="modal-ttl">性別</th>
                                            <td class="modal-content">                                            {{ $contact['getGenderTextAttribute()'] }}</td>
                                        </tr>
                                        <tr class="modal-row">
                                            <th class="modal-ttl">メールアドレス</th>
                                            <td class="modal-content">{{ $contact['email'] }}</td>
                                        </tr>
                                        <tr class="modal-row">
                                            <th class="modal-ttl">電話番号</th>
                                            <td class="modal-content">{{ $contact['tell'] }}</td>
                                        </tr>
                                        <tr class="modal-row">
                                            <th class="modal-ttl">住所</th>
                                            <td class="modal-content">{{ $contact['address'] }}</td>
                                        </tr>
                                        <tr class="modal-row">
                                            <th class="modal-ttl">建物名</th>
                                            <td class="modal-content">{{ $contact['building'] }}</td>
                                        </tr>
                                        <tr class="modal-row">
                                            <th class="modal-ttl">お問い合わせの種類</th>
                                            <td class="modal-content">{{ $contact['content'] }}</td>
                                        </tr>
                                        <tr class="modal-row">
                                            <th class="modal-ttl">お問い合わせ内容</th>
                                            <td class="modal-content">{{ $contact['detail'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button>削除</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Bootstrap --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
