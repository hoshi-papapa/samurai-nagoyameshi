@extends('layouts.app')

@section('content')

<div class="container">
    <h3>ご契約情報</h3>
    <hr>

    @if($subscriptions->isNotEmpty())
      {{-- 最新のサブスクリプションのみを表示 --}}
      @php
        $latestSubscription = $subscriptions->first();
      @endphp
      <div>
        @if($latestSubscription->stripe_status === 'active')
          {{-- 有効なサブスクリプションの場合 --}}
          <p>現在プレミアム会員です。全ての機能をご利用いただけます。</p>

          @if($latestSubscription->ends_at)
          {{-- 有効期限が設定されている場合 --}}
          <p>有効期限「{{ $latestSubscription->ends_at->format('Y年m月d日') }}」を過ぎると、一部機能が制限されます。</p>
          @else
          {{-- 期限がない場合 --}}
          {{-- <p>有効期限：期限なし</p> --}}
          @endif

        @else
        {{-- 有効でないサブスクリプションの場合 --}}
        <p>現在プレミアム会員ではありません。一部機能が制限されています。</p>
        @endif
      </div>
    @else
      {{-- サブスクリプションがない場合 --}}
      <p>現在プレミアム会員ではありません。一部機能が制限されています。</p>
    @endif
</div>

@endsection