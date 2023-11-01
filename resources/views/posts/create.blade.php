@extends('layouts.app')


@section('titulo')
    Crea una nueva publicación
@endsection


@section('contenido')
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">
           {{-- llamo a dropzone  --}}
           <form id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">


           </form>
        </div>


        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST">

                {{-- este CSRF por lo que entendi, evita que expire la pagina o que sufra ataques --}}
                @csrf

                <div class="mb-5">

                    <label for="titulo" class="mb-2 block uppercase text-gray-700 font-bold">Titulo</label>

                    <input
                    
                        id="titulo"
                        name="titulo"
                        type="text"
                        placeholder="Titulo de la publicación"
                        class="border p-3 w-full rounded-lg
                        @error('titulo')
                        border-red-500
                        @enderror"


                        value="{{ old('titulo') }}"

                    />

                    {{-- esto imprime los errores --}}
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror

                </div>
                
                
                <div class="mb-5">

                    <label for="descripcion" class="mb-2 block uppercase text-gray-700 font-bold">Descripción</label>

                    <textarea
                    
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripcion de la publicación"
                        class="border p-3 w-full rounded-lg
                        @error('descripcion')
                        border-red-500
                        @enderror"


                        value=""

                    > {{ old('descripcion') }}</textarea>

                    {{-- esto imprime los errores --}}
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror

                </div> 


                {{-- boton para enviar --}}
                <input

                    type="submit"
                    value="Crear publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"

                />

            </form>    
        </div>


        
    </div>   
@endsection

