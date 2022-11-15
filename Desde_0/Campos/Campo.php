<?php

namespace Desde_0\Campos;

use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\TiposInput;

abstract class Campo{

    private string $label;
    private string $name;
    private TiposInput $type;
    private string $id;

    public function __construct(string $label = "", string $name = "", TiposInput $type = TiposInput::TEXT, string $id = "") {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->id = $id;
    }

    public function getId() : string{
        return $this->id;
    }

    public function setId($id) : Campo{
        $this->id = $id;
        return $this;
    }
    
    public function getLabel() : string{
        return $this->label;
    }

    public function setLabel(string $label) : Campo {
        $this->label = $label;
        return $this;
    }

    public function getName(): string {
        return $this->name;
    }
    public function setName(string $name) : Campo {
        $this->name = $name;
        return $this;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;

        return $this;
    }

    public function crearCampo() : string {
        return "
        <div class='mb-3'>
            " . $this->contenidoCampos(). "
        </div>
        ";
    }

    public abstract function contenidoCampos() : string;

    public abstract function validarCampos(HttpMethod $method) : bool;

}

?>