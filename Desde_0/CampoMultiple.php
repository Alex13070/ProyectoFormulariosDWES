<?php
use Desde_0\Campo;
use Desde_0\TiposInput;

abstract class CampoMultiple extends Campo{

    private array $opciones;

    public function __construct(string $label = "", string $name = "", string $id = "",TiposInput $type) {
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

    abstract function addOpcion() : array;
}


?>