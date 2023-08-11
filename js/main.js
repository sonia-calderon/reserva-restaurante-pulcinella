const name = document.querySelector("#name");
const lastname = document.querySelector("#lastname");
const email = document.querySelector("#email");
const numPeople = document.querySelector("#numPeople");
const date = document.querySelector("#date");
const time = document.querySelector("#time");
const uniqueId = document.querySelector("#hidden");
const btnReservar = document.querySelector("#btn-reservar");
const btnModificar = document.querySelector("#btn-modificar");
const btnCancelar = document.querySelector("#btn-cancelar");
const modal = document.querySelector("#modal");
const span = document.querySelector(".close");
const back = document.querySelector("#back");
const cancel = document.querySelector("#cancel");
const form = document.querySelector('.form');
const inputs = document.querySelectorAll('input');
const selects = document.querySelectorAll('select');

const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

const inputsValidation = (e) => {
    if(e.target.name === 'email'){
        if(e.target.value.match(emailRegex)){
            e.target.classList.add('is-valid')
            e.target.classList.remove('is-invalid')
        }else{
            e.target.classList.add('is-invalid')
            e.target.classList.remove('is-valid')        
        }
    }else if(e.target.name === 'date'){
        const parts = e.target.value.split('-');
        const day = parseInt(parts[2]);
        const month = parseInt(parts[1] - 1);
        const year = parseInt(parts[0]);

        const inputDate = new Date(year, month, day);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if(inputDate.getTime() >= today.getTime()){
            e.target.classList.add('is-valid')
            e.target.classList.remove('is-invalid')
        }else{
            e.target.classList.add('is-invalid')
            e.target.classList.remove('is-valid') 
        }
    }else{
        if(e.target.value === '' || e.target.value === 'default'){
            e.target.classList.add('is-invalid')
            e.target.classList.remove('is-valid')
        }else{
            e.target.classList.add('is-valid')
            e.target.classList.remove('is-invalid')
        }
    }
}

const validateForm = (e) => {
    switch (e.target.name) {
		case "name":
            inputsValidation(e);
		break;
		case "lastname":
            inputsValidation(e);
		break;
        case "email":
            inputsValidation(e);
		break;
		case "numPeople":
            inputsValidation(e);
		break;
        case "date":
            inputsValidation(e);
		break;
		case "time":
            inputsValidation(e);
		break;
    }
}

if(btnReservar){
        inputs.forEach((input)=>{
            input.addEventListener('keyup', validateForm);
            input.addEventListener('blur', validateForm);
        })

        selects.forEach((select)=>{
            select.addEventListener('keyup', validateForm);
            select.addEventListener('blur', validateForm);
        })

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const nameValue = name.value;
        const lastnameValue = lastname.value;
        const emailValue = email.value;
        const numPeopleValue = numPeople.value;
        const dateValue = date.value;
        const timeValue = time.value;
        const uniqueIdValue = uniqueId.value;

        const cliente = new FormData(document.querySelector(".form"));
            fetch("./php/controller.php", {
                method: "POST",
                body: cliente
            })
                .then((response) => response)
                .then((info) => {
                    window.location.replace("./confirmacion.php?name="+nameValue+"&lastname="+lastnameValue+"&email="+emailValue+"&numPeople="+numPeopleValue+"&date="+dateValue+"&time="+timeValue+"&uniqueId="+uniqueIdValue);
                })      
    })
}

if(btnModificar){
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const nameValue = name.value;
        const lastnameValue = lastname.value;
        const emailValue = email.value;
        const numPeopleValue = numPeople.value;
        const dateValue = date.value;
        const timeValue = time.value;
        const uniqueIdValue = uniqueId.value;
        
        const cliente = new FormData(document.querySelector(".form"));
        fetch("./php/controllerModificar.php", {
            method: "POST",
            body: cliente
        })
            .then((response) => response)
            .then((info) => {
                window.location.replace("./confirmacion-modificar.php?name="+nameValue+"&lastname="+lastnameValue+"&email="+emailValue+"&numPeople="+numPeopleValue+"&date="+dateValue+"&time="+timeValue+"&uniqueId="+uniqueIdValue);
            })
    })
}


if(btnCancelar){
    btnCancelar.addEventListener("click", (e) => {
        modal.style.display = "block";
    })  
}

if(span || back){
    // When the user clicks on <span> (x), close the modal
    span.addEventListener("click", () => {
        modal.style.display = "none";
    })
    back.addEventListener("click", () => {
        modal.style.display = "none";
    })
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// When clicking cancel, it redirect to the cancelar page
if(cancel){
    cancel.addEventListener("click", (e) => {
        e.preventDefault();
        const valores = window.location.search;
        //Creamos la instancia
        const urlParams = new URLSearchParams(valores);
        //Accedemos a los valores
        var uniqueIdValue = urlParams.get('uniqueId');

        fetch("./php/controllerCancelar.php?uniqueId="+uniqueIdValue)
            .then((response) => response)
            .then((info) => {
                window.location.replace("./cancelar.php?uniqueId="+uniqueIdValue);
            })
    })
}