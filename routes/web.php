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

// Route::get('/cats', [CatController::class, 'index'])->name('cats.index');

// Route::get('/cats/create', [CatController::class, 'create'])->name('cats.create');

// Route::post('/cats', [CatController::class, 'store'])->name('cats.store');

// Route::get('/cats/{id}/edit', [CatController::class, 'edit'])->name('cats.edit');

// Route::put('/cats/{id}', [CatController::class, 'update'])->name('cats.update');

// Route::delete('/cats/{id}', [CatController::class, 'destroy'])->name('cats.destroy');


Route::resource('cats', CatController::class);

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
