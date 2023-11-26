<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

            'username' => ['required', 'unique:users', 'min:3', 'max:15'],

        ]);
    }

}
