<?php

namespace Eventos;

use Utilidad\Fecha;

class Cine extends Evento {

    private const TITULO_POR_DEFECTO = "No definido";

    private Pelicula $pelicula;


    public function __construct(string $nombre, Fecha $fecha, string $lugar, int $tarifa, int $aforoMaximo, string $nombrePeli = Cine::TITULO_POR_DEFECTO, int $duracion = 0) {
        parent::__construct($nombre, $fecha, $lugar, $tarifa, $aforoMaximo);
        $this->pelicula = new Pelicula ($nombrePeli, $duracion);
    }

    //Getter y setter de pelicula
    public function getPelicula() : Pelicula{
        return $this->pelicula;
    }


    public function setPelicula(Pelicula $pelicula){
        $this->pelicula = $pelicula;
    }



    public function  toCSV() : string {
        return "Cine;" . parent::toCSV() . ";Pelicula;" . $this->pelicula->toCSV();
    }


	public static function fromCSV(string $linea) : mixed {
        $array = explode(";Pelicula;", $linea);
        $datosCine = explode(";", $array[0]);
        $cine = new Cine ($datosCine[0], Fecha::fromDDMMYYYY($datosCine[1]), $datosCine[2], intval($datosCine[3]), intval($datosCine[4]));
        $cine->setPelicula(Pelicula::fromCSV($array[1]));
        return $cine;
	}
}

?>