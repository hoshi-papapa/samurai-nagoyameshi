<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->keyword;

        // ベースクエリを定義
        $query = Store::withAvg('reviews', 'rating')
            ->with('categories');

        // 選択されたカテゴリに基づいて店舗をフィルタリング
        if ($request->category !== null) {
            $query->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            });

            $selected_category = Category::find($request->category);
        } elseif ($keyword !== null) {
            $query->where('name', 'like', "%{$keyword}%");
            $selected_category = null;
        } else {
            $selected_category = null;
        }

        // ソート処理
        $sortable = $request->get('sort') ?? 'updated_at';
        $direction = $request->get('direction') ?? 'asc';

        if ($sortable === 'reviews_avg_rating') {
            $query->orderBy('reviews_avg_rating', $direction);
        } else {
            $query->sortable([$sortable => $direction]);
        }

        $stores = $query->paginate(10);
        $total_count = $query->count();
        $categories = Category::inRandomOrder()->limit(10)->get();

        return view('stores.index', compact('stores', 'categories', 'total_count', 'selected_category', 'keyword'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {

        $reviews = $store->reviews()->get();

        return view('stores.show', compact('store', 'reviews'));
    }
}