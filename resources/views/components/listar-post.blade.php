<div>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        {{-- Itero el array de publicaciones --}}
        @foreach ($posts as $post)
        
            <div>

                {{-- enlace para ver las publicaciones (hacer clic en la imagen )--}}
                {{-- llamo a la ruta donde se muestra una publicacion --}}
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user ]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post" {{$post->titulo}}>
                </a>

            </div>   

        @endforeach


    </div>  
    
    {{-- PAGINACION --}}
    {{-- hago uso de $posts porque es la variable que trae los posts desde el controlador --}}
    <div class="my-10">

        {{ $posts->links()}}

    </div>   

</div>