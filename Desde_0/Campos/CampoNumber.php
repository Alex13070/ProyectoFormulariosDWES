<?php


namespace Desde_0\Campos;
use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\TiposInput;
use Desde_0\Validaciones;





class CampoNumber extends CampoTexto{
    private int $maximo;
    private int $minimo;

    public function __construct(string $label = "", string $name = "",TiposInput $type = TiposInput::NUMBER ,string $id = "",string $placeholder = "",mixed $minimo = "", mixed $maximo = "",string $error = "") {
        parent::__construct($label, $name, $type, $id, $placeholder,$error);
        $this->minimo = $minimo;
        $this->maximo = $maximo;
        $this->placeholder = $placeholder;
    }

    public function contenidoCampos() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."' min='" . $this->minimo . "' max='" . $this->maximo . "'required >
            <div class='invalid-feedback'>
                ".$this->getError()."
            </div>
        ";
    }

    public function validarCampos(HttpMethod $method): bool {

        return Validaciones::getSingletone($method)->validarNumero($this->getName());
     
     }
}

?>