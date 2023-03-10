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
})->name('home');

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

// Route::get('/news/{news}', function($news) {
//     $find = App\Models\News::firstWhere('slug', $news);
//     dd($find);
// })->name('view.news');

// Route::view('/news/{news}', 'page.news', ['news' => App\Models\News::firstWhere('slug', $news)])->name('view.news');

/** Primary Site Navigation ** */
Route::view('/about', 'page.about')->name('view.about');
Route::view('/boardgames', 'page.boardgame')->name('view.boardgame');
Route::view('/books', 'page.book')->name('view.book');
Route::view('/news/{news}', 'page.news')->name('view.news');
Route::view('/podcasts', 'page.podcast')->name('view.podcast');