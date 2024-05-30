@extends('layouts.app')

@section('content')
<div class="container">
  <h2>マイページ</h2>

  <hr>

  <a href="{{route('mypage.edit')}}">会員情報の編集</a>

  <a href="{{route('mypage.edit_password')}}">パスワード変更</a>

  <a href="{{route('favorite.index')}}">お気に入りリスト確認</a>

  <a href="{{route('reservation.index')}}">予約履歴の確認</a>
  
  <a href="{{route('stripe.subscription')}}">サブスクリプションの登録・解除</a>

  <div class="">
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        ログアウト
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  </div>

</div>
@endsection
      