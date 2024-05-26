@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-box">
                {{-- 検索ボックス --}}
                <form action="{{ route('stores.index') }}" method="GET" class="row g-1">
                    <div class="col-auto">
                        <input class="form-control" name="keyword">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn">
                            <i class="fas fa-search samuraimart-header-search-icon"></i>
                        </button>
                    </div>
                </form>
            </div>
        </form>

<!--======== 後略 ========-->

                    </div>
                </form>

                
                {{-- 選択中のカテゴリがある場合 --}}
                @if( $selected_category !== null )
                    <a href="{{ route('stores.index') }}">トップ</a> ＞ {{ $selected_category->name}}
                    <h1>「{{ $selected_category->name }}」のお店　{{$total_count}}件</h1>
                    @if ($total_count == 0)
                        <p>申し訳ございません。「{{ $selected_category->name }}」のお店はありませんでした。</p>
                    @endif
                @elseif ($keyword !== null)
                    <a href="{{ route('stores.index') }}">トップ</a> ＞ お店一覧
                    <h1>「{{ $keyword }}」の検索結果　{{ $total_count }}件</h1>
                @endif

                {{-- 並び替え機能 --}}
                <div>
                    Sort By
                    @sortablelink('updated_at', '更新順で並び替え')
                    @sortablelink('name', '名前順で並び替え')
                    @sortablelink('reviews_avg_rating', '評価順で並び替え')
                </div>

                {{-- ランダムなカテゴリを表示するチップ --}}
                <div class="search-box mb-4">
                    @foreach ($categories as $category)
                        <span class="badge text-white shadow" style="background-color: #ffc107; color:#eee;">
                            <a href="{{ route('stores.index', ['category' => $category->id]) }}" class="badge badge-secondary">{{ $category->name }}</a>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-10">
        <div class="container mt-4">
            <div class="row w-100">
                @foreach($stores as $store)
                    <div class="col-3">
                        <a href="{{route('stores.show', $store)}}">
                            <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
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
@endsection