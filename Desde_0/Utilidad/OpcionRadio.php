<?php

namespace Desde_0\Utilidad;
use Desde_0\Utilidad\TiposInput;

class OpcionRadio extends Opcion{

    private string $id;

    private string $name;


    public function __construct(string $label = "", string $value = "",string $id,string $name) {
        parent::__construct($label,$value);
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(){
        return $this->id;
    }


    public function setId($id){
        $this->id = $id;

        return $this;
    }

 
    public function getName(){
        return $this->name;
    }


    public function setName($name){
        $this->name = $name;

        return $this;
    }

	public function pintarOp(): string {

        return "
        <div class='form-check'>
            <input class='form-check-input' type='" . TiposInput::RADIO_BUTTON->value . "' name='" . $this->name . "' id='". $this->id ."' value='" . $this->getValue() . "' required>
            <label class='form-check-label' for='" . $this->id . "'> " . $this->getLabel() . " </label>
        </div>";
	}
}


?>