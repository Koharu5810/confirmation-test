{{-- サンクスページ --}}
@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<body>
    <div class="base-box">
        <div class="back-text">Thank you</div>
        <div class="front-text">お問い合わせありがとうございました</div>
        <a class="button-submit" href="/">HOME</a>
    </div>
</body>

@endsection
