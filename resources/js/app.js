import Dropzone from "dropzone";

Dropzone.autoDiscover = false;


// Creo una nueva instancia de lo que estoy importando
// Pongo el id de la vista "create.blade" porque ahi uso dropzone
const dropzone = new Dropzone('#dropzone', {

    dictDefaultMessage: 'Sube aquí tu imagen', 

    acceptedFiles: ".png, .jpg, .jpeg, .gif",

    // esto permite al usuario eliminar la imagen
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',

    maxFiles: 1,

    uploadMultiple: false,

});


// evento de dropzone para ver como se esta mandando el archivo
// file-> archivo, xhr-> peticion, 
dropzone.on('sending', function(file, xhr, formData) {
    console.log(formData);
})


// evento de dropzone en caso de que la imagen se suba correctamente
dropzone.on('success', function(file, response){
    console.log(response);
})


// evento de dropzone en caso de que la imagen NO se suba correctamente
dropzone.on('error', function(file, message){
    console.log(message);
})



// evento de dropzone para borrar un archivo
dropzone.on('removedfile', function(){
    console.log("Archivo eliminado");
})