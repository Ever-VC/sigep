<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;

Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
Route::get('/', function () {
    return view('principal');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/probar-correo', function () {
    Mail::raw('Este es un correo de prueba desde Laravel.', function ($message) {
        $message->to('tu_correo@gmail.com')
                ->subject('Correo de prueba SIGEP');
    });

    return 'Correo enviado';
});
