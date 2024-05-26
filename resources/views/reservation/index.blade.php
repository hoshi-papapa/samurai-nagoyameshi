@extends('layouts.app')

@section('content')
    <h2>予約履歴一覧</h2>

    <hr>

    <div class="container">
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
                          <p>{{ $reservation->reservation_date }}</p>
                          <p>{{ $reservation->number_of_people }}</p>
                          <a href="{{ route('reservation.show', $reservation->id )}}">
                            予約の詳細を確認する
                          </a>
                      </div>
                  </div>
                </div>
              @endforeach
          </div>
      @endif
    </div>
@endsection
