<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'email' => ['required', 'email'],

            'password' => ['required'],

        ]);


        // comprueba si las credenciales son correctas
        // esto retorna true o false
        if(!auth()->attempt($request->only('email','password'), $request->remember))
        {   
            // este mensaje se muestra en la vista y es creado con with
            // back() hace que vuelva a la pagina anterior
            return back()->with('mensaje', 'Las credenciales no son correctas. '); 
        }

        // si los datos fueron correctos
        return redirect()->route('posts.index');

    }


}
