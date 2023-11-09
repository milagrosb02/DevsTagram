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
    
    
    {{-- Seccion de mostrar las publicaciones --}}
    {{-- El backend de esta parte esta en post controller --}}


    <section class="container mx-auto mt-10">
        

        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        {{-- mensaje de que si no posee publicaciones, que se muestre un aviso del mismo --}}
        @if($posts->count())



                <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                    {{-- Itero el array de publicaciones --}}
                    @foreach ($posts as $post)
                    
                        <div>

                            {{-- enlace para ver las publicaciones (hacer clic en la imagen )--}}
                            <a>
                                <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post" {{$post->titulo}}>
                            </a>

                        </div>   

                    @endforeach


                </div>  
                
                {{-- PAGINACION --}}
                {{-- hago uso de $posts porque es la variable que trae los posts desde el controlador --}}
                <div>

                    {{ $posts->links()}}

                </div>   

        @else

        <p class="text-gray-600 uppercase text-sm text-center font-bold">No posees publicaciones</p>

        @endif
        

    </section>   

@endsection
