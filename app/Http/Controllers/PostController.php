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


    // esta funcion permite visualizar el formulario, pero no es el que crea en si la publicacion
    public function create()
    {
        return view('posts.create');
    }



    public function store(Request $request)
    {
       // validando el formulario de publicaciones
       $this->validate($request, 
       [
        'titulo' => ['required','max:30'],

        'descripcion' => ['required'],

        'imagen' => ['required']

       ]);
    }

}
