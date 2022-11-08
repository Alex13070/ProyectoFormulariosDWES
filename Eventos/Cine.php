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



    public function  toCSV() : string {
        return "Cine;" . parent::toCSV() . ";" . $this->pelicula->toCSV();
    }


	public static function  fromCSV(string $cadena): Evento {
        
        return new Cine();
	}
}

?>