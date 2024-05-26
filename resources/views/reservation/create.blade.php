@extends('layouts.app')

@section('content')
    <h1>Restaurant Reservation Form</h1>
    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <input type="hidden" name="store_id" value="{{ $store_id }}">
        
        <label for="reservation_date">Reservation Date and Time:</label><br>
        <input type="datetime-local" id="reservation_date" name="reservation_date" required><br><br>

        <label for="number_of_people">Number of People:</label><br>
        <input type="number" id="number_of_people" name="number_of_people" min="1" required><br><br>

        <button type="submit">Submit Reservation</button>
    </form>
@endsection