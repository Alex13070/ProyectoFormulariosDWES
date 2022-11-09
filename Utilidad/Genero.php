<?php

namespace Utilidad;

enum Genero : string{

    case ACCION = "Acción";
    case AVENTURA = "Aventura";
    case CATASTROFE = "Catástrofe";
    case CIENCIA_FICCION = "Ciencia ficción";
    case COMEDIA = "Comedia";
    case DOCUMENTALES = "Documentales";
    case DRAMA = "Drama";
    case FANTASIA = "Fantasía";

    /**
     * Tiene que ser SIEMPRE el ultimo
     */
    case NONE = "None";

    public static function fromValue(string $genero) : Genero{

        $array = array_filter(Genero::cases(), function (Genero $g) use ($genero) {
            return $g->value === $genero;
        });

        return (!empty($array))?$array[0]:Genero::NONE;
    }

}

?>