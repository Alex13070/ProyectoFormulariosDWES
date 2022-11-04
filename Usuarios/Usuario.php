<?php

namespace Usuarios;

class Usuario 
{
    private string $nombre;
    private string $correo;
    private string $telefono;
    private string $password;

    
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