<?php

namespace Eventos;


class Concierto extends Evento{

    private array $grupos;

    
    public function getGrupos() : array{
        return $this->grupos;
    }


    public function setGrupos(array $grupos){
        $this->grupos = $grupos;
    }


    public function toCSV() : string {
        return "Concierto;" . parent::toCSV();
    }


	public static function fromCSV(string $cadena): Concierto{



	}
}

?>