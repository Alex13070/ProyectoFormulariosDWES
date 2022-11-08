<?php

namespace Utilidad;

enum EstiloMusical : string {

    case CLASICA = "Clásica";
    case JAZZ = "Jazz";
    case ROCK = "Rock";
    case METAL = "Metal";
    case DISCO = "Disco";
    case POP = "Pop";
    case TRAP = "Trap";
    case REGGAETON = "Reggaeton";
    case NONE = "None";

    public static function fromValue(string $value) : EstiloMusical {
        $estilo = EstiloMusical::NONE;

        switch ($value) {
            case "Clásica":
                $estilo = EstiloMusical::CLASICA;
                break;
            case "Jazz":
                $estilo = EstiloMusical::JAZZ;
                break;

            case "Rock":
                $estilo = EstiloMusical::ROCK;
                break;
            case "Metal":
                $estilo = EstiloMusical::METAL;
                break;
            case "Disco":
                $estilo = EstiloMusical::DISCO;
                break;

            case "Pop":
                $estilo = EstiloMusical::POP;
                break;
            case "Trap":
                $estilo = EstiloMusical::TRAP;
                break;
            case "Reggaeton":
                $estilo = EstiloMusical::REGGAETON;
                break;
            default:
                $estilo = EstiloMusical::NONE;
                break;
        }


        return $estilo;
    }

}

?>