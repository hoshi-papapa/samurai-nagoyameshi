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

    @if($latestSubscription && $latestSubscription->stripe_status === 'active')
      {{-- 有効なサブスクリプションの場合 --}}

      @if($latestSubscription->ends_at)
      {{-- 有効期限が設定されている場合 --}}
      <p>有効期限「{{ $latestSubscription->ends_at->format('Y年m月d日') }}」まで、この機能をお使いいただけます。</p>
      <div>
        <a href="{{route('favorite.index')}}">お気に入りリスト確認</a>
      </div>
      <div>
        <a href="{{route('reservation.index')}}">予約履歴の確認</a>
      </div>
      <div>
        <a href="{{route('subscription.cancel_form', auth()->user())}}">プレミアムプランを解約する</a>
      </div>

      @else
      {{-- 期限がない場合 --}}
      <div>
        <a href="{{route('favorite.index')}}">お気に入りリスト確認</a>
      </div>
      <div>
        <a href="{{route('reservation.index')}}">予約履歴の確認</a>
      </div>
      <div>
        <a href="{{route('subscription.resume_form', auth()->user())}}">プレミアムプランを継続する</a>
      </div>

      @endif

    @else
    {{-- 有効でないサブスクリプションの場合 --}}
    <div class="emphasize">プレミアム会員になると、下記の機能をお使いいただけます。</div>
    <div class="text-muted">
      　お気に入り登録・解除
    </div>
    <div class="text-muted">
      　店舗予約
    </div>
    <div class="text-muted">
      　レビュー投稿
    </div>
    <div>
      <a href="{{route('stripe.subscription')}}">プレミアムプランに登録する</a>
    </div>

    @endif

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
      