<?php

namespace Formularios;

use Eventos\Cine;
use Eventos\Concierto;
use Eventos\Evento;
use Eventos\FactoriaEvento;
use Exception;

class AccesoADatos {

    private array $eventos;
    
    private static AccesoADatos $singletone;

    private function __construct() {
        
    }

    public function getSingletone() : AccesoADatos {
        return is_null(AccesoADatos::$singletone) ? new AccesoADatos() : AccesoADatos::$singletone;
    }

    public function guardarEvento(Evento $evento) {

        if (gettype($evento) === "Cine") {
            $evento->toCSV();
            //TODO: Guardar en fichero de eventos de cine //TODO: Poner los ficheros

        } else if (gettype($evento) === "Concierto") {
            $evento->toCSV();
            //TODO: Guardar en fichero de eventos de concierto

        }
        else {
            // Boom
            throw new Exception("El tipo introducido no es válido");
        }
        
    }

    public function leerEventosCine() : array {
        $lineas = ""; //TODO: Poner los ficheros
        $array = explode("\n", $lineas);

        return array_map(function (string $linea) : Cine{  
            return FactoriaEvento::getEventoFromCSV($linea);
        }, $array);
    }

    public function leerEventosConcierto() : array {
        $lineas = ""; //TODO: Poner los ficheros
        $array = explode("\n", $lineas);

        return array_map(function (string $linea) : Concierto{  
            //Usamos factoria por si acaso tenemos problemas
            return FactoriaEvento::getEventoFromCSV($linea);
        }, $array);
    }
}

?>