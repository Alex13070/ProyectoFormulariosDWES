<?php

namespace Desde_0\Campos;

use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\OpcionRadio;
use Desde_0\Utilidad\TiposInput;
use Desde_0\Validaciones;

class CampoRadio extends CampoMultiple{

    private string $value;

    public function __construct(string $label = "", string $name = "",TiposInput $type = TiposInput::RADIO_BUTTON, string $id = "",string $value = "") {
        parent::__construct($label, $name, $type, $id);
        $this->opciones = [];   
        $this->value = $value;
    }


    public function contenidoCampos() : string {
        return "<div class='mb-3'> 
            <label class='form-label'>". $this->getLabel() ."</label>"       
            . array_reduce($this->getOpciones(), function(string $acumulador, OpcionRadio $opcion) {
                return $acumulador.$opcion->pintarOp();
        }, "")."</div>";
    } 

    public function getValue(){
        return $this->value;
    }


    public function setValue($value){
        $this->value = $value;

        return $this;
    }


	public function validarCampos(HttpMethod $method): bool {

        return Validaciones::getSingletone($method)->validarRadio($this->getName());

	}

}

?>