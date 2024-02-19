<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // para que puedan ver la pagina principal, deben estar autenticados
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    // metodo de tipo invocable (se llama automaticamente)
    // se usa para cuando es un controller con un solo metodo
    public function __invoke()
    {

        // obtener a quienes sigo
        // requiero el ID para filtrar el modelo de POST
        // pluck me trae el ID

       
            $ids = auth()->user()->followings->pluck('id')->toArray();

            $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20); // ordeno las publicaciones de la ultima a la primera

            return view('home', [
                'posts' => $posts
            ]);
       
       
    }
    


}
