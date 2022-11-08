let select = document.getElementById("evento");

let cine = document.getElementById("cine");
let concierto = document.getElementById("concierto");

cine.style.display = "none";
concierto.style.display = "none";


select.onchange = () => {
    
    switch(select.value) {
        case "cine": 
            cine.style.display = "";
            concierto.style.display = "none"
            break;
        case "concierto": 
            cine.style.display = "none";
            concierto.style.display = ""
            break;
        default: 
            cine.style.display = "none";
            concierto.style.display = "none"
            break;
    }
}

