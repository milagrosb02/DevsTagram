<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    
    public function index() 
    {
        return view('auth.register');
    }



    public function store(Request $request) 
    {
        // Para acceder a valores de manera individual
        // dd($request->get('email')); // por ejemplo
        // tengo que prestar atencion porque la info viene del formulario en la seccion "name"
        

        // Validando formaularios
        $this->validate($request, [

            'name' => ['required','max:35','regex:/^[a-zA-Z\s]+$/'],

            'username' => ['required', 'unique:users', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],

            'email' => ['required', 'unique:users', 'email', 'max:30'],

            'password' => ['required', 'max:10', 'confirmed'],

            'password_confirmation' => ['required', 'same:password', 'max:10'],

        ]);
    }

}
