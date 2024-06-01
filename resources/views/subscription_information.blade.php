{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
@section('content')

<div class="container py-3">
  <h3 class="mb-3">ご契約情報</h3>

  @if($subscriptions->isNotEmpty())
  {{-- 最新のサブスクリプションのみを表示 --}}
  @php
  $latestSubscription = $subscriptions->first();
  @endphp
  <div>
    {{-- <p>サブスクリプションID: {{ $latestSubscription->id }}</p>
    <p>サブスクリプション名: {{ $latestSubscription->name }}</p> --}}
    {{-- <p>有効ステータス: {{ $latestSubscription->stripe_status }}</p> --}}
    @if($latestSubscription->stripe_status === 'active')
    {{-- 有効なサブスクリプションの場合 --}}
    <p>現在有料会員です。</p>
    @if($latestSubscription->ends_at)
    {{-- 有効期限が設定されている場合 --}}
    <p>有効期限: {{ $latestSubscription->ends_at->format('Y年m月d日') }}</p>
    @else
    {{-- 期限がない場合 --}}
    <p>有効期限: 期限なし</p>
    @endif
    @else
    {{-- 有効でないサブスクリプションの場合 --}}
    <p>現在有料会員ではありません。</p>
    @endif
  </div>
  @else
  {{-- サブスクリプションがない場合 --}}
  <p>現在有料会員ではありません。</p>
  @endif

  @endsection