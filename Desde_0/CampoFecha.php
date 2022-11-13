<?php

namespace Desde_0;
use Desde_0\Campo;
use Desde_0\TiposInput;


class CampoFecha extends Campo{



    public function __construct(string $label = "", string $name = "", TiposInput $type = TiposInput::DATE, string $id = "") {
        parent::__construct($label, $name, $type, $id);
    }



    public function contenidoCampos() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' type='" . $this->getType()->value . "' id='" . $this->getid() . "' name='". $this->getName() .">
        ";
    }

}

?>