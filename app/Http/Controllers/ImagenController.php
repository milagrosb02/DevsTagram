<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    // esta funcion guarda las imagenes
    public function store(Request $request)
    {
        // De esta manera identifico el archivo que subo
        $imagen = $request->file('file');


        // Variable para generar ids de archivos unicos
        $nombreImagen = Str::uuid() . "." . $imagen->extension();


        // Variable para hacer uso de intervetion image
        $imagenServidor = Image::make($imagen);

        // Hago uso de un efecto de intervetion image
        $imagenServidor->fit(1000,1000);

        // Variable para almacenar la imagen en el servidor
        // lugar donde se va a guardar la foto 
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        // Guardo imagen en el servidor
        $imagenServidor->save($imagenPath);


        return response()->json(['imagen' => $nombreImagen]);

    }

}
