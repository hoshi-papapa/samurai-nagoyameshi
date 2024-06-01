@extends('layouts.app')

@section('content')
    
    <div>
        <h2>予約詳細</h2>
    </div>
    <div>
        <a href="{{ route('reservation.index') }}"> 予約一覧に戻る</a>
    </div>

    <div>
        @if ($reservation->store->image)
        <img src="{{ asset($reservation->store->image) }}" class="w-100 img-fluid">
        @else
        <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
        @endif
    </div>

    <div>
        <strong>店舗名:</strong>
        {{$reservation->store->name}}
    </div>

    <div>
        <strong>予約日時:</strong>
        {{$reservation->reservation_date}}
    </div>

    <div>
        <strong>予約人数:</strong>
        {{$reservation->number_of_people}} 
    </div>

    <div>
        <strong>予約確定日:</strong>
        {{$reservation->created_at}} 
    </div>

@endsection
