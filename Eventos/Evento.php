<?php

namespace Eventos;

use Exception;
use Utilidad\Fecha;

abstract class Evento {

    private string $nombre;
    private Fecha $fecha;
    private string $lugar;
    private int $tarifa;
    private int $aforoMaximo;

    public function __construct(string $nombre, Fecha $fecha, string $lugar, int $tarifa, int $aforoMaximo) {
        $this->nombre = $nombre;
        $this->setFecha($fecha);
        $this->lugar = $lugar;
        $this->tarifa = $tarifa;
        $this->aforoMaximo = $aforoMaximo;
    }

    // Getters y setters de Evento 
    public function getNombre() : string {
        return $this->nombre;
    }

    public function setNombre(string $nombre) : Evento {
        $this->nombre = $nombre;
        return $this;
    }

    public function getFecha() : Fecha {
        return $this->fecha;
    }

    /**
     * Funcion para asignarle valor a la fecha. 
     * @param $fecha fecha del evento
     * @throws Exception En caso de que la fecha introducida sea anterior a la fecha actual.
     */
    public function setFecha(Fecha $fecha) : Evento {
        if ($fecha->antesDeHoy()) {
            throw new Exception("La fecha introducida debe ser posterior a la actual.");
        }

        $this->fecha = $fecha;

        return $this;
    }

    public function getLugar() : string {
        return $this->lugar;
    }

    public function setLugar(string $lugar) : Evento {
        $this->lugar = $lugar;
        return $this;
    }

    public function getTarifa() : int {
        return $this->tarifa;
    }

    public function setTarifa(int $tarifa) : Evento {
        $this->tarifa = $tarifa;
        return $this;
    }

    public function getAforoMaximo(): int {
        return $this->aforoMaximo;
    }

    public function setAforoMaximo(int $aforoMaximo) : Evento {
        $this->aforoMaximo = $aforoMaximo;
        return $this;
    }
    public function toCSV() : string {
        return $this->nombre . ";" . $this->fecha . ";" . $this->lugar . ";" . $this->tarifa . ";" . $this->aforoMaximo;
    }

    public  static abstract function fromCSV(string $cadena) : Evento;

}

?>