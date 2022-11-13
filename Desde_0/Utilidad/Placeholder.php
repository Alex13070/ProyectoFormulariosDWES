<?php

namespace Desde_0\Utilidad;

trait Placeholder{

    private string $placeholder;

    public function getPlaceholder() : string{
        return $this->placeholder;
    }

    public function setPlaceholder($placeholder){
        $this->placeholder = $placeholder;
    }
    
}

?>