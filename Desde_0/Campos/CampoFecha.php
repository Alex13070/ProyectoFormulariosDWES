<?php

namespace Desde_0\Campos;

use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\TiposInput;
use Desde_0\Validaciones;

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

	public function validarCampos(HttpMethod $method): bool {
        
        return Validaciones::getSingletone($method)->validarFecha($this->getName());

	}
}

?>