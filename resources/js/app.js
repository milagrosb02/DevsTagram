import Dropzone from "dropzone";

Dropzone.autoDiscover = false;


// Creo una nueva instancia de lo que estoy importando
// Pongo el id de la vista "create.blade" porque ahi uso dropzone
const dropzone = new Dropzone('#dropzone', {

    dictDefaultMessage: 'Sube aquí tu imagen', 

    acceptedFiles: ".png, .jpg, jpeg, .gif",

    // esto permite al usuario eliminar la imagen
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',

    maxFiles: 1,

    uploadMultiple: false,

})