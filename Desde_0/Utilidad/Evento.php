<?php

namespace Desde_0\Utilidad;

use Desde_0\Campos\CampoEmail;
use Desde_0\Campos\CampoFecha;
use Desde_0\Campos\CampoNumber;
use Desde_0\Campos\CampoRadio;
use Desde_0\Campos\CampoTexto;
use Desde_0\GenerarFormulario;

class Evento{
    
    public const NOMBRE = 'nombre';
    public const EMAIL = 'email';
    public const NOMBRE_GRUPO = 'nombre_grupo';
    public const PRECIO_ENTRADA = 'precio';
    public const FECHA = 'fecha';
    public const AFORO = 'aforo';
    public const OPCIONES = 'name';



    private function __construct(string $nombre,string $email,string $nombreGrupo,string $precioEntrada,string $fecha,string $aforo,string $opciones) {

        
    }

    public static function fromForm(array $peticion) : Evento {

        return new Evento($peticion[self::NOMBRE] . ";",$peticion[self::EMAIL],$peticion[self::NOMBRE_GRUPO],$peticion[self::PRECIO_ENTRADA],$peticion[self::FECHA],$peticion[self::AFORO],$peticion[self::OPCIONES] . "\n");

    }

}

?>