<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        // metodo para cerrar sesion
        auth()->logout();

        // redirige a la vista del login
        return redirect()->route('login');
    }
}
