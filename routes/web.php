<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

// メール認証済みかつログイン中のユーザーのみが使用できるルート
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('stores', StoreController::class);

    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('favorite/index', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::post('favorite', [FavoriteController::class, 'store'])->name('favorite.store');
    Route::delete('favorite/{store}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');

    Route::get('reservation/index', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('reservation/{id}', [ReservationController::class, 'show'])->name('reservation.show');
    Route::get('reservation/create/{store_id}', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('reservation', [ReservationController::class, 'store'])->name('reservation.store');

    Route::controller(UserController::class)->group(function () {
        Route::get('users/mypage', 'mypage')->name('mypage');
        Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
        Route::put('users/mypage', 'update')->name('mypage.update');
        Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
        Route::put('users/mypage/password', 'update_password')->name('mypage.update_password');
    });

    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

// 不要なAuth::routes()を削除しました

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
