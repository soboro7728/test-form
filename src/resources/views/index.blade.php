@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')


<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}" />
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}" />
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" value="1" {{ old ('gender') == '1' ? 'checked' : '' }} checked />男<br>
                    <input type="radio" name="gender" value="2" {{ old ('gender') == '2' ? 'checked' : '' }} />女<br>
                    <input type="radio" name="gender" value="3" {{ old ('gender') == '3' ? 'checked' : '' }} />その他<br>
                </div>
                <div class="form__error">
                    @error('gender') {{ $message }} @enderror </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                    </div>
                    <div class="form__error">
                        @error('email') {{ $message }} @enderror </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="tel" name="tel[]" placeholder="080" value="{{ old('tel[0]') }}" />
                    </div>
                    <div class="form__error">
                        @error('tel') {{ $message }} @enderror </div>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="tel" name="tel[]" placeholder="1234" value="{{ old('tel[1]') }}" />
                    </div>
                    <div class="form__error">
                        @error('tel') {{ $message }} @enderror </div>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="tel" name="tel[]" placeholder="5678" value="{{ old('last_name') }}" />
                    </div>
                    <div class="form__error">
                        @error('tel') {{ $message }} @enderror </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                    </div>
                    <div class="form__error">
                        @error('address') {{ $message }} @enderror </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名<span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" />
                    </div>
                    <div class="form__error">
                        @error('@@@') {{ $message }} @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <select class="create-form__item-select" name="category_id">
                            <option value="" selected hidden>選択してください</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" @if(old('category_id')==$category->id) selected @endif>{{ $category['content'] }}</option>
                            @endforeach
                            <select>
                    </div>
                    <div class="form__error">
                        @error('category_id') {{ $message }} @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お問い合わせ内容</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea" ">
                                <textarea name=" detail" placeholder="お問い合わせ内容をご記載ください">{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('detail') {{ $message }} @enderror </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
    </form>
    <form class="form" action="/logout" method="post">
        @csrf
        <button class="header-nav__button">ログアウト</button>
    </form>
    <a href="/login">ろぎん</a>
</div>
@endsection