<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Branches;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/branches', function () {
        return view('branches.index');
    })->name('branches.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/contract-types', function () {
        return view('contract-types.index');
    })->name('contract-types.index');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/shifts', function () {
        return view('shifts.index');
    })->name('shifts.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/employees', function () {
        return view('employees.index');
    })->name('employees.index');
});