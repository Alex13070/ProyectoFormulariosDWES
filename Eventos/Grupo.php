<?php

use Utilidad\EstiloMusical;

class Grupo {

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
        return "Grupo;" . $this->nombre . ";" . $this->estilo;
    }
}

?>