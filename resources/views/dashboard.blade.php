@extends('layouts.app')


@section('titulo')
    Perfil de {{ $user->username }}
@endsection



@section('contenido')
    <div class="flex justify-center">

        {{-- este div centra el cotenido --}}
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">

            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario1.png') }}"
                    alt="imagen de perfil de usuario" />
            </div>


            <div>




            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">

                <div class="flex items-center gap-4">

                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>


                    @auth

                        {{-- Para que esto se ejecute, el usuario debe estar autenticado --}}
                        @if ($user->id === auth()->user()->id)
                            {{-- enlace para modificar el perfil --}}
                            <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-900 cursor-pointer">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>


                            </a>
                        @endif

                    @endauth

                </div>


                {{-- informacion estatica del usuario --}}
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">

                    {{ $user->followers->count() }}
                    <span>@choice('Seguidor|Seguidores', $user->followers->count())</span>

                </p>


                <p class="text-gray-800 text-sm mb-3 font-bold">

                    {{ $user->followers->count() }}
                    <span>Siguiendo</span>

                </p>


                <p class="text-gray-800 text-sm mb-3 font-bold">

                    {{ $user->posts->count() }}
                    <span>Publicaciones</span>

                </p>


                {{-- oculto el boton de seguir para los usuarios NO autenticados --}}
                @auth

                    {{-- condicional para no poder seguirte a vos mismo --}}
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->siguiendo(auth()->user()))
                            {{-- BOTON PARA SEGUIR --}}
                            <form action="{{ route('users.follow', $user) }}" method="POST">

                                @csrf

                                <input type="submit"
                                    class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Seguir" />


                            </form>
                        @else
                            {{-- BOTON PARA DEJAR DE SEGUIR  --}}
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <input type="submit"
                                    class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Dejar de seguir" />


                            </form>
                        @endif
                    @endif




                @endauth




            </div>

        </div>


    </div>


    {{-- Seccion de mostrar las publicaciones --}}
    {{-- El backend de esta parte esta en post controller --}}


    <section class="container mx-auto mt-10">


        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        <x-listar-post :posts="$posts" />
    </section>
@endsection
