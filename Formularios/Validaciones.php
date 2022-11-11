<?php
namespace Formularios;

use Exception;
use Utilidad\Regex;
use Utilidad\EstiloMusical;
use Utilidad\Fecha;
use Utilidad\Genero;
use Utilidad\HttpMethod;

class Validaciones
{
    private array $peticion;

    public function __construct(HttpMethod $metodo){
        switch ($metodo) {
            case HttpMethod::GET:
                $this->peticion = $_GET;
                break;
            case HttpMethod::POST:
                $this->peticion = $_POST;
                break;
            default:
                throw new Exception("Metodo no soportado");
                break;
        }
    }

    public function validarNombre(string $campoNombre) : bool{
        return $this->validar(Regex::NOMBRE, $campoNombre);
    }
    
    public function validarNumero(string $campoNumero ) : bool{
        return $this->validar(Regex::NUMERO, $campoNumero);
    }

    public function validarTelefono(string $campoTelefono) : bool{
        return $this->validar(Regex::TELEFONO, $campoTelefono);
     }

    public function validarCorreo(string $campoCorreo) : bool{
        return $this->validar(Regex::CORREO, $campoCorreo);
    }

    private function validar(Regex $regex, string $campo ) : bool {
        return preg_match($regex->value, $this->peticion[$campo]);
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