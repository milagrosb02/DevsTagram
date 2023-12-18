<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;


class PerfilController extends Controller
{

    // para proteger la ruta
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('perfil.index');
    }


    public function store(Request $request)
    {

         // Modifico la request (no recomendado)
         $request->request->add(['username' => Str::slug($request->username)]);

         $this->validate($request, [
 
            'username' => ['required', 'unique:users,username,' .auth()->user()->id, 'min:3', 'max:15', 'not_in:twitter,editar-perfil'],
         
        ]);

        
        // validar si hay una imagen o no
        if ($request->imagen) {
            
            // De esta manera identifico el archivo que subo
        $imagen = $request->file('imagen');


        // Variable para generar ids de archivos unicos
        $nombreImagen = Str::uuid() . "." . $imagen->extension();


        // Variable para hacer uso de intervetion image
        $imagenServidor = Image::make($imagen);

        // Hago uso de un efecto de intervetion image
        $imagenServidor->fit(1000,1000);

        // Variable para almacenar la imagen en el servidor
        // lugar donde se va a guardar la foto 
        $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

        // Guardo imagen en el servidor
        $imagenServidor->save($imagenPath);

        } 


        // Guardar cambios
        // Obtengo el usuario

        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;

        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';

        $usuario->save();


        // Redirecciono al usuario
        return redirect()->route('posts.index', $usuario->username);

    }

}
