<?php

namespace Desde_0;
use Desde_0\CampoTexto;
use Desde_0\TiposInput;


class CampoEmail extends CampoTexto{


    public function __construct(string $label = "", string $name = "",TiposInput $type = TiposInput::EMAIL ,string $id = "", string $placeholder = "") {
        parent::__construct($label, $name, $type, $id,$placeholder);
        $this->placeholder = $placeholder;    
    }

    public function contenidoCampos() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' type='" . $this->getType()->value . "' id='" . $this->getid() . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."'>
        ";
    }

}


?>