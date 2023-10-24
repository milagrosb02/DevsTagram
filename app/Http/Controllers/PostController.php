<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // Protego el muro con middleware
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(User $user)
    {
        // retorna la vista del muro
        return view('dashboard', [

            // le paso informacion del usuario (en la url aparece el username)
            'user' => $user

        ]);


    }



}
