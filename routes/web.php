<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tweets', [\App\Http\Controllers\TweetsController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

    Route::post('/tweets', [\App\Http\Controllers\TweetsController::class, 'store']);
    Route::get('/tweets/{tweet}/edit', [\App\Http\Controllers\TweetsController::class, 'edit'])->name('tweets.edit');
//    Route::put('/tweets/{tweet}', [\App\Http\Controllers\TweetsController::class, 'update'])->name('tweets.update');
    Route::delete('/tweets/{tweet}', [\App\Http\Controllers\TweetsController::class, 'destroy'])->name('tweets.destroy');

    Route::post('/profiles/{user:username}/follow', [\App\Http\Controllers\FollowsController::class, 'store']);

    Route::get('/explore', \App\Http\Controllers\ExploreController::class)->name('explore');

    Route::post('/tweets/{tweet}/like', [\App\Http\Controllers\TweetLikesController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [\App\Http\Controllers\TweetLikesController::class, 'destroy']);
});
Route::get('/profiles/{user:username}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile');


