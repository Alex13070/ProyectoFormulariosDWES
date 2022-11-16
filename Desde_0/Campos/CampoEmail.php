<?php


namespace Desde_0\Campos;
use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\TiposInput;
use Desde_0\Validaciones;

class CampoEmail extends CampoTexto{


    public function __construct(string $label = "", string $name = "",TiposInput $type = TiposInput::EMAIL ,string $id = "", string $placeholder = "",string $error = "") {
        parent::__construct($label, $name, $type, $id,$placeholder,$error);
        $this->placeholder = $placeholder;    
    }

    public function contenidoCampos() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' type='" . $this->getType()->value . "' id='" . $this->getid() . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."'required >
            <div class='invalid-feedback'>
            ".$this->getError()."
        </div>
        ";
    }

	public function validarCampos(HttpMethod $method): bool {

       return Validaciones::getSingletone($method)->validarEmail($this->getName());
    
	}
}


?>