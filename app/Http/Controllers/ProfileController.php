<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(404, 'Empleado no encontrado');
        }

        return view('profile.show', compact('employee'));
    }
}
