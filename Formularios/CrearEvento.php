<?php 
namespace Formularios;




?>

<!DOCTYPE html>
<!-- saved from url=(0055)http://localhost:8000/ut4/Prueba/FormularioProyecto.php -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link rel="stylesheet" href="../css/estilos.css">
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
                                <option selected style="display: none">Seleccione el tipo de evento que quiere registrar</option>
                                <option value="cine">Cine</option>
                                <option value="concierto">Concierto</option>
                            </select>
                        </div>


                        <div id="cine">
                            <form action="" method="post" id="formulario">

                                <input type="hidden" name="crear" value="cine">

                                <div class="mb-3">
                                    <label class="form-label">Nombre evento</label>
                                    <input class="form-control" id="evento" type="text" name="nombre" placeholder="Nombre del evento">
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Fecha del evento</label>
                                    <input class="form-control" id="fecha" type="date" name="fecha" placeholder="dd/mm/yyyy">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Lugar evento</label>
                                    <input class="form-control" id="lugar" type="text" name="lugar" placeholder="Lugar del evento">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Tarifa</label>
                                    <input class="form-control" id="Tarifa" type="number" name="tarifa" placeholder="tarifa" min="0" max="100">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Aforo máximo</label>
                                    <input class="form-control" id="Aforo máximo (0-500)" type="number" name="aforo" placeholder="aforo" min="0" max="500">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Nombre de la película</label>
                                    <input class="form-control" id="nombrepelicula" type="text" name="nombrepelicula" placeholder="Nombre de la película">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Duración de la película</label>
                                    <input class="form-control" id="duracion" type="text" name="duracion" placeholder="Duración de la película">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Género cine</label>
                                    <select class="form-select" aria-label="Default select example" name="generomusical" id="generomusical">
                                        <option selected="" style="display: none">Género</option>
                                        <option value="genero">Género</option>
                                    </select>
    
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="submit" value="Enviar" class="btn btn-primary" name="enviar">
                                </div>
    
                            </form>
                        </div>                        

                        <div id="concierto">
                            <form action="" method="post" id="formulario">

                                <input type="hidden" name="crear" value="concierto">

                                <div class="mb-3">
                                    <label class="form-label">Nombre evento</label>
                                    <input class="form-control" id="evento" type="text" name="nombre" placeholder="Nombre del evento">
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Fecha del evento</label>
                                    <input class="form-control" id="fecha" type="date" name="fecha" placeholder="dd/mm/yyyy">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Lugar evento</label>
                                    <input class="form-control" id="lugar" type="text" name="lugar" placeholder="Lugar del evento">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Tarifa</label>
                                    <input class="form-control" id="Tarifa" type="number" name="tarifa" placeholder="tarifa" min="0" max="100">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Aforo máximo</label>
                                    <input class="form-control" id="Aforo máximo (0-500)" type="number" name="aforo" placeholder="aforo" min="0" max="500">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Nombre del grupo</label>
                                    <input class="form-control" id="nombregrupo" type="text" name="nombregrupo" placeholder="Nombre del grupo">
    
                                </div>
    
                                <div class="mb-3">
    
                                    <label class="form-label">Género musical</label>
                                    <select class="form-select" aria-label="Default select example" name="generomusical" id="generomusical">
                                        <option selected="" style="display: none">Género</option>
                                        
                                    </select>
    
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <input type="submit" value="Enviar" class="btn btn-primary" name="enviar">
                                </div>
    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>