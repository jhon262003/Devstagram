import Dropzone from "dropzone";
/**
 para usar las dependencias de dropzone
 primero debemos de ejecutar el comando "npm install --save dropzone" en la terminal y luego añadir 
 <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
 en la hoja de trabajo HTML
 */

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks:true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on('sending', function(file, xhr, formData){
    console.log(formData)
});

dropzone.on('success', function(file, response){
    console.log(response)
});

dropzone.on('sending', function(file, message){
    console.log(message)
});

dropzone.on('removedfile', function(){
    console.log("Archivo Eliminado")
});
