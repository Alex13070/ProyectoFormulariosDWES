<?php

namespace Desde_0;
use Desde_0\Campos\CampoEmail;
use Desde_0\Campos\CampoFecha;
use Desde_0\Campos\CampoNumber;
use Desde_0\Campos\CampoRadio;
use Desde_0\Campos\CampoTexto;
use Desde_0\Utilidad\Evento;
use Desde_0\Utilidad\HttpMethod;
use Desde_0\Utilidad\OpcionRadio;
use Desde_0\Utilidad\TiposInput;



spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});
/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

$form = new GenerarFormulario(" ",HttpMethod::POST);


$nombre = new CampoTexto("Nombre:",Evento::NOMBRE,TiposInput::TEXT,"nombre","Introduzca su nombre","El formato introducido es incorrecto");
$email = new CampoEmail("Email:",Evento::EMAIL,TiposInput::EMAIL,"email","info@gmail.com"," El formato de correo introducido es incorrecto");
$nombreGrupo = new CampoTexto("Nombre del grupo:",Evento::NOMBRE_GRUPO,TiposInput::TEXT,"nb_grupo","Introduzca el nombre del grupo"," Nombre del grupo incorrecto");
$precioEntrada = new CampoNumber("Precio entrada:",Evento::PRECIO_ENTRADA,TiposInput::NUMBER,"precio","Introduzca el precio de la entrada",5,150,"El precio debe estar comprendido entre ");
$fecha = new CampoFecha("Fecha del evento:",Evento::FECHA,TiposInput::DATE,"fecha","La fecha introducida es incorrecta o es anterior a la actual.");
$aforo = new CampoNumber("Aforo:",Evento::AFORO,TiposInput::NUMBER,"aforo","Introduzca el aforo",0,15500,"El aforo debe estar comprendido entre ");
$opciones = new CampoRadio("Sexo:",Evento::OPCIONES,TiposInput::RADIO_BUTTON,"s","F");

$opciones->addOpcion(new OpcionRadio("Hombre","Hombre","Hombre",Evento::OPCIONES));
$opciones->addOpcion(new OpcionRadio("Mujer","Mujer","Mujer",Evento::OPCIONES));
$opciones->addOpcion(new OpcionRadio("Otro","Otros","Otro",Evento::OPCIONES));

$form->addCampo($nombre);
$form->addCampo($email);
$form->addCampo($nombreGrupo);
$form->addCampo($aforo);
$form->addCampo($precioEntrada);
$form->addCampo($fecha);
$form->addCampo($opciones);

//$validaciones = new Validaciones(HttpMethod::POST);
//$validaciones->getSingletone($_POST);



if(isset($_POST['Enviar'])){
    if($form->validarForm()){
        $evento = Evento::fromForm($form, $_POST);

        if (!is_null($evento)) {
            file_put_contents(
                "Eventos.csv",
                $evento->toCSV() . "\n"
                // Esto no hace falta porque en el fichero solo puedes tener uno a la vez.
                // , FILE_APPEND
            );

            //Redireccionar
            header("Location: fpdf184\\ticket.php");
            //salir
            exit();
        }
        else {
            echo "No se ha creado el objeto en la funcion fromForm()";
        }        
    }else{
        echo "No se ha podido validar la informacion de algun campo.";
    }
}



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
        <script>
            document.querySelectorAll("form").forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        </script>
    </body>
</html>