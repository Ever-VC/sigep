<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BonusController;

Route::get('/', function () {
    return view('principal');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('employees', EmployeeController::class);
Route::get('/bonuses/create', [BonusController::class, 'create'])->name('bonuses.create.simple');
Route::get('/bonuses/create/{employee}', [BonusController::class, 'create'])->name('bonuses.create');
Route::post('/bonuses', [BonusController::class, 'store'])->name('bonuses.store');
Route::get('/bonuses/{bonus}', [BonusController::class, 'show'])->name('bonuses.show');
