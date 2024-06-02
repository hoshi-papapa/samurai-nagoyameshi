@extends('layouts.app')

@section('content')
<div class="container">
  <h3>マイページ</h3>

  <hr>

  <div class="mypage_style">
    <div>
      <a href="{{route('mypage.edit')}}">会員情報の編集</a>
    </div>
    <div>
      <a href="{{route('mypage.edit_password')}}">パスワード変更</a>
    </div>
    <div>
      <a href="{{route('favorite.index')}}">お気に入りリスト確認</a>
    </div>
    <div>
      <a href="{{route('reservation.index')}}">予約履歴の確認</a>
    </div>
    <div>
      <a href="{{route('stripe.subscription')}}">サブスクリプションの登録・解除</a>
    </div>
    <div>
      {{-- <a href="{{route('stripe.cancel', auth()->user())}}">サブスクリプションの解除</a> --}}
      <a href="{{route('subscription.cancel_form', auth()->user())}}">サブスクリプションの解除</a>
    </div>
    <div>
      <a href="{{route('subscription.resume_form', auth()->user())}}">サブスクリプションの解除取り消し</a>
    </div>
    <div>
      <a href="{{route('subscription.information')}}">ご契約状況</a>
    </div>

    {{-- ログアウト機能 --}}
    <div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          ログアウト
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
  </div>
  
</div>
@endsection
      