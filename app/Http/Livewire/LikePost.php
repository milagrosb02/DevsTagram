<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{

    public $post;
    public $isLiked;
    public $likes;

    // funcion para saber si el usuario dio like
    public function mount($post)
    {
        // verifico si el usuario dio like
        $this->isLiked = $post->checkLike(auth()->user());

        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if ($this->post->checkLike(auth()->user())) {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--; // rebaja la cantidad

        } else {

            // crea los datos como un arreglo
            $this->post->likes()->create([

                'user_id' => auth()->user()->id

            ]);

            $this->isLiked = true;
            $this->likes++; // aumenta la cantidad
        }
    }


    public function render()
    {
        return view('livewire.like-post');
    }
}
