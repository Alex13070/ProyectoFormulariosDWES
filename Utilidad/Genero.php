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

    case NONE = "None";

    public static function fromValue(string $genero) : Genero{
        $genero = Genero::NONE;

        switch($genero) {
            case 'Acción':
                $genero = Genero::ACCION;
                break;
            case 'Aventura':
                $genero = Genero::AVENTURA;
                break;
            case 'Catástrofe':
                $genero = Genero::CATASTROFE;
                break;
            case 'Ciencia ficción':
                $genero = Genero::CIENCIA_FICCION;
                break;
            case 'Comedia':
                $genero = Genero::COMEDIA;
                break;    
            case 'Documentales':
                $genero = Genero::DOCUMENTALES;
                break;  
            case 'Drama':
                $genero = Genero::DRAMA;
            case 'Fantasía':
                $genero = Genero::FANTASIA;
                break;  
            default: 
                $genero = Genero::NONE;
        }

        return $genero;

    }

}

?>