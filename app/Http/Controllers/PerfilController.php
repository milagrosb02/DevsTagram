<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
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

            'username' => ['required', 'unique:users,' .auth()->user()->id, 'min:3', 'max:15', 'not_in:twitter,editar-perfil'],

        ]);

        
    }

}
