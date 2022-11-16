<?php

namespace Desde_0\Utilidad;

use Desde_0\GenerarFormulario;

class Evento{
    
    public const NOMBRE = 'nombre';
    public const EMAIL = 'email';
    public const NOMBRE_GRUPO = 'nombre_grupo';
    public const PRECIO_ENTRADA = 'precio';
    public const FECHA = 'fecha';
    public const AFORO = 'aforo';
    public const OPCIONES = 'name';

    /**
     * Publicas por falta de tiempo, la vida es dura
     */
    public string $nombre;
    public string $email;
    public string $nombreGrupo;
    public string $precioEntrada;
    public string $fecha;
    public string $aforo;
    public string $opciones;

    private function __construct(string $nombre,string $email,string $nombreGrupo,string $precioEntrada,string $fecha,string $aforo,string $opciones) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->nombreGrupo = $nombreGrupo;
        $this->precioEntrada = $precioEntrada;
        $this->fecha = $fecha;
        $this->aforo = $aforo;
        $this->opciones = $opciones;
    }

    public static function fromForm(GenerarFormulario $form, array $peticion) : Evento|null {
        $evento = null;
        if ($form->validarForm()) {
            try {
                $evento = new Evento (
                    $peticion[self::NOMBRE],
                    $peticion[self::EMAIL],
                    $peticion[self::NOMBRE_GRUPO],
                    $peticion[self::PRECIO_ENTRADA],
                    $peticion[self::FECHA],
                    $peticion[self::AFORO],
                    $peticion[self::OPCIONES]
                );
            } catch (\Exception $e) {
                $evento = null;
            }

        }
        return $evento;

    }

    public function toCSV(){
        return $this->nombre .";" . $this->email . ";"  .  $this->nombreGrupo . ";" . $this->precioEntrada . ";" . $this->fecha . ";" . $this->aforo . ";" . $this->opciones;
    }

    public static function fromCSV(string $linea) : Evento|null {
        $array = explode(";", $linea);

        try {
            $evento = new Evento ($array[0], $array[1], $array[2], $array[3], $array[4], $array[5], $array[6]);
        } catch (\Throwable $th) {
            $evento = null;
        }
        
        return $evento;
    }

}

?>