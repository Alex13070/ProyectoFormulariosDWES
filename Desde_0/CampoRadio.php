<?php

use Desde_0\TiposInput;

class CampoRadio{


    private string $label;
    private string $value;
    private string $id;
    private string $name;


    public function __construct(string $label, string $value, string $id, string $name) {
        $this->label = $label;
        $this->value = $value;
        $this->id = $id;
        $this->name = $name;
    }

    public function getName() : string {
        return $this->name;
    }

    public function setName(string $name) : CampoRadio {
        $this->name = $name;
        return $this;
    }

    public function getId() : string {
        return $this->id;
    }

    public function setId(string $id) : CampoRadio {
        $this->id = $id;
        return $this;
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

    public function contenidoCampos() : string {
        return "
        <div class='form-check'>
            <input class='form-check-input' type='" . TiposInput::RADIO_BUTTON->value . "' name='" . $this->name . "' id='". $this->id ."' value='" . $this->getValue() . "'>
            <label class='form-check-label' for='" . $this->id . "'> " . $this->getLabel() . " </label> 
        </div>
        ";
    }

    
}



?>