<?php

namespace Formularios;

use Eventos\Evento;
use Exception;

use function PHPSTORM_META\type;

class AccesoADatos {
    
    private static AccesoADatos $singletone;

    private function __construct() {
        
    }

    public function getSingletone() : AccesoADatos {
        return is_null(AccesoADatos::$singletone) ? new AccesoADatos() : AccesoADatos::$singletone;
    }

    public function guardarEvento(Evento $evento) {
        if (gettype($evento) === "Cine") {

            // Guardar en fichero de eventos de cine

        } else if (gettype($evento) === "Concierto") {

            // Guardar en fichero de eventos de concierto

        }
        else {
            // Boom
            throw new Exception("El tipo introducido no es válido");
        }
        
    }

    public function leerEventosCine()
    {
        # code...
    }
}

?>