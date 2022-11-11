let select = document.getElementById("evento");

let cine = document.getElementById("cine");
let concierto = document.getElementById("concierto");

let formulario = document.getElementById("formularioEvento");

let camposCine = [
    document.getElementById("nombrepelicula"),
    document.getElementById("duracion")
].concat(
    Array.prototype.slice.call(
        formulario.querySelectorAll('input[type=checkbox]')
    )
);

let camposConcierto = [
    document.getElementById("nombregrupo"),
    document.getElementById("generomusical")
];

function cambiarVisibilidad(array, activado) {
    array.forEach(element => {
        element.disabled = !activado;
    });
}

cambiarVisibilidad(camposConcierto, false);
concierto.style.display = "none";


select.onchange = () => {

    formulario.classList.remove("was-validated")
    
    switch(select.value) {
        case "cine": 
            cine.style.display = "";
            concierto.style.display = "none"
            cambiarVisibilidad(camposCine, true)
            cambiarVisibilidad(camposConcierto, false)
            break;
        case "concierto": 
            cine.style.display = "none";
            concierto.style.display = ""
            cambiarVisibilidad(camposCine, false)
            cambiarVisibilidad(camposConcierto, true)
            break;
        default: 
            cine.style.display = "none";
            concierto.style.display = "none"
            cambiarVisibilidad(camposCine, false)
            cambiarVisibilidad(camposConcierto, false)
            break;
    }
}

