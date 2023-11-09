/** @type {import('tailwindcss').Config} */
module.exports = {

  // En este CONTENT debo poner los archivos que quiero que lleve tailwind
  content: [
    // va a buscar todos los archivos con extension blade
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

