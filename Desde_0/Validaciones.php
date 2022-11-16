<?php

namespace Desde_0;
use Desde_0\Utilidad\HttpMethod;
use Exception;
use Desde_0\Utilidad\ExpReg;
use Desde_0\Utilidad\Genero;
use Desde_0\Utilidad\Fecha;

class Validaciones{

    private array $peticion;

    private static ?Validaciones $singletone = null;

    //constructor que define peticion como GET o POST en base al HttpMethod
    private function __construct(HttpMethod $metodo){
        switch($metodo) {
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

    public static function getSingletone($method) : Validaciones {
        return is_null(Validaciones::$singletone) ? new Validaciones($method) : Validaciones::$singletone;
    }
        //validaciones generales
    private function validarGeneral(ExpReg $regex, string $campo) : bool{
        return isset($this->peticion[$campo]) && preg_match($regex->value, $this->peticion[$campo]);
    }

    public function validarEmail(string $campoEmail) : bool{
        return $this->validarGeneral(ExpReg::CORREO, $campoEmail);
    }

    //validaciones especificas


    public function validarNombre(string $campoNombre) : bool{
        return $this->validarGeneral(ExpReg::NOMBRE, $campoNombre);
    }

    public function validarNumero(string $campoNumero) : bool{
        return $this->validarGeneral(ExpReg::NUMERO, $campoNumero);
    }



    public function validarFecha(string $campoFecha) : bool{
        return  (Fecha::fromYYYYMMDD($this->peticion[$campoFecha]))->despuesDeHoy();  
    }

    public function validarRadio(string $campoRadio) : bool{
        // Van a ser generos siempre
        $valido = false;

        if (isset($this->peticion[$campoRadio])) {
            $generos = array_map(function (Genero $genero) : string {
                return $genero->value;
            }, Genero::cases());

            $valido = (gettype($this->peticion[$campoRadio]) == "string") &&  in_array($this->peticion[$campoRadio], $generos);
        }
    
        return $valido;
    }

    /*CHECKBOX 
        public static function validarGeneroPelicula(){
            $correcto=true;
            $cont=0;
            if(!empty($_POST["genero[]"])){
                for($i=0; $i<count($_POST["genero[]"]) && $correcto; $i++){
                    if(Genero::fromValue($_POST["genero[".$i."]"]) == Genero::NONE){
                        $errores["genero"] = "Genero no valido";
                        $correcto=false;
                    }else $genero[$cont++] = $_POST["genero[".$i."]"];  
                }
            }else $errores["genero[]"] = "No ha introducido ningun genero";
        }
        $this->validarSubmit($this->peticion["Enviar"]);
        $this->validarNombre($this->peticion["Nombre"]);
        $this->validarNumero($this->peticion["Numero"]);
        $this->validarEmail($this->peticion["Email"]);
        $this->validarFecha($this->peticion["Fecha"]);
        */


    /**
     * Get the value of singletone
     */ 




}

?>