<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    
    // metodo para dar like
    public function store(Request $request, Post $post)
    {
        // crea los datos como un arreglo
        $post->likes()->create([

            'user_id' => $request->user()->id

        ]);

        // regresa al mismo post
        return back();
    }

}
