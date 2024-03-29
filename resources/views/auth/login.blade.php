@extends('layouts.app')


@section('titulo')
    Inicia Sesión en DevsTagram
@endsection


{{-- creo el formulario de registro --}}
@section('contenido')

    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-5">

            <img src=" {{ asset('img/login.jpg') }}" alt="Imagen de login de usuario">

        </div>



       <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">

            {{-- este action es la url a la que le voy a mandar la info--}}
            {{-- le paso el nombre de la ruta que se llama "regster" --}}
            <form method="POST" action="{{ route('login') }}">

                {{-- este CSRF por lo que entendi, evita que expire la pagina o que sufra ataques --}}
                @csrf                

                {{-- mensaje de error de sesion en login controller --}}
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif


                <div class="mb-5">

                    <label for="email" class="mb-2 block uppercase text-gray-700 font-bold">Email</label>

                    <input
                    
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu email de registro"
                        class="border p-3 w-full rounded-lg
                        @error('email')
                        border-red-500
                        @enderror"

                        
                        value="{{ old('email') }}"
                    
                    />

                     {{-- esto imprime los errores --}}
                     @error('email')
                     <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                 @enderror

                </div>


                <div class="mb-5">

                    <label for="password" class="mb-2 block uppercase text-gray-700 font-bold">Clave</label>

                    <input
                    
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Tu clave de registro"
                        class="border p-3 w-full rounded-lg
                        @error('password')
                        border-red-500
                        @enderror"

                        
                    
                    />


                     {{-- esto imprime los errores --}}
                     @error('password')
                     <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                 @enderror

                </div>


                {{-- Boton de RECUERDAME --}}
                <div class="mb-5">

                    <input type="checkbox" name="remember"> <label class="text-gray-700 text-sm">Recuerdame</label>

                </div>    



                <input

                    type="submit"
                    value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"

                />

            </form>

       </div>

    </div> 

@endsection