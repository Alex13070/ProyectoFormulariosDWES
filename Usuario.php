<?php
class Usuario 
{
    private $nombre;
    private $correo;
    private $telefono;
    private $password;

    
//GETTER SETTER NOMBRE
    public function getNombre():string
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }


//GETTER Y SETTER CORREO
    public function getCorreo():string
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

   //GETTER Y SETTER TELEFONO
    public function getTelefono():string
    {
        return $this->telefono;
    }

   
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
    //GETTER Y SETTER PASSWORD
 
    public function getPassword():string
    {
        return $this->password;
    }

   
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}




?>