<?php

namespace Desde_0;
use Desde_0\CampoMultiple;
use Desde_0\TiposInput;

class CampoRadio extends CampoMultiple{

    private string $value;

    public function __construct(string $label = "", string $name = "",TiposInput $type = TiposInput::RADIO_BUTTON, string $id = "",string $value = "") {
        parent::__construct($label, $name, $type, $id);
        $this->opciones = [];   
        $this->value = $value;
    }



    public function contenidoCampos() : string {
        return "<label class='form-label'>". $this->getLabel() ."</label>"       
            . array_reduce($this->getOpciones(), function(string $acumulador, OpcionRadio $opcion) {
                return $acumulador.$opcion->pintarOp();
        }, "");
    } 



    public function getValue(){
        return $this->value;
    }


    public function setValue($value){
        $this->value = $value;

        return $this;
    }

    


}
?>