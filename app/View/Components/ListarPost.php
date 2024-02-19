<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListarPost extends Component
{
   
    // creo una propiedad posts para que lo registre
    public $posts;


    public function __construct($posts)
    {
        //de esta manera ya se van a poder ver los post que muestro en el home controller
        // luego se lo paso al dashboard
        $this->posts = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listar-post');
    }
}
