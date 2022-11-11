<?php

namespace Eventos;

use Utilidad\Genero;
use Utilidad\LeerEscribirCSV;


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
}

?>