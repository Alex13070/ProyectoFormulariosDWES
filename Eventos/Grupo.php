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
        $array = explode(";", $linea);

        return new Grupo ($array[0], EstiloMusical::fromValue($array[1]));
    }
}

?>