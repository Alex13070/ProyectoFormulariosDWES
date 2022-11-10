<?php
namespace Formularios;

use Utilidad\EstiloMusical;
use Utilidad\Genero;

spl_autoload_register(function ($class) {
    $classPath = "../";
    require("$classPath${class}.php");
}); 

const TARIFA_MAXIMA_CINE = 20;
const TARIFA_MAXIMA_CONCIERTO = 120;
const AFORO_MAXIMO_CINE = 150;
const AFORO_MAXIMO_CONCIERTO = 500;
const CINE = "Crear evento cine";
const CONCIERTO = "Crear evento concierto";

const REGEX = [
    "texto" => "[a-zA-Z0-9]{1,}", // Acepta numeros, y letras mayusculas y minusculas

];

$noExitoso = true;

if (isset($_POST["enviar"])) {
    if ($_POST["enviar"] === CINE){
        echo "Definitivamente, es cine";

        $nombre = $_POST["fecha"];

    } else if ($_POST["enviar"] === CONCIERTO) {
        echo "Concierto";
    }
    
}



// https://www.php.net/manual/en/function.htmlspecialchars.php

$generos = Genero::cases();
$estilos = EstiloMusical::cases();



function formularioDatosEvento($aforoMaximo, $tarifaMaxima) {?>

    <div class="mb-3" id="nombre__evento">
        <label class="form-label">Nombre evento</label>
        <input class="form-control" id="evento" type="text" name="nombre" placeholder="Nombre del evento" pattern="<?=REGEX["texto"]?>" required>
        <div class="invalid-feedback">
            El nombre solo puede contener letras mayúsculas, letras minúsculas y números.
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha del evento</label>
        <input class="form-control" id="fecha" type="date" name="fecha" placeholder="dd/mm/yyyy" required>
        <div class="invalid-feedback">
            La fecha debe de ser posterior a la actual.
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Lugar evento</label>
        <input class="form-control" id="lugar" type="text" name="lugar" placeholder="Lugar del evento" pattern="<?=REGEX["texto"]?>" required>
        <div class="invalid-feedback">
            El lugar del evento solo puede contener letras mayúsculas, letras minúsculas y números..
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Tarifa</label>
        <input class="form-control" id="Tarifa" type="number" name="tarifa" placeholder="tarifa" min="0" max="<?=$tarifaMaxima?>" required>
        <div class="invalid-feedback">
            La tarifa debe de ser positiva
        </div>
    </div>
    <div class="mb-3 ">
        <label class="form-label">Aforo máximo</label>
        <input class="form-control" id="aforo" type="number" name="aforo" placeholder="Aforo máximo (0-<?= $aforoMaximo ?>)" min="0" max="<?= $aforoMaximo ?>" required>    
        <div class="invalid-feedback">
            El aforo máximo debe de estar entre 0 y <?= AFORO_MAXIMO_CINE ?>
        </div>
    </div>

<?php }?>

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
                            <form action="CrearEvento.php" method="post" id="formularioCine" class="needs-validation <?= ($noExitoso && isset($_POST["enviar"]) && $_POST["enviar"] === CINE) ? "was-validated":"" ?>" novalidate>

                                <?= formularioDatosEvento(AFORO_MAXIMO_CINE, TARIFA_MAXIMA_CINE) ?>

                                <div class="mb-3">

                                    <label class="form-label">Nombre de la película</label>
                                    <input class="form-control" id="nombrepelicula" type="text" name="nombrepelicula" placeholder="Nombre de la película" pattern="<?=REGEX["texto"]?>" required>
                                    <div class="invalid-feedback">
                                        El nombre de la película solo puede contener letras mayúsculas, letras minúsculas y números.
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Duración de la película</label>
                                    <input class="form-control" id="duracion" type="number" name="duracion" placeholder="Duración de la película" min="0" required>
                                    <div class="invalid-feedback">
                                        La duración de la película debe de ser un número positivo.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Géneros de cine</label>
                                    
                                    <?php for($i = 0; $i < count($generos)-1; $i++) {  ?>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="genero[]" id="<?=$generos[$i]->value?>"
                                                value="<?=$generos[$i]->value?>">
                                            <label class="form-check-label" for="<?=$generos[$i]->value?>"> <?=$generos[$i]->value?> </label>
                                            <?php if ($i == count($generos)-2) { ?>
                                                <div class="invalid-feedback">
                                                    Tiene que haber al menos un checkbox seleccionado.
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="submit" value="<?= CINE ?>" class="btn btn-primary" name="enviar">
                                </div>

                            </form>
                        </div>

                        <div id="concierto">
                            <form action="CrearEvento.php" method="post" id="formularioConcierto" class="needs-validation <?= ($noExitoso && isset($_POST["enviar"]) && $_POST["enviar"] === CONCIERTO) ? "was-validated":"" ?>" novalidate>

                                <?= formularioDatosEvento(AFORO_MAXIMO_CONCIERTO, TARIFA_MAXIMA_CONCIERTO) ?>

                                <div class="mb-3">

                                    <label class="form-label">Nombre del grupo</label>
                                    <input class="form-control" id="nombregrupo" type="text" name="nombregrupo" placeholder="Nombre del grupo" pattern="<?=REGEX["texto"]?>" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <label class="form-label">Género musical</label>
                                    <select class="form-select" aria-label="Default select example" name="generomusical" id="generomusical" required>
                                        <option disabled value="" selected hidden>Género musical</option>
                                        
                                        <?php for($i = 0; $i < count($estilos)-1; $i++) { ?>
                                        
                                            <option value="<?=$estilos[$i]->value?>"><?=$estilos[$i]->value?></option>

                                        <?php } ?>

                                    </select>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
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