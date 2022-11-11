<?php
namespace Formularios;

use Utilidad\EstiloMusical;
use Utilidad\Genero;

spl_autoload_register(function ($class) {
    $classPath = "../";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});


$noExitoso = true;

if (isset($_POST["enviar"])) {
    if ($_POST["enviar"] === CINE){
        echo "Definitivamente, es cine";

        $nombre = $_POST["fecha"];

    } else if ($_POST["enviar"] === CONCIERTO) {
        echo "Concierto";
    }
    
}

$eventoCine = [];
$eventosConcierto = [];

// https://www.php.net/manual/en/function.htmlspecialchars.php

$generos = Genero::cases();
$estilos = EstiloMusical::cases();

function formularioDatosEvento() {?>

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input class="form-control" id="evento" type="text" name="nombre" placeholder="Nombre del evento" pattern="<?=REGEX["texto"]?>" required>
        <div class="invalid-feedback">
            El nombre solo puede contener letras mayúsculas, letras minúsculas y números.
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Correo</label>
        <input class="form-control" id="correo" type="email" name="correo" placeholder="Nombre@abcd.ef" pattern="<?=REGEX["correo"]?>" required>
        <div class="invalid-feedback">
            El formato de correo introducido es incorrecto.
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Teléfono</label>
        <input class="form-control" id="telefono" type="text" name="telefono" placeholder="Numero de telefono" pattern="<?=REGEX["telefono"]?>" required>
        <div class="invalid-feedback">
            El formato de número de teléfono introducido es incorrecto o el teléfono no existe.
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Sexo</label>
        Hombre:  <input type="radio" name="sexo">
        Mujer: <input type="radio" name="sexo">
        Otro: <input type="radio" name="sexo">
        <div class="invalid-feedback">
            Debe seleccionar un sexo.
        </div>
    </div>
<?php }

const TARIFA_MAXIMA_CINE = 20;
const TARIFA_MAXIMA_CONCIERTO = 120;
const MINIMO_GENERICO = 0;


function generaEventos(array $opciones) { ?>
    <select class="form-select">
        <?php foreach($opciones as $clave) { ?>
            <option disabled value="" selected hidden value="<?= $clave ?>"><?= $clave ?></option>
        <?php } ?>
    </select>
<?php } ?>


<!DOCTYPE html>
<!-- saved from url=(0055)http://localhost:8000/ut4/Prueba/FormularioProyecto.php -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/icons.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> -->
</head>

<body>

    <div class="container">
        <div class="row p-4">
            <div class="col-lg-6 offset-lg-3">
                <div class="card text-right">
                    <div class="card-header">
                        <h1 class="text-center">Eventos</h1>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Evento</label>
                            <select class="form-select" aria-label="Default select example" name="evento" id="evento">
                                <option disabled value="" selected hidden>Seleccione el tipo de evento que quiere registrar</option>
                                <option value="cine">Cine</option>
                                <option value="concierto">Concierto</option>
                            </select>
                        </div>


                        <div id="cine">
                            <form action="ComprarEntrada.php" method="post" id="formularioCine" class="needs-validation <?= ($noExitoso && isset($_POST["enviar"]) && $_POST["enviar"] === CINE) ? "was-validated":"" ?>" novalidate>

                                <?= formularioDatosEvento() ?>

                                <div class="mb-3">
                                    <label class="form-label">Precio entrada</label>
                                    <input type="number" class="form-control" min="<?= MINIMO_GENERICO ?>" max="<?= TARIFA_MAXIMA_CINE ?>" name="precio">
                                </div>

                                <?= generaEventos($_POST["genero[]"]) ?>

                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="submit" value="<?= CINE ?>" class="btn btn-primary" name="enviar">
                                </div>

                            </form>
                        </div>

                        <div id="concierto">
                            <form action="ComprarEntrada.php" method="post" id="formularioConcierto" class="needs-validation <?= ($noExitoso && isset($_POST["enviar"]) && $_POST["enviar"] === CONCIERTO) ? "was-validated":"" ?>" novalidate>

                                <?= formularioDatosEvento() ?>

                                <div class="mb-3">
                                    <label class="form-label">Precio entrada</label>
                                    <input type="number" class="form-control" min="<?= MINIMO_GENERICO ?>" max="<?= TARIFA_MAXIMA_CONCIERTO ?>" name="precio">
                                </div>

                                <?= generaEventos($_POST["genero[]"]) ?>
                                
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="submit" value="<?= CONCIERTO ?>" class="btn btn-primary" name="enviar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <pre>
        <?php var_dump($_POST) ?>
    </pre>

    <script src="../js/script.js"></script>
    <script src="../js/formularioBootsrap.js"></script>
</body>

</html>