<?php

namespace Eventos;

use Grupo;
use Utilidad\Fecha;
use Utilidad\LeerEscribirCSV;

class Concierto extends Evento implements LeerEscribirCSV{

    private array $grupos;

    public function __construct(string $nombre, Fecha $fecha, string $lugar, int $tarifa, int $aforoMaximo) {
        parent::__construct($nombre, $fecha, $lugar, $tarifa, $aforoMaximo);
        $this->grupos = [];
    }
    
    public function getGrupos() : array{
        return $this->grupos;
    }


    public function addGrupo(Grupo $grupo){
        $this->grupos[] = $grupo;
    }

    public function toCSV() : string {
        return "Concierto;" . 
            parent::toCSV() . ";" . 
            count($this->grupos) . ";" . 
            array_reduce($this->grupos, function(string $acumulador, Grupo $grupo) {
                $acumulador . ";" . $grupo->toCSV();
            }, "");
    }


	public static function fromCSV(string $linea) : mixed{
        $array = explode(";", $linea);
        $concierto = new Concierto ($array[0], Fecha::fromDDMMYYYY($array[1]), $array[2], intval($array[3]), intval($array[4]));

        for ($i=6; $i < intval($array[5]); $i++) { 
            $concierto->addGrupo(Grupo::fromCSV($array[$i]));
        }

        return $concierto;
	}
}

?>