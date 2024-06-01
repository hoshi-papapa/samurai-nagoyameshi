{{-- ヘッダー部分の設定 --}}
@extends('layouts.app')
@section('content')
 
<div class="container py-3">
  <h3 class="mb-3">ご解約フォーム</h3>
 
{{-- フォーム部分 --}}	
	<p>契約の継続はこちらから</p>
	<form method="POST" action="{{route('stripe.resume', ['user' => $user->id]) }}">
		@csrf
		<button class="btn btn-success mt-2">キャンセルを取り消しする</button>
	</form>
</div>
{{-- 
<script>
 
	// HTMLの読み込み完了後に実行するようにする
	window.onload = my_init;
	function my_init() {
 
		// Configに設定したStripeのAPIキーを読み込む  
		const stripe = Stripe("{{ config('services.stripe.pb_key') }}");
		const elements = stripe.elements();
 
		var style = {
			base: {
			color: "#32325d",
			fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
			fontSmoothing: "antialiased",
			fontSize: "16px",
			"::placeholder": {
			color: "#aab7c4"
			}
		},
		invalid: {
			color: "#fa755a",
			iconColor: "#fa755a"
		}
		};
		
		const cardElement = elements.create('card', {style: style, hidePostalCode: true});
		cardElement.mount('#card-element');
 
		const cardHolderName = document.getElementById('card-holder-name');
		const cardButton = document.getElementById('card-button');
		const clientSecret = cardButton.dataset.secret;
 
		cardButton.addEventListener('click', async (e) => {
			// formのsubmitボタンのデフォルト動作を無効にする
			e.preventDefault();
			const { setupIntent, error } = await stripe.confirmCardSetup(
				clientSecret, {
					payment_method: {
					card: cardElement,
					billing_details: { name: cardHolderName.value }
					}
				}
			);
			
			if (error) {
			// エラー処理
			console.log('error');
			
			} else {
			// 問題なければ、stripePaymentHandlerへ
			stripePaymentHandler(setupIntent);
			}
		});
	}
	
	function stripePaymentHandler(setupIntent) {
	var form = document.getElementById('payment-form');
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripePaymentMethod');
	hiddenInput.setAttribute('value', setupIntent.payment_method);
	form.appendChild(hiddenInput);
	// フォームを送信
	form.submit();
	}
</script> --}}
@endsection