@extends('layouts.app')

@section('content')
    
    <div>
        <h2>予約詳細</h2>
    </div>
    <div>
        <a href="{{ route('reservation.index') }}"> 予約一覧に戻る</a>
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
