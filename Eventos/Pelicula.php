<?php

namespace Eventos;

use Utilidad\Genero;
use Utilidad\LeerEscribirCSV;
use Formularios\Validaciones;


class Pelicula implements LeerEscribirCSV{

    private string $nombre;
    private int $duracion;
    private array $generos;

    //Constructor

    public function __construct(string $nombre, int $duracion, array $generos = []){
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->generos = $generos;
    }


    //Getters y setters de los atributos

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDuracion(){
        return $this->duracion;
    }

    public function setDuracion($duracion){
        $this->duracion = $duracion;

    }

    public function getGeneros() : array{
        return $this->generos;
    }
    
    public function addGenero(Genero $genero){
        $this->generos[] = $genero;
        return $this;
    }

    public static function fromCSV(string $linea) : mixed {
        $array = explode(";", $linea);

        $pelicula = new Pelicula($array[0], intval($array[1]));

        for ($i=3; $i < (3+intval($array[2])); $i++) { 
            $pelicula->addGenero(
                Genero::fromValue($array[$i])
            );
        }

        return $pelicula;
    }
    // nombre;5;3;Acción;Comedia;Ciencia Ficción
    public function  toCSV() : string {
        return $this->nombre . ";" . 
            $this->duracion . ";" . 
            count($this->generos) . ";" . 
            array_reduce($this->generos, function(string $acumulador, Genero $genero) {
                return $acumulador . ";" . $genero->value;
            }, "");
    }

    //VALIDACIONES DE PELICULA (HAY QUE MODIFICARLAS)

   /* 
    public static function validarNombrePelicula(){
        if(isset($_POST["nombrepelicula"]) && !empty($_POST["nombrepelicula"])){
            $nombre = $_POST["nombrepelicula"];
        }else {
            $errores["nombrepelicula"] = 'Escribe el nombre de la película';
        }
    }
    */
    public function validarNombrePelicula(){

    }
    public static function validarDuracionPelicula(){
        if(empty($_POST["duracion"]) || !is_int($_POST["duracion"])){
            $errores["duracion"] = 'Escribe la duración de la película';
        }else {
            if($_POST["duracion"]>0){
                $duracion = $_POST["duracion"];
            }else $errores["duracion"] = 'La duración no puede ser negativa';
        }
    }

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
}
?>