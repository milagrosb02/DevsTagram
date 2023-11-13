<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Models\User;

class ComentarioController extends Controller
{
    
    public function store(Request $request, User $user, Post $post)
    {
         // validar
         $this->validate($request, 
         [
  
          'comentario' => ['required', 'max: 150']
  
         ]);


         // Haciendo el insert
         Comentario::create([

        
            // Guardo el usuario que esta autenticado
            'user_id' => auth()->user()->id,

            'post_id' => $post->id,

            'comentario' => $request->comentario,

         ]);


         // Mensaje
         // Retorna a la pagina de donde lo envio

         return back()->with('mensaje', 'Comentario realizado!');

    }

}
