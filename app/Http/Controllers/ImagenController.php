<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    // esta funcion guarda las imagenes
    public function store(Request $request)
    {
        // De esta manera identifico el archivo que subo
        $imagen = $request->file('file');

        return response()->json(['imagen' => $imagen -> extension()]);

    }

}
