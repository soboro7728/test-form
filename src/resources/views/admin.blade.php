@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="section__title">
    <h2>Adimin</h2>
</div>

<form class="search-form" action="/admin/search" method="get">
    @csrf
    <div class="search-form__item">
        <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" />
        <select class="search-form__item-select" name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
            @endforeach
        </select>
        <input class="search-form__item-input" type="date" name="date" value=" " />
    </div>
    <div class="search-form__button">
        <button class="search-form__button-submit" type="submit">検索</button>
    </div>
</form>
<table>
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
    </tr>

    @foreach ($contacts as $contact)
    <tr>
        <td>{{$contact->first_name}}{{$contact->last_name}}</td>
        <td>{{$contact->gender}}</td>
        <!-- なぜか出来ない。ddでは拾ってるっぽい -->
        <!-- gender->gender -->
        <td>{{$contact->email}}</td>
        <td>{{$contact->category->content}}</td>
    </tr>
    @endforeach

</table>
<form class="search-form" action="/admin" method="get">
    @csrf
    <div class="search-form__button">
        <button class="search-form__button-submit" type="submit">リセット</button>
    </div>
</form>
{{ $contacts->appends(request()->input())-> links() }}


@endsection