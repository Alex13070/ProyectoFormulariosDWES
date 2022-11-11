<?php
namespace Formularios;

use Exception;
use Utilidad\Regex;
use Utilidad\EstiloMusical;
use Utilidad\Fecha;
use Utilidad\Genero;

class Validaciones
{

    public static function validarNombre(string $campoNombre){
        if(preg_match(Regex::NOMBRE->value, $_POST[$campoNombre])){
        }else $errores["nombre"] = 'Solo se permiten letras, espacios, guiones y numeros';
    }
    
    public static function validarNumero(string $campoNumero){
        if(preg_match(Regex::NUMERO->value, $_POST[$campoNumero])){
        }else $errores["numero"] = 'Solo se permiten numeros';
    }

    public static function validarTelefono(string $campoTelefono){
        if(preg_match(Regex::TELEFONO->value, $_POST[$campoTelefono])){
        }else $errores["telefono"] = 'Introduce el formato correcto para un número de telefono';
    }

    public static function validarCorreo(string $campoCorreo){
        if(preg_match(Regex::CORREO->value, $_POST[$campoCorreo])){
        }else $errores["correo"] = 'Solo se permiten numeros';
    }

}

function validar()
{
    if (!empty($_POST)) {
        if (isset($_POST["enviar"])) {
            if ($_POST["enviar"] == CINE) {
                // Creo y valido datpos de cine
            }
            else if ($_POST["enviar"]  === CONCIERTO) {
                // Creo y valido concierto
            }
            else {
                throw new Exception ("Tipo no valido");
            }
        }
    }
}

const ERRORES = [];

function validarEvento() { 
    // Datos propios de evento
}

function validarCine() {
    validarEvento(); 
    // Datos propios de cine
}

function validarConcierto() {
    validarEvento(); 
    // Datos propios de concierto
}
?>