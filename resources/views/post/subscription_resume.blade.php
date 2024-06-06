@extends('layouts.app')

@section('content')

<div class="container">
    <h3>サブスクリプション解約のキャンセル</h3>
    <hr>

		<div class="card">
				<div class="card-body">
						<p class="card-text">サブスクリプションの解約をキャンセルされる場合は、下のボタンをクリックしてください</p>
						<form method="POST" action="{{route('stripe.resume', ['user' => $user->id]) }}">
							@csrf
							<button class="btn btn-warning">解約をキャンセルする</button>
						</form>
				</div>
		</div>
</div>

@endsection