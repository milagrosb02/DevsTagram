<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        
        
    </head>
    <body class="bg-gray-100">
       
       
        {{-- creando barra de navegacion --}}
        {{-- usando clases de tailwind css --}}
        <header class="p-5 border-b bg-white shadow">

            <div class="container mx-auto flex justify-between items-center">

                <h1 class="text-3xl font-black">
                    
                    DevsTagram

                </h1>

                <nav class="flex gap-2 items-center">

                    <a class="font-bold uppercase text-purple-800 text-sm" href="#">Login</a>

                    <a class="font-bold uppercase text-purple-800 text-sm" href="{{ route('register') }}">Crear cuenta</a>

                </nav>

            </div>
            


        </header>


        {{-- aca va todo el contenido de la vista --}}
        <main class="container mx-auto mt-10">
            
            {{-- en este h2 van los demas titulos de las otras paginas --}}
            <h2 class="font-black text-center text-3xl mb-10">

                @yield('titulo')

            </h2>

            @yield('contenido')

        </main>   


        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">

            DevsTagram - Todos los derechos reservados {{ now()->year }}

        </footer>



    </body>
</html>
