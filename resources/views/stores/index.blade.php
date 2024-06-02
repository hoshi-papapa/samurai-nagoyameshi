@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row align-items-center">
        {{-- パンくずリスト --}}
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-size: 1.1rem;">
                    <li class="breadcrumb-item"><a href="{{ route('stores.index') }}">全てのお店</a></li>
                    @if( $selected_category !== null )
                        <li class="breadcrumb-item">{{ $selected_category->name}}</li>
                    @elseif ($keyword !== null)
                        <li class="breadcrumb-item">お店一覧</li>
                    @endif
                </ol>
            </nav>
        </div>

        {{-- 検索ボックス --}}
        <div class="col-md-9">
            <div class="mb-3">
                <form action="{{ route('stores.index') }}" method="GET" class="row g-1">
                    <div class="col-auto">
                        <input class="form-control" name="keyword" placeholder="キーワードを入力" value="{{ request('keyword') }}">
                    </div>
                    <div class="col-auto">
                        <select class="form-select" name="category">
                            <option value="">全てのカテゴリ</option>
                            @foreach ($allcategories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-search" style="color:black;"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- 検索結果の表示 --}}
    @if($selected_category && $keyword)
        <h3>「{{ $selected_category->name }}」カテゴリ / 「{{ $keyword }}」の検索結果　{{ $total_count }}件</h3>
        @if ($total_count == 0)
            <p>申し訳ございません。「{{ $selected_category->name }}」カテゴリ / 「{{ $keyword }}」のお店はありませんでした。</p>
        @endif
    @elseif($selected_category)
        <h3>「{{ $selected_category->name }}」カテゴリの検索結果　{{ $total_count }}件</h3>
        @if ($total_count == 0)
            <p>申し訳ございません。「{{ $selected_category->name }}」カテゴリのお店はありませんでした。</p>
        @endif
    @elseif($keyword)
        <h3>「{{ $keyword }}」の検索結果　{{ $total_count }}件</h3>
        @if ($total_count == 0)
            <p>申し訳ございません。「{{ $keyword }}」のお店はありませんでした。</p>
        @endif
    @endif

    <div class="d-flex align-items-center mb-4">
        <span class="me-2">並び替え</span>
        <form method="GET" action="{{ route('stores.index') }}">
            @if ($selected_category)
                <input type="hidden" name="category" value="{{ $selected_category->id }}">
            @endif
            <select class="form-select" name="select_sort" onChange="this.form.submit();">
                @foreach ($sorts as $value => $key)
                    @if ($sorted === $value)
                        <option value="{{ $value }}" selected>{{ $key }}</option>
                    @else
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endif
                @endforeach
            </select>
        </form>
    </div>

    {{-- ランダムなカテゴリを表示するチップ --}}
    <div class="search-box mb-4">
        @foreach ($categories as $category)
            <span class="badge text-white shadow" style="background-color: #ffc107; color:#eee;">
                <a href="{{ route('stores.index', ['category' => $category->id]) }}" class="badge badge-secondary">{{ $category->name }}</a>
            </span>
        @endforeach
    </div>

    <div class="row">
        <div class="col-10">
            <div class="container mt-4">
                <div class="row w-100">
                    @foreach($stores as $store)
                        <div class="col-3">
                            <a href="{{route('stores.show', $store)}}">
                            @if ($store->image !== "")
                                <img src="{{ asset($store->image) }}" class="img-thumbnail">
                            @else
                                <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                            @endif
                            </a>
                        </div>
                        <div class="col-9">
                            <p class="mt-2">
                                {{$store->name}} <br><br>
                                {{$store->description}}
                                {{$store->average_review ?? '評価なし'}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $stores->appends(request()->query())->links() }}
        </div>
    </div>
</div>

@endsection