<?php

namespace Eventos;

class Cine extends Evento{

    private Pelicula $pelicula;


    

    //Getter y setter de pelicula

    public function getPelicula() : Pelicula{
        return $this->pelicula;
    }


    public function setPelicula(Pelicula $pelicula){
        $this->pelicula = $pelicula;

    }
}

?>