<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    
    // persona que estoy siguiendo
    // envia peticion para seguir al usuario
    public function store(User $user)
    {
        // crear seguidor
        // uso metodo attach porque los campos que voy a relacionar esta en la misma tabla
        // metodo attach (para relacion de muchos a muchos)
        $user->followers()->attach(auth()->user()->id);

        return back();
    }

}
