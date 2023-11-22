<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

 // Esto le permite al usuario actualizar, agregar o eliminar registros

class PostPolicy
{
    use HandlesAuthorization;
    

    public function delete(User $user, Post $post)
    {
        // compruebo si el usuario que quiere eliminar la publicacion es el que creo la publicacion
        // devuelve true o false

        return $user->id === $post->user_id;
    }

    
}
