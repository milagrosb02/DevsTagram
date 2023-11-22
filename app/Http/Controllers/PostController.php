<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    // Protego el muro con middleware
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']); // Este controlador va a estar protegido excepto estos metodos (es decir estos seran visibles)
    }



    public function index(User $user)
    {

        // Filtro las publicaciones por el id del usuario
        // Con get se obtienen los resultados
        $posts = Post::where('user_id', $user->id)->paginate(4);


        // retorna la vista del muro
        return view('dashboard', [

            // aca le paso a lo que voy a acceder de la vista (user y post)
            // le paso informacion del usuario (en la url aparece el username)
            'user' => $user,

            // le paso los post
            'posts' => $posts

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



       /* Otra manera de generar registros con la relacion

        $request->user()->posts()->create([

            'titulo' => $request->titulo,

            'descripcion' => $request->descripcion,

            'imagen' => $request->imagen,

            'user_id' => auth()->user()->id
        ]);


       */



       // Una vez subida la imagen, redigire al muro del usuario autenticado
       return redirect()->route('posts.index', auth()->user()->username);

    }


    public function show(User $user, Post $post)
    {
        return view('posts.show', [

            'post' => $post,

            'user' => $user

        ]);
    }


    // identifica que post voy a eliminar
    public function destroy(User $user , Post $post)
    {
        // compruebo si el usuario que quiere eliminar la publicacion es el que creo la publicacion (esto esta em PostPolicy)
        
        $this->authorize('delete', $post);

        // eliminar el post
        $post->delete();


        // eliminar la imagen
        $imagen_path = public_path('uploads/' . $post->imagen);


        // verifica si el archivo existe para eliminarlo
        if (File::exists($imagen_path)) {
            
            unlink($imagen_path);

        }    
        

        return redirect()->route('posts.index', auth()->user()->username);

    }


}
