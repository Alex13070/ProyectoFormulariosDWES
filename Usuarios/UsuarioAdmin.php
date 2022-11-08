<?php

namespace Usuarios;

class UsuarioAdmin extends Usuario{

    /*
        Funcion para crear un evento 
    */
    function crearEvento(){
        return "El usuario admin ha creado un evento";
    }

    /*
        Funcion para eliminar un evento 
    */
    function eliminarEvento(){
        return "El usuario admin ha eliminado un evento";
    }

}

?>