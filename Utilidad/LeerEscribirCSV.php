<?php

namespace Utilidad;

interface LeerEscribirCSV {

    public function validarDatos() : bool;
    public static function fromCSV(string $linea) : mixed;
    public function toCSV() : string;
}