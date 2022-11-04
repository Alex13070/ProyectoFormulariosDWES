<?php

namespace Eventos;

use Utilidad\GeneroMusical;

class Pelicula {

    private string $nombre;
    private int $duracion;
    private GeneroMusical $genero;

    //Constructor

    public function __construct(string $nombre,int $duracion,GeneroMusical $genero){
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->genero = $genero;
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

    public function getGenero() : GeneroMusical{
        return $this->genero;
    }

    public function setGenero(GeneroMusical $genero){
        $this->genero = $genero;

        return $this;
    }
}

?>