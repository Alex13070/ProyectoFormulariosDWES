<?php

namespace Eventos;

use Exception;
use Utilidad\Fecha;
use Utilidad\LeerEscribirCSV;
use Utilidad\Regex;

abstract class Evento implements LeerEscribirCSV{

    private string $nombre;
    private Fecha $fecha;
    private string $lugar;
    private int $tarifa;
    private int $aforoMaximo;

    public function __construct(string $nombre, Fecha $fecha, string $lugar, int $tarifa, int $aforoMaximo) {
        $this->nombre = $nombre;
        $this->setFecha($fecha);
        $this->lugar = $lugar;
        $this->tarifa = $tarifa;
        $this->aforoMaximo = $aforoMaximo;
    }

    // Getters y setters de Evento 
    public function getNombre() : string {
        return $this->nombre;
    }

    public function setNombre(string $nombre) : Evento {
        $this->nombre = $nombre;
        return $this;
    }

    public function getFecha() : Fecha {
        return $this->fecha;
    }

    /**
     * Funcion para asignarle valor a la fecha. 
     * @param $fecha fecha del evento
     * @throws Exception En caso de que la fecha introducida sea anterior a la fecha actual.
     */
    public function setFecha(Fecha $fecha) : Evento {
        if ($fecha->antesDeHoy()) {
            throw new Exception("La fecha introducida debe ser posterior a la actual.");
        }

        $this->fecha = $fecha;

        return $this;
    }

    public function getLugar() : string {
        return $this->lugar;
    }

    public function setLugar(string $lugar) : Evento {
        $this->lugar = $lugar;
        return $this;
    }

    public function getTarifa() : int {
        return $this->tarifa;
    }

    public function setTarifa(int $tarifa) : Evento {
        $this->tarifa = $tarifa;
        return $this;
    }

    public function getAforoMaximo(): int {
        return $this->aforoMaximo;
    }

    public function setAforoMaximo(int $aforoMaximo) : Evento {
        $this->aforoMaximo = $aforoMaximo;
        return $this;
    }
    public function toCSV() : string {
        return $this->nombre . ";" . $this->fecha->__toString() . ";" . $this->lugar . ";" . $this->tarifa . ";" . $this->aforoMaximo;
    }

    //VALIDACIONES DE EVENTO (HAY QUE MODIFICARLAS)
    public static function validarNombreEvento(){
        if(empty($_POST["nombre"])){
            $errores["nombre"] = 'Escribe un nombre';
        }else {
            if(preg_match(Regex::NOMBRE->value, $_POST['nombre'])){
                $nombre = $_POST["nombre"];
            }else $errores["nombre"] = 'Solo se permiten letras, espacios y guiones';
        }
    }

    public static function validarFechaEvento(){
        $fechatoDate = Fecha::fromDDMMYYYY($_POST["fecha"]);
        if($fechatoDate->despuesDeHoy()==false || empty($_POST["fecha"])){
            $errores["fecha"] = "Escribe una fecha valida";
        }else $fecha = $_POST["fecha"];
    }

    public static function validarLugarEvento(){
        if(empty($_POST["lugar"])){
            $errores["lugar"] = 'Escribe una calle';
        }else {
            if(preg_match(Regex::NOMBRE->value, $_POST['lugar'])){
                $lugar = $_POST["lugar"];
            }else $errores["lugar"] = 'Escribe la calle correctamente';
        }
    }

    public static function validarTarifaEvento(){
        if(empty($_POST["tarifa"]) || !is_int($_POST["tarifa"])){
            $errores["tarifa"] = 'Escribe una tarifa';
        }else {
            if($_POST["tarifa"]>=0 && $_POST["tarifa"]<=20){
                $tarifa = $_POST["tarifa"];
            }else $errores["tarifa"] = 'Tarifa maxima = 20€';
        }
    }

    public static function validarAforoEvento(){
        if(empty($_POST["aforo"]) || !is_int($_POST["aforo"])){
            $errores["aforo"] = 'Escribe un aforo';
        }else {
            if($_POST["aforo"]>=0 && $_POST["aforo"]<=150){
                $aforo = $_POST["aforo"];
            }else $errores["aforo"] = 'Aforo maximo = 150 personas';
        }
    }
}
?>