<?php

namespace Eventos;

use Exception;

class FactoriaEvento {

    private const CINE = "Cine";
    private const CONCIERTO = "Concierto";

    // Concierto;...;...
    public static function getEventoFromCSV(string $lineaEvento) : Evento{
        $tipo = explode(";", $lineaEvento)[0];
        $evento = null;

        switch ($tipo) {

            case FactoriaEvento::CINE:
                $evento = Cine::fromCSV($lineaEvento);
                break;
            case FactoriaEvento::CONCIERTO:
                $evento = Concierto::fromCSV($lineaEvento);
                break;
            default: 
                throw new Exception("Tipo de evento no válido");

        }

        return $evento;
    }
}