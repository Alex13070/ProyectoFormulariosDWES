<?php

namespace Desde_0;
use Desde_0\Campos\CampoEmail;
use Desde_0\Campos\CampoFecha;
use Desde_0\Campos\CampoNumber;
use Desde_0\Campos\CampoRadio;
use Desde_0\Campos\CampoTexto;
use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\OpcionRadio;
use Desde_0\Utilidad\TiposInput;



spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

$form = new GenerarFormulario(" ",HttpMethod::POST);


$nombre = new CampoTexto("Nombre:","nb",TiposInput::TEXT,"nombre","Introduzca su nombre");
$email = new CampoEmail("Email:","email",TiposInput::EMAIL,"email","info@gmail.com");
$nombreGrupo = new CampoTexto("Nombre del grupo:","nb_grupo",TiposInput::TEXT,"nb_grupo","Introduzca el nombre del grupo");
$precioEntrada = new CampoNumber("Precio entrada:","precio",TiposInput::NUMBER,"precio","Introduzca el precio de la entrada",5,150);
$fecha = new CampoFecha("Fecha del evento:","fecha",TiposInput::DATE,"fecha");
$aforo = new CampoNumber("Aforo:","aforo",TiposInput::NUMBER,"aforo","Introduzca el aforo",0,500);
$opciones = new CampoRadio("Sexo:","s",TiposInput::RADIO_BUTTON,"s","F");

$opciones->addOpcion(new OpcionRadio("Hombre","hombre","h","sexo"));
$opciones->addOpcion(new OpcionRadio("Mujer","mujer","m","sexo"));
$opciones->addOpcion(new OpcionRadio("Otro","otros","o","sexo"));

$form->addCampo($nombre);
$form->addCampo($email);
$form->addCampo($nombreGrupo);
$form->addCampo($aforo);
$form->addCampo($precioEntrada);
$form->addCampo($fecha);
$form->addCampo($opciones);



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario to guapo</title>
        <link rel='stylesheet' href='../Desde_0/css/estilosWeb.css' type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    </head>
    <body>
        <?= 
            $form->crearPagina();
        ?>
    </body>
</html>