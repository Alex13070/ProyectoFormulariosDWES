<?php

namespace Desde_0\Utilidad;

abstract class Opcion{

    private string $value;

    private string $label;


    public function __construct(string $label = "", string $value = "") {
        $this->label = $label;
        $this->value = $value;
    }

    public function getValue(){
        return $this->value;
    }


    public function setValue($value){
        $this->value = $value;

        return $this;
    }

 
    public function getLabel(){
        return $this->label;
    }


    public function setLabel($label){
        $this->label = $label;

        return $this;
    }

    abstract function pintarOp() : string;
}


?>