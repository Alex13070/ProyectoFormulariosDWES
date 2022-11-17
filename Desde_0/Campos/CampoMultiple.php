<?php

namespace Desde_0\Campos;
use Desde_0\Utilidad\Opcion;
use Desde_0\Utilidad\TiposInput;



abstract class CampoMultiple extends Campo{

    private array $opciones;

    public function __construct(string $label = "", string $name = "",TiposInput $type = TiposInput::RADIO_BUTTON, string $id = "",string $error = "") {
        parent::__construct($label, $name, $type, $id,$error);
        $this->opciones = [];   
    }

    public function getOpciones(){
        return $this->opciones;
    }

    public function setOpciones($opciones){
        $this->opciones = $opciones;

        return $this;
    }

    public function addOpcion(Opcion $op){
        $this->opciones[] = $op;
    }
}


?>