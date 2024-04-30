<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
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
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [RegistroController::class, 'index'])->middleware(['auth', 'verified'])->name('index.dashboard');
    Route::get('/dashboard/create', [RegistroController::class, 'create'])->name('index.create');
    Route::get('/dashboard/tabela', [RegistroController::class, 'tabela'])->name('index.tabela');
    Route::post('/dashboard/store', [RegistroController::class, 'store'])->name('index.store');
    Route::delete('/dashboard/tabela/{cadastros}', [RegistroController::class, 'destroy'])->name('index.destroy');
    Route::get('/dashboard/tabela/show/{cadastros}', [RegistroController::class, 'show'])->name('index.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
