<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 公開ルート
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // ダッシュボードルート
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//ログイン後のページ
Route::middleware(['auth'])->group(function () {
    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
});

// 認証済み・メール認証済みユーザー向けルート
Route::middleware(['auth', 'verified'])->group(function () {

    // プロフィール関連ルート
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // ストア関連ルート
    Route::resource('stores', StoreController::class);

    // レビュー関連ルート
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // お気に入り関連ルート
    Route::prefix('favorite')->group(function () {
        Route::get('index', [FavoriteController::class, 'index'])->name('favorite.index');
        Route::post('/', [FavoriteController::class, 'store'])->name('favorite.store');
        Route::delete('{store}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
    });

    // 予約関連ルート
    Route::prefix('reservation')->group(function () {
        Route::get('index', [ReservationController::class, 'index'])->name('reservation.index');
        Route::get('{id}', [ReservationController::class, 'show'])->name('reservation.show');
        Route::get('create/{store_id}', [ReservationController::class, 'create'])->name('reservation.create');
        Route::post('/', [ReservationController::class, 'store'])->name('reservation.store');
    });

    // ユーザー関連ルート
    Route::prefix('users/mypage')->group(function () {
        Route::get('/', [UserController::class, 'mypage'])->name('mypage');
        Route::get('edit', [UserController::class, 'edit'])->name('mypage.edit');
        Route::put('/', [UserController::class, 'update'])->name('mypage.update');
        Route::get('subscription', [UserController::class, 'subscription'])->name('mypage.subscription');
        Route::get('password/edit', [UserController::class, 'edit_password'])->name('mypage.edit_password');
        Route::put('password', [UserController::class, 'update_password'])->name('mypage.update_password');
    });

    // Stripeサブスクリプション関連ルート
    Route::prefix('users/subscription')->group(function () {
        Route::get('/', [StripeController::class, 'subscription'])->name('stripe.subscription');
        Route::post('afterpay', [StripeController::class, 'afterpay'])->name('stripe.afterpay');
    });

    // ログアウトルート
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::get('/subscription', [StripeController::class, 'subscription'])->name('stripe.subscription');
Route::post('/subscription/afterpay', [StripeController::class, 'afterpay'])->name('stripe.afterpay');

// 不要なAuth::routes()を削除しました

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');