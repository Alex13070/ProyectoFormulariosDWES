<?php

namespace Eventos;


class Pelicula {

    private string $nombre;
    private int $duracion;
    private array $generos;

    //Constructor

    public function __construct(string $nombre,int $duracion,array $generos){
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

    public function  toCSV() : string {
        return "Pelicula;" . $this->pelicula;
    }
    public function getGeneros() : array{
        return $this->generos;
    }

    public function setGeneros(array $generos){
        $this->generos = $generos;

        return $this;
    }
}

?>