<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

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


       // Insert en la bd (crea registros)
       Post::create([

        'titulo' => $request->titulo,

        'descripcion' => $request->descripcion,

        'imagen' => $request->imagen,

        // Guardo el usuario que esta autenticado
        'user_id' => auth()->user()->id

       ]);


       /* Otra manera de crear registros

        $post = new Post;

        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id
       
       
       */



       // Una vez subida la imagen, redigire al muro del usuario autenticado
       return redirect()->route('posts.index', auth()->user()->username);

    }

}
