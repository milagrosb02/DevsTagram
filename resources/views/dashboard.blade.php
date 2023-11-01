@extends('layouts.app')


@section('titulo')
    Perfil de {{ $user->username }} 
@endsection



@section('contenido')

    <div class="flex justify-center">

        {{-- este div centra el cotenido --}}
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">

            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario1.png') }}" alt="imagen de perfil de usuario"/>
            </div>   


            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>


                {{-- informacion estatica del usuario--}}
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">

                    0
                    <span>Seguidores</span>

                </p>


                <p class="text-gray-800 text-sm mb-3 font-bold">

                    0
                    <span>Siguiendo</span>

                </p>


                <p class="text-gray-800 text-sm mb-3 font-bold">

                    0
                    <span>Publicaciones</span>

                </p>

            </div>   

        </div>   


    </div>    

@endsection