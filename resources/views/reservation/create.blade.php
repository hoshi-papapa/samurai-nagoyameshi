@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>予約フォーム</h1>
    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <input type="hidden" name="store_id" value="{{ $store_id }}">
        
        <label for="reservation_date">予約の日時と時間を選択してください</label><br>
        <input type="datetime-local" id="reservation_date" name="reservation_date" required><br><br>

        <label for="number_of_people">予約人数を入力してください</label><br>
        <input type="number" id="number_of_people" name="number_of_people" min="1" required><br><br>

        <button type="submit">予約する</button>
    </form>

@endsection