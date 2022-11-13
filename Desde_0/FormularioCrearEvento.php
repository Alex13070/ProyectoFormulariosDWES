<?php

namespace Desde_0;

spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

$form = new GenerarFormulario(" ",HttpMethod::POST);

$nombre = new CampoTexto("Nombre","nb",TiposInput::TEXT,"nb1","Introduzca su nombre");
$aforo = new CampoNumber("Aforo","number",TiposInput::NUMBER, "number1","Introduzca el aforo",0,500);
$email = new CampoEmail("Email","email",TiposInput::EMAIL,"email1","info@gmail.com");

$form->addCampo($aforo);
$form->addCampo($nombre);
$form->addCampo($email);



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario to guapo</title>
        <link rel='stylesheet' href='index.css' type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    </head>
    <body>
        <?= 
            $form->crearPagina();
        ?>
    </body>
</html>