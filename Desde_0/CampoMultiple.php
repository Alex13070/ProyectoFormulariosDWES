<?php

namespace Desde_0;
use Desde_0\Campo;
use Desde_0\TiposInput;

abstract class CampoMultiple extends Campo{

    private array $opciones;

    public function __construct(string $label = "", string $name = "",TiposInput $type = TiposInput::RADIO_BUTTON, string $id = "") {
        parent::__construct($label, $name, $type, $id);
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