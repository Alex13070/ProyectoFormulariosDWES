const form = document.getElementById("formularioCine");
const inputs = document.querySelectorAll('#formularioCine');

const expresiones = {

}


const validarFormulario = (e)=>{
    switch (e.target.name){
        case "evento":
            if(e.target.value ){
                document.getElementById('nombre__evento').classList.remove('fa-solid fa-circle-x');
                document.getElementById('nombre__evento').classList.add('fa-solid fa-circle-check');
                document.querySelector('#nombre__evento .formulario_error').classList.remove();
                
            }else{
                document.getElementById('nombre__evento').classList.remove('fa-solid fa-circle-check');
                document.getElementById('nombre__evento').classList.add('fa-solid fa-circle-x');
                document.querySelector('#nombre__evento .formulario_error').classList.add();
            }
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
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);
});


form.addEventListener("submit", (e)=>{
    e.preventDefault();
    let warning = "";
    let correcto = false;
    let vemail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    parrafo.innerHTML = "";
    if(nombre.value.length < 3){
        warning += `El nombre es muy corto<br>`;
        correcto = true;
    }
    if(apellidos.value.length < 10){
        warning += `Los apellidos son muy cortos<br>`;
        correcto = true;
    }
    if(!vemail.test(email.value)){
        warning += `Formato de email incorrecto<br>`;
        correcto = true;
    }
    if(edad.value > 150){
        warning += `Edad incorrecta<br>`;
        correcto = true;
    }
    if(password.value.length < 8){
        warning += `La contraseña no es valida<br>`;
        correcto = true;
    }
    if(correcto){
        parrafo.innerHTML = warning;
    }else{
        alert("Formulario enviado correctamente");
    }
})