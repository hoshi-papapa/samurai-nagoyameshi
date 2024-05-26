@extends('layouts.app')

@section('content')
    <h1>予約履歴一覧</h1>

    <hr>

    @if($reservations->isEmpty())
        <p>予約履歴がありません</p>
    @else
        <div class="row">
            @foreach ($reservations as $reservation)
              <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('stores.show', $reservation->store->id) }}">
                        <img src="{{ asset('img/dummy.png') }}" alt="{{ $reservation->name }}">
                    </a>
                    <div>
                        <h5>{{ $reservation->store->name }}</h5>
                        <h6>{{ $reservation->store->description }}</h6>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
    @endif
@endsection
