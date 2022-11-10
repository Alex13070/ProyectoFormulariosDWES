const form = document.getElementById("formularioCine");
const inputs = document.querySelectorAll('#formularioCine');

const password = /^.{4,12}$/;
const evento = /^[a-zA-ZÀ-ÿ\s]{1,40}$/;

/*const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    fecha: /^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})(\s)([0-1][1-9]|[2][0-3])(:)([0-5][0-9])$/
}
*/
const validarCampo = (expresion,input,campo)=>{

    if(expresion.test(input.value)){
        document.getElementById(`cine__${campo}`).classList.remove('fa-solid fa-circle-x');
        document.getElementById(`cine__${campo}`).classList.add('fa-solid fa-circle-check');
        document.querySelector(`#cine__${campo} .formulario_error`).classList.remove();
        
    }else{
        document.getElementById(`cine__${campo}`).classList.remove('fa-solid fa-circle-check');
        document.getElementById(`cine__${campo}`).classList.add('fa-solid fa-circle-x');
        document.querySelector(`#cine__${campo} .formulario_error`).classList.add();
    }

}

const validarFormulario = (e)=>{
    switch (e.target.name){
        case "evento":
           validarCampo(evento,e.target,e.target.name);
        break;
        case "fecha":

        break;
        case "lugar":

        break;
        case "tarifa":

        break;
        case "aforo":

        break;
        case "nombrepelicula":

        break;
        case "duracionPelicula":

        break;
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
});

