{{-- 管理画面 --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
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

    </div>

{{-- CSV・ページネーション --}}
    <div class="foruser-group">
        <div>
            <button class="csv_button">エクスポート</button>
        </div>
        <div class="paginate-group">
            {{ $lists->links('vendor.pagination.user') }}
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
                @foreach($lists as $list)
                <tr class="admin-table__row">
                    <td class="admin-table__item">
                        {{ $list['last_name'] }}
                        {{ $list['first_name'] }}
                    </td>
                    <td class="admin-table__item">{{ $list['gender_label'] }}</td>
                    <td class="admin-table__item">{{ $list['email'] }}</td>
                    <td class="admin-table__item">{{ $list['content'] }}</td>
                    <td class="admin-table__item">
                        <button>
                            詳細
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
