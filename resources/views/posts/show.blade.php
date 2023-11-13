@extends('layouts.app')



@section('titulo')
    {{ $post->titulo }}
@endsection



{{-- ESTA SECCION es donde se muestra la imagen y los comentarios --}}

@section('contenido')

    <div class="container mx-auto flex">

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


        <div class="md:w-1/2">

            2

        </div>   

    </div>    

@endsection