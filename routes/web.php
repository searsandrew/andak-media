<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\NewsCreate;
use App\Http\Livewire\ProductType;

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
    Route::get('type', ProductType::class)->name('type');
    Route::get('news/create', NewsCreate::class)->name('news.create');
});

/** Primary Site Navigation ** */
Route::view('/news/{news}', 'page.news')->name('view.news');
Route::view('/{content}', 'page.content')->name('view.content');