<?php

use App\Http\Controllers\AdminController;
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



Route::middleware('guest') -> prefix('/admin') -> group(function() {
    Route::get('/', [AdminController::class, 'iniciarSesionView']) -> name('panel.access');
    Route::post('/login', [AdminController::class, 'login']) -> name('panel.login');
    Route::get('/register', [AdminController::class, 'registrarAdmin']) -> name('panel.register');
});

Route::middleware(['auth:admin', 'verified']) -> prefix('/admin') -> group(function() {
    Route::post('/logout', [AdminController::class, 'logout']) -> name('panel.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboardAdmin']) -> name('panel.dashboard');
});

require __DIR__.'/auth.php';
