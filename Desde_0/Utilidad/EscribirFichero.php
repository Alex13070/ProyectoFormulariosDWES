<?php

namespace Desde_0\Utilidad;
use Exception;

class EscribirFichero{

    private array $array = [];
    
    private static EscribirFichero $singletone;
    
    
    private function __construct(HttpMethod $method) {
        switch ($method) {
            case HttpMethod::GET:
                $this->array = $_GET;
                break;
            case HttpMethod::POST:
                $this->array = $_POST;
                break;
            default:
                throw new Exception("Método no soportado.");
        }
    }

    /*
    public function rellenarFichero(){

        $cadena = "";

        for($i = 0;$i < count($this->array);$i++){
    
        
                if($i == $this->array[count($this->array) -1]){
                    $cadena += $this->array[$i] . "\n";
                }else{
                    $cadena += $this->array[$i] . ";";
                }
        }

        return $cadena;

    }
    */

    public function getSingletone($method) : EscribirFichero {
        return is_null(EscribirFichero::$singletone) ? new EscribirFichero($method) : EscribirFichero::$singletone;
    }


    public function getArray(){
        return $this->array;
    }

    public function setArray($array){
        $this->array = $array;

        return $this;
    }

}

$fichero = new EscribirFichero(HttpMethod::POST);

$fichero->getSingletone(HttpMethod::POST);

?>