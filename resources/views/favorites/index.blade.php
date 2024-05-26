@extends('layouts.app')

@section('content')
    <h1>お気に入り</h1>

    <hr>

    @if($favorites->isEmpty())
        <p>お気に入りがありません。</p>
    @else
        <div class="row">
            @foreach ($favorites as $favorite)
              <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('stores.show', $favorite->store->id) }}">
                        <img src="{{ asset('img/dummy.png') }}" alt="{{ $favorite->name }}">
                    </a>
                    <div>
                        <h5>{{ $favorite->store->name }}</h5>
                        <h6>{{ $favorite->store->description }}</h6>
                    </div>
                    <div>
                        <a href="{{ route('favorites.destroy', $favorite->store->id) }}" 
                           onclick="event.preventDefault(); document.getElementById('favorites-destroy-form{{$favorite->store->id}}').submit();">
                            削除
                        </a>
                        <form id="favorites-destroy-form{{$favorite->store->id}}" action="{{ route('favorites.destroy', $favorite->store->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
              </div>
            @endforeach
        </div>
    @endif
@endsection
