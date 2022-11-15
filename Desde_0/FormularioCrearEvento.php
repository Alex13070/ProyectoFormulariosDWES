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


$nombre = new CampoTexto("Nombre:","nb",TiposInput::TEXT,"nombre","Introduzca su nombre","El formato introducido es incorrecto");
$email = new CampoEmail("Email:","email",TiposInput::EMAIL,"email","info@gmail.com"," El formato de correo introducido es incorrecto");
$nombreGrupo = new CampoTexto("Nombre del grupo:","nb_grupo",TiposInput::TEXT,"nb_grupo","Introduzca el nombre del grupo"," Nombre del grupo incorrecto");
$precioEntrada = new CampoNumber("Precio entrada:","precio",TiposInput::NUMBER,"precio","Introduzca el precio de la entrada",5,150,"El precio introducido es incorrecto");
$fecha = new CampoFecha("Fecha del evento:","fecha",TiposInput::DATE,"fecha","Fecha incorrecta.");
$aforo = new CampoNumber("Aforo:","aforo",TiposInput::NUMBER,"aforo","Introduzca el aforo",0,500,"El aforo introducido es incorrecto");
$opciones = new CampoRadio("Sexo:","s",TiposInput::RADIO_BUTTON,"s","F");

$opciones->addOpcion(new OpcionRadio("Hombre","Hombre","Hombre","sexo"));
$opciones->addOpcion(new OpcionRadio("Mujer","Mujer","Mujer","sexo"));
$opciones->addOpcion(new OpcionRadio("Otro","Otros","Otro","sexo"));

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


            // Validar los checkbox
            const checkboxes = document.getElementById("formulario").querySelectorAll('input[type=checkbox]');

            function atLeastOneCheckboxIsChecked() {
                const checkboxes = Array.from(document.querySelectorAll(".checkbox"));
                return checkboxes.reduce((acc, curr) => acc || curr.checked, false);
            }

            function init() {
                
                for (let i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].addEventListener('change', checkValidity);
                    checkValidity();
                }
            }

            function isChecked() {
                for (let i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) return true;
                }

                return false;
            }

            function checkValidity() {
                const errorMessage = !isChecked() ? 'Tiene que haber al menos un checkbox seleccionado.' : '';
                checkboxes.forEach((chk) => {
                    chk.setCustomValidity(errorMessage)
                });
            }

            if (checkboxes.length > 0) {
                init();
            }
        </script>
    </body>
</html>