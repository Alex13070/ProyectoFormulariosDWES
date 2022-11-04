<?php

namespace Eventos;

use Utilidad\EstiloMusical;

class Concierto extends Evento{

    private EstiloMusical $grupo;

    
    public function getGrupo() : EstiloMusical{
        return $this->grupo;
    }


    public function setGrupo(EstiloMusical $grupo){
        $this->grupo = $grupo;
    }
}

?>