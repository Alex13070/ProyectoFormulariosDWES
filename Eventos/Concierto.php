<?php

namespace Eventos;

use Grupo;
use Utilidad\EstiloMusical;
use Utilidad\Fecha;
use Utilidad\LeerEscribirCSV;

class Concierto extends Evento implements LeerEscribirCSV{

    private const NO_DATA = "Sin asignar";

    private Grupo $grupo;

    public function __construct(string $nombre, Fecha $fecha, string $lugar, int $tarifa, int $aforoMaximo, string $nombreGrupo = Concierto::NO_DATA, EstiloMusical $estilo = EstiloMusical::NONE) {
        parent::__construct($nombre, $fecha, $lugar, $tarifa, $aforoMaximo);
        $this->grupo = new Grupo ($nombreGrupo, $estilo);
    }
    
    public function getGrupo() : Grupo{
        return $this->grupo;
    }


    public function setGrupo(Grupo $grupo){
        $this->grupo = $grupo;
    }

    public function toCSV() : string {
        return "Concierto;" . 
            parent::toCSV() . ";" . 
            $this->grupo->toCSV();
    }


	public static function fromCSV(string $linea) : mixed{
        $array = explode(";", $linea);
        $concierto = new Concierto (
            $array[0], 
            Fecha::fromDDMMYYYY($array[1]), 
            $array[2], 
            intval($array[3]), 
            intval($array[4])
        );
        $concierto->setGrupo(Grupo::fromCSV($array[5]));

        return $concierto;
	}
}

?>