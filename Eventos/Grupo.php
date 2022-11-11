<?php

use Utilidad\EstiloMusical;
use Utilidad\LeerEscribirCSV;

class Grupo implements LeerEscribirCSV{

    private string $nombre;
    private EstiloMusical $estilo;

    public function __construct(string $nombre,EstiloMusical $estilo){
        $this->nombre = $nombre;
        $this->estilo = $estilo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }


    public function getEstilo(){
        return $this->estilo;
    }

    public function setEstilo($estilo){
        $this->estilo = $estilo;
    }

    public function  toCSV() : string {
        return $this->nombre . "$/$" . $this->estilo;
    }

    public static function fromCSV(string $linea) : mixed {
        $array = explode("$/$", $linea);

        return new Grupo ($array[0], EstiloMusical::fromValue($array[1]));
    }
    
        //VALIDACIONES DE GRUPO (HAY QUE MODIFICARLAS)
    public static function validarNombreGrupo(){
        if(isset($_POST["nombregrupo"]) && !empty($_POST["nombregrupo"])){
            $nombre = $_POST["nombregrupo"];
        }else {
            $errores["nombregrupo"] = 'Escribe el nombre de el grupo';
        }
    }

    public static function validarEstiloGrupo(){
        $correcto=true;
        $cont=0;
        if(!empty($_POST["estilomusical[]"])){
            for($i=0; $i<count($_POST["estilomusical[]"]) && $correcto; $i++){
                if(EstiloMusical::fromValue($_POST["estilomusical[".$i."]"]) == EstiloMusical::NONE){
                    $errores["estilomusical"] = "Genero musical no valido";
                    $correcto=false;
                }else $estilomusical[$cont++] = $_POST["estilomusical[".$i."]"];  
            }
        }else $errores["estilomusical[]"] = "No ha introducido ningun genero musical";
    }
}

?>