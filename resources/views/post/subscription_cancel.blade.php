@extends('layouts.app')

@section('content')

<div class="container">
    <h3>サブスクリプション解約</h3>
    <hr>

		<div class="card">
				<div class="card-body">
						<p class="card-text">サブスクリプションを解約される場合は、下のボタンをクリックしてください<br>
							キャンセルした場合でも、次回のお支払日までは有料プランを利用可能です</p>
						<form method="POST" action="{{route('stripe.cancel', ['user' => $user->id]) }}">
							@csrf
							<button class="btn btn-danger">キャンセルする</button>
						</form>
				</div>
		</div>
</div>

@endsection