{{-- お問い合わせフォーム入力ページ --}}
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('title')
    Contact
@endsection

@section('content')
    <form class="form" action="/confirm" method="post">
        @csrf
{{-- お名前 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <div class="form__input--name">
                        <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
{{-- 性別 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <label class="form__input-gender">
                        <input type="radio" name="gender" id="gender1" value="男性" {{ old('gender') == "男性" ? 'checked' : '' }} checked="checked" /> 男性
                    </label>
                    <label class="form__input-gender">
                        <input type="radio" name="gender" id="gender2" value="女性" {{ old('gender') == "女性" ? 'checked' : '' }} /> 女性
                    </label>
                    <label class="form__input-gender">
                        <input type="radio" name="gender" id="gender3" value="その他" {{ old('gender') == "その他" ? 'checked' : '' }} /> その他
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
{{-- メールアドレス --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
{{-- 電話番号 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <div class="form__input--tell">
                        <input type="text" name="tell1" placeholder="080" value="{{ old('tell1') }}" /> -
                        <input type="text" name="tell2" placeholder="1234" value="{{ old('tell2') }}" /> -
                        <input type="text" name="tell3" placeholder="5678" value="{{ old('tell3') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @if($errors->has('tell1') || $errors->has('tell2') || $errors->has('tel3'))
                        <span>{{ $errors->first('tell1') ?? $errors->first('tell2') ?? $errors->first('tell3') }}</span>
                    @endif
                </div>
            </div>
        </div>
{{-- 住所 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                    </div>
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
{{-- 建物名 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
                    </div>
                </div>
            </div>
        </div>
{{-- お問い合わせの種類 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <div class="form__select">
                        <select name="category_id">
                            <option selected disabled>選択してください</option>
                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                                {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form__error">
                    @error('content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
{{-- お問い合わせ内容 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content-wrapper">
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </div>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
{{-- 送信ボタン --}}
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>

@endsection
