<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatController;
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

Route::get('/gawan', function () {
    return view('gawan');
});

Route::get('/cats', [CatController::class, 'index'])->name('cats.index');

Route::get('/cats/new', [CatController::class, 'new'])->name('cats.new');

Route::post('/cats', [CatController::class, 'isi'])->name('cats.isi');

Route::get('/cats/{id}/ubah', [CatController::class, 'ubah'])->name('cats.ubah');

Route::put('/cats/{id}', [CatController::class, 'berubah'])->name('cats.berubah');

Route::delete('/cats/{id}', [CatController::class, 'hapus'])->name('cats.hapus');

Route::get('/handler', function () {
    return view('handler');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
