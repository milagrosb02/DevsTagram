@extends('layouts.app')



@section('titulo')
    {{ $post->titulo }}
@endsection



{{-- ESTA SECCION es donde se muestra la imagen y los comentarios --}}

@section('contenido')

    <div class="container mx-auto md:flex">

        <div class="md:w-1/2">

            {{-- aca esta la imagen --}}
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">


            {{-- seccion de los likes--}}
            <div class="p-3">

                <p>0 likes</p>

            </div>
            

            {{-- aca se agrupa la informacion del post --}}
            <div>

                <p class="font-bold"> {{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5"> {{$post->descripcion}} </p>

            </div>   

            
        </div>   


        {{-- esta es la seccion de los comentarios de la foto --}}
        <div class="md:w-1/2 p-5">

            <div class="shadow bg-white p-5 mb-5">

                {{-- Con esto protejo que no se pueda comentar si un usuario no esta autenticado--}}
                @auth
                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>


                {{-- mensaje de que si se envio el comentario o no--}}
                @if(session('mensaje'))

                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">

                        {{session('mensaje')}}
                     
                    </div>   

                @endif

                {{-- formulario para enviar comentarios --}}
                <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user ]) }}" method="POST">

                    @csrf

                    <div class="mb-5">

                        <label for="comentario" class="mb-2 block uppercase text-gray-700 font-bold">Comentario</label>
    
                        <textarea
                        
                            id="comentario"
                            name="comentario"
                            placeholder="Comentario de la publicación"
                            class="border p-3 w-full rounded-lg
                            @error('comentario')
                            border-red-500
                            @enderror"
    
    
                            value=""
    
                        ></textarea>
    
                        {{-- esto imprime los errores --}}
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
    
                    </div> 


                     {{-- boton para enviar el comentario --}}
                        <input

                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"

                    />

                </form>    
                @endauth 
                


            </div>    

        </div>   

    </div>    

@endsection