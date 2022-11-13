<?php

namespace Desde_0;
use Desde_0\TiposInput;

class CampoNumber extends CampoTexto{
    private int $maximo;
    private int $minimo;

    public function __construct(string $label = "", string $name = "", string $placeholder = "", string $id = "", mixed $minimo = "", mixed $maximo = "") {
        parent::__construct($label, $name, TiposInput::NUMBER, $id, $placeholder);
        $this->minimo = $minimo;
        $this->maximo = $maximo;
        $this->placeholder = $placeholder;
    }

    public function contenidoCampos() : string {
        return "
            <label class='form-label'>". $this->getLabel() ."</label>
            <input class='form-control' id='" . $this->getId() . "' type='" . $this->getType()->value . "' name='". $this->getName() ."' placeholder='". $this->getPlaceholder() ."' min='" . $this->minimo . "' max='" . $this->maximo . "'>
        ";
    }
}

?>