<?php

namespace Desde_0\Utilidad;
use Exception;

class EscribirFichero{

    private array $array = [];
    private bool $salir = false;
    private string $cadena = "";
    
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

    public function relllenarFichero(){

        for($i = 0;$i < count($this->array) && !$this->salir;$i++){
    
            if(!empty($array[$i])){
                if($i == $this->array[count($this->array) -1]){
                    $this->cadena += $this->array[$i] . "\n";
                }else{
                    $this->cadena += $this->array[$i] . ";";
                }
            }else $this->salir = true;
        
        }

    }

    public function getSingletone($method) : EscribirFichero {
        return is_null(EscribirFichero::$singletone) ? new EscribirFichero($method) : EscribirFichero::$singletone;
    }


    public function getSalir(){
        return $this->salir;
    }

    public function setSalir($salir){
        $this->salir = $salir;

        return $this;
    }

    public function getArray(){
        return $this->array;
    }

    public function setArray($array){
        $this->array = $array;

        return $this;
    }

    public function getCadena(){
        return $this->cadena;
    }

}

?>