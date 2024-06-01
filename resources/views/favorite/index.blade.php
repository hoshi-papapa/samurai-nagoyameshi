@extends('layouts.app')

@section('content')
    <h2>お気に入り</h2>

    <hr>

    @if($favorites->isEmpty())
        <p>お気に入りがありません。</p>
    @else
        <div class="row">
            @foreach ($favorites as $favorite)
              <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('stores.show', $favorite->store->id) }}">
                        @if ($favorite->store->image !== "")
                            <img src="{{ asset($favorite->store->image) }}"  alt="{{ $favorite->name }}" class="img-thumbnail">
                        @else
                            <img src="{{ asset('img/dummy.png')}}"  alt="{{ $favorite->name }}" class="img-thumbnail">
                        @endif
                    </a>
                    <div>
                        <h5>{{ $favorite->store->name }}</h5>
                        <h6>{{ $favorite->store->description }}</h6>
                    </div>
                    <div>
                        <a href="{{ route('favorite.destroy', $favorite->store->id) }}" 
                           onclick="event.preventDefault(); document.getElementById('favorites-destroy-form{{$favorite->store->id}}').submit();">
                            削除
                        </a>
                        <form id="favorites-destroy-form{{$favorite->store->id}}" action="{{ route('favorite.destroy', $favorite->store->id) }}" method="POST">
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
