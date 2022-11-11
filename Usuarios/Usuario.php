<?php

namespace Usuarios;
use Utilidad\LeerEscribirCSV;

class Usuario implements LeerEscribirCSV {
    private string $nombre;
    private string $correo;
    private string $telefono;
    // private string $password;

    private Sexo $sexo;


    //CONSTRUCTOR

    public function __construct(string $nombre,string $correo,string $telefono/*,string $password*/, Sexo $sexo) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        //$this->password = $password;
        $this->sexo = $sexo;
    }
    
    //GETTER SETTER NOMBRE
    public function getNombre():string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }


    //GETTER Y SETTER CORREO
    public function getCorreo():string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo)
    {
        $this->correo = $correo;

        return $this;
    }

   //GETTER Y SETTER TELEFONO
    public function getTelefono():string
    {
        return $this->telefono;
    }

   
    public function setTelefono(string $telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    //GETTER Y SETTER PASSWORD
    /*
    public function getPassword():string
    {
        return $this->password;
    }
    */
    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

   /*
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    */
    public static function fromCSV(string $linea) : mixed{
        $array = explode(";", $linea);
        return new Usuario($array[0], $array[1], $array[2], /*$array[3],*/ Sexo::from($array[4]));
    }
    
    public function toCSV() : string {
        return $this->nombre . ";" . $this->correo . ";" . $this->telefono . /*";" . $this->password .*/ ";" . $this->sexo;
    }

	public function validarDatos(): bool {
	}
}

?>