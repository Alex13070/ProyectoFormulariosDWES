<?php

namespace Desde_0\Campos;

use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\TiposInput;
use Desde_0\Validaciones;

class CampoFecha extends Campo{



    public function __construct(string $label = "", string $name = "", TiposInput $type = TiposInput::DATE, string $id = "",string $error = " ") {
        parent::__construct($label, $name, $type, $id,$error);
    }



    public function contenidoCampos() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' type='" . $this->getType()->value . "' id='" . $this->getid() . "' name='". $this->getName() ."required>
            <div class='invalid-feedback'>
                ".$this->error."
            </div>          
        ";
    }

	public function validarCampos(HttpMethod $method): bool {
        
        return Validaciones::getSingletone($method)->validarFecha($this->getName());

	}
}

?>