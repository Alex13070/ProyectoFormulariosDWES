<?php

namespace Entradas;

use Eventos\Evento;
use Eventos\FactoriaEvento;
use Usuarios\Usuario;
use Utilidad\LeerEscribirCSV;

class Entrada implements LeerEscribirCSV{
    private Usuario $usuario;
    private Evento $evento;

    public function __construct(Usuario $usuario, Evento $evento) {
        $this->usuario = $usuario;
        $this->evento = $evento;
    }

    public function getUsuario() : Usuario {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario) : Entrada {
        $this->usuario = $usuario;

        return $this;
    }

    public function getEvento() : Evento {
        return $this->evento;
    }

    public function setEvento(Evento $evento) : Entrada{
        $this->evento = $evento;

        return $this;
    }

    public static function fromCSV(string $linea) : mixed {
        $array = explode("$$", $linea);
        return new Entrada (
            Usuario::fromCSV($array[0]), 
            FactoriaEvento::getEventoFromCSV($array[1])
        );
    }

    public function toCSV() : string {
        return $this->usuario->toCSV() . "$$" . $this->evento->toCSV();
    }

    
	/**
	 * @return bool
	 */
	public function validarDatos(): bool {
        return false;
        
	}
}