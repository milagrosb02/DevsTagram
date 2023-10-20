<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        

        // Modifico la request (no recomendado)
        $request->request->add(['username' => Str::slug($request->username)]);


        // Validando formaularios
        $this->validate($request, [

            'name' => ['required','max:35','regex:/^[a-zA-Z\s]+$/'],

            'username' => ['required', 'unique:users', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],

            'email' => ['required', 'unique:users', 'email', 'max:30'],

            'password' => ['required', 'max:10', 'confirmed'],

            'password_confirmation' => ['required', 'same:password', 'max:10'],

        ]);


        // creando el registro, primero llamo al metodo
        User::create([

            // escribo los campos de la tabla
            // llamo a la request para la consulta

            'name' => $request->name, //esto es de la vista en el input
            'username' => $request->username, //este metodo convierte el username en una url y no permite espacios 
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);


    }

}
