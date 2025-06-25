<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Branches;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BonusController;
use App\Livewire\Employees\EditEmployee;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Models\Employee; 
use Livewire\Livewire;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('principal');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::resource('employees', EmployeeController::class);
Route::get('/employees/{employee}/edit-live', EditEmployee::class)->name('employees.edit-live');
Livewire::component('employees.edit-employee', EditEmployee::class);
Route::get('/employees/{employee}/edit-live', EditEmployee::class)->name('employees.edit-live');
Route::get('/bonuses/create', [BonusController::class, 'create'])->name('bonuses.create.simple');
Route::get('/bonuses/create/{employee}', [BonusController::class, 'create'])->name('bonuses.create');
Route::post('/bonuses', [BonusController::class, 'store'])->name('bonuses.store');
Route::get('/bonuses/{bonus}', [BonusController::class, 'show'])->name('bonuses.show');
Route::get('/bonuses/{bonus}/edit', [BonusController::class, 'edit'])->name('bonuses.edit');
Route::put('/bonuses/{bonus}', [BonusController::class, 'update'])->name('bonuses.update');
Route::delete('/bonuses/{bonus}', [BonusController::class, 'destroy'])->name('bonuses.destroy');
Route::get('/employees/{employee}/edit-live', EditEmployee::class)->name('employees.edit-live');

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

Route::get('/employees/{employee}/edit', function (Employee $employee) {
    return view('employees.edit', compact('employee'));
})->name('employees.edit');

//Contraseña

Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
Route::get('/probar-correo', function () {
    Mail::raw('Este es un correo de prueba desde Laravel.', function ($message) {
        $message->to('tu_correo@gmail.com')
        ->subject('Correo de prueba SIGEP');
    });
    return 'Correo enviado';
});
//Perfil de empleado
Route::middleware('auth')->get('/mi-perfil', [ProfileController::class, 'show'])->name('profile.show');