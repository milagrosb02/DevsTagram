 # 📷 DevsTagram 📷 # 
 > Este proyecto es como un instagram pero para desarrolladores. Se puede subir / eliminar publicaciones e interactuar con comentarios a través de los diferentes posts.

# Build With #
- Laravel
- Tailwind

# Requisites #
- PHP 8.0.2
- Composer
- MySQL
- Laravel version 9.19

# Install #
1. Clona este repositorio en tu máquina local.
2. Instala las dependencias del proyecto ejecutando
 ```bash
    composer install
 ```
3. Crea una copia del archivo .env.example y renómbralo a .env. Luego, configura las variables de entorno, especialmente la conexión a la base de datos.
4. Genera una nueva clave de aplicación ejecutando php artisan key:generate.
5. Ejecuta las migraciones de la base de datos para crear las tablas necesarias con el comando php artisan migrate.


# Usage #
- Para ejecutar el proyecto, primero debes correr en la terminal
   ```bash
    npm run dev
    ```
- Luego, el servidor de Laravel (en forma local)
   ```bash
    php artisan serve
    ```
   Esto te llevara a la pantalla del login.
## Iniciar Sesion / Registro ##
 - Si no tienes una cuenta, debes hacer click en la parte superior arriba de la derecha donde dice "Crear Cuenta". Rellena con tus datos y luego crea la cuenta.
 - Ya puedes iniciar sesión. Escribe tu email y clave. Esto te lleva al panel de tu propio perfil. Aqui podras ver tus publicaciones, seguidores y seguidos.

## Navegar en el feed ##
 - Puedes navegar al feed haciendo click en donde dice "Devstagram". Aqui se mostraran las publicaciones de las personas que sigues.

## Hacer una publicación ##
- En la parte superior de arriba, hay un botón con un ícono de una cámara que dice "Crear". Haz click ahi.
- En el formulario, escribe un título y una descripción para la publicación y escoge una foto para subir. Luego click en "Crear publicación".

## Seguir a otro usuario ##
- Lo que puedes hacer para seguir a otra persona es: tener abiertas dos cuentas en 2 navegadores distintos y ahi podras ver el botón de seguir. Ya que este proyecta no cuenta con un buscador de usuarios. Una vez seguido a una persona, ya puedes ver, comentar y dar like a sus prublicaciones.

## Dar like a un post y dejar un comentario ##
- En el feed de Devstagram, te aparecen las publicaciones de las personas que sigues y puedes hacer click en ellas para expandir la información.
- Para dar like, presiona el icono del corazón blanco de abajo. Una vez hecho esto, el corazón pasara a un color rojo. También puedes sacarle el me gusta de la misma manera.
- Para comentar un post, puedes escribir algo en la caja de comentarios que aparece en la publicación y luego click en "Comentar".
  

# Resources #
- Usuarios
- Post
- Comentarios
- Like
- Followers

