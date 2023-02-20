<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('news/create', App\Http\Livewire\NewsCreate::class)->name('news.create');
});

/** Primary Site Navigation ** */
Route::view('/boardgames', 'boardgame')->name('view.boardgame');
Route::view('/books', 'book')->name('view.book');
Route::view('/podcasts', 'podcast')->name('view.podcast');
Route::view('/about', 'about')->name('view.about');