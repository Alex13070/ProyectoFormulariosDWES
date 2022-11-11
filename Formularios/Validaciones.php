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
        }
    }

    public function validarNombre(string $campoNombre) : string|null{
        return $this->validar(Regex::NOMBRE, $campoNombre) ? $this->peticion[$campoNombre] : null;
    }
    
    public function validarNumero(string $campoNumero ) : bool{
        return $this->validar(Regex::NUMERO, $campoNumero);
    }

    public function validarNumeroConRangos(string $campoNumero, int $minimo, int $maximo) : int|null{
        $retorno = null;
        if ($this->validar(Regex::NUMERO, $campoNumero)) {
            $numero = intval($this->peticion[$campoNumero]);
            if ($numero > $minimo && $numero < $maximo) {
                $retorno = $numero;
            }
        }

        return $retorno;
    }

    public function validarTelefono(string $campoTelefono) : string|null{
        return $this->validar(Regex::TELEFONO, $campoTelefono) ? $this->peticion[$campoTelefono] : null;
    }

    public function validarCorreo(string $campoCorreo) : bool{
        return $this->validar(Regex::CORREO, $campoCorreo);
    }
    
    private function validar(Regex $regex, string $campo ) : bool {
        return isset($this->peticion[$campo]) && preg_match($regex->value, $this->peticion[$campo]);
    }

}
/*
function validar()
{
    if (isset($_POST["enviar"])) {

            if ($_POST["evento"] === "cine") {
                // Creo y valido datos de cine

            }
            else if ($_POST["evento"]  === "concierto") {
                // Creo y valido concierto
            }
            else {
                throw new Exception ("Tipo no valido");
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
*/