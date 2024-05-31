@extends('layouts.app')

@section('content')

<div class="container py-3">
    <h3 class="mb-3">ご登録フォーム</h3>

    {{-- フォーム部分 --}}
    <form action="{{route('stripe.afterpay')}}" method="post" id="payment-form">
        @csrf
        
        <div class="form-group">
            <label for="card-holder-name">お名前</label>
            <input type="text" class="form-control col-sm-5" id="card-holder-name" required>
        </div>
        
        <div class="form-group">
            <label for="card-element">カード番号</label>
            <div class="form-control col-sm-5" id="card-element"></div>
        </div>

        <div id="card-errors" role="alert" style='color:red'></div>

        <button class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">送信する</button>
    </form>
</div>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
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
            // エラーメッセージを表示
            document.getElementById('card-errors').textContent = error.message;
        } else {
            // setupIntent が成功した場合はフォームを送信
            const form = document.getElementById('payment-form');
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'setupIntent');
            hiddenInput.setAttribute('value', setupIntent.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
});
</script>
@endpush

@endsection
