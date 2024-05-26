@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div>
        <h2> Show Store</h2>
    </div>
    <div>
        <a href="{{ route('stores.index') }}"> Back</a>
    </div>

    <div>
        <strong>Name:</strong>
        {{$store->name}}
    </div>

    <div>
        <strong>Description:</strong>
        {{$store->description}}
    </div>

    <div>
        <strong>Address:</strong>
        {{$store->address}} 
    </div>
    <div>
        <p>
            レビュー
        </p>
    </div>
    <div>
        <div class="row">
            @foreach($reviews as $review)
            <div>
                <p>{{$review->user_id}}</p>
                <p>{{$review->rating}}</p>
                <p>{{$review->comment}}</p>
                <p>{{$review->created_at}}</p>
            </div>
            @endforeach
        </div><br>

        @auth
            <a class="btn" href="{{ route('reservation.create', ['store_id' => $store->id])}}">予約する</a>

            @php
                $isFavorited = \App\Models\Favorite::where('user_id', Auth::id())->where('store_id', $store->id)->exists();
            @endphp
        @if ($isFavorited)
            <form method="POST" action="{{ route('favorites.destroy', $store) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">お気に入り解除</button>
            </form>
        @else
            <form method="POST" action="{{ route('favorites.store') }}">
                @csrf
                <input type="hidden" name="store_id" value="{{ $store->id }}">
                <button type="submit" class="btn btn-primary">お気に入り登録</button>
            </form>
        @endif

        <div>
            <div>
                <form method="POST" action="{{ route('reviews.store') }}">
                    @csrf
                    <h4>レビュー内容</h4>
                    @error('rating')
                        <strong>評価を入力してください</strong>
                    @enderror
                    @error('comment')
                        <strong>レビュー内容を入力してください</strong>
                    @enderror
                    <textarea name="rating" class=form-control m-2></textarea>
                    <textarea name="comment" class=form-control m-2></textarea>
                    <input type="hidden" name="store_id" value="{{$store->id}}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                    <button type="submit">レビューを追加</button>
                </form>
            </div>
        </div>   
        @endauth
    </div>
@endsection
