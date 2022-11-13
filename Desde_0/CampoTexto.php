<?php

namespace Desde_0;
use Desde_0\Campo;
use Desde_0\TiposInput;


class CampoTexto extends Campo{

    use Placeholder;

    public function __construct(string $label = "", string $name = "", TiposInput $type = TiposInput::TEXT, string $id = "",string $placeholder = "") {
        parent::__construct($label, $name, $type, $id);
        $this->placeholder = $placeholder;    
    }

    public function getPlaceholder() : string {
        return $this->placeholder;
    }

    public function setPlaceholder(string $placeholder) : Campo{
        $this->placeholder = $placeholder;
        return $this;
    }

    public function contenidoCampos() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' type='" . $this->getType()->value . "' id='" . $this->getid() . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."'>
        ";
    }

}

?>