<?php

namespace Utilidad;

interface LeerEscribirCSV {
    public static function fromCSV(string $linea) : mixed;
    public function toCSV() : string;
}