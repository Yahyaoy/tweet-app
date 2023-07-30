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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tweets', [\App\Http\Controllers\TweetsController::class, 'index'])->name('home');
Route::post('/tweets', [\App\Http\Controllers\TweetsController::class, 'store']);

Route::get('/profiles/{user:name}', [\App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');
Route::post('/profiles/{user:name}/follow', [\App\Http\Controllers\FollowsController::class, 'store']);
require __DIR__.'/auth.php';
