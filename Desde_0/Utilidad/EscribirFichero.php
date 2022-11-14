<?php


$array = $_POST['Enviar'];
$salir = false;
$cadena = "";

for($i = 0;$i < count($array) && !$salir;$i++){

    if(!empty($array[$i])){
        if($i == $array[count($array) -1]){
            $cadena += $array[$i] . "\n";
        }else{
            $cadena += $array[$i] . ";";
        }
    }else $salir = true;

}


if(!$salir){
    
    //Guardar
    file_put_contents(
        "Eventos.csv",
        $cadena,
        FILE_APPEND
    );

    //Redireccionar
    header("Location: listado.php");

    //salir
    exit();
    
}


?>