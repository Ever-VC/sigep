<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        auth()->logout();
        // Invalida la sesion
        $request->session()->invalidate();
        // Regenera el CSRF token
        $request->session()->regenerateToken();

        // Redirect to the home page
        return redirect()->route('login');
    }
}
