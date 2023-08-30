//form elements
const form = document.querySelector(".form");
const inputs = document.querySelectorAll("input");
const selects = document.querySelectorAll("select");
const name = document.querySelector("#name");
const lastname = document.querySelector("#lastname");
const email = document.querySelector("#email");
const numPeople = document.querySelector("#numPeople");
const date = document.querySelector("#date");
const time = document.querySelector("#time");
const uniqueId = document.querySelector("#hidden");

//buttons
const reserveBtn = document.querySelector("#btn-reservar");
const modifyBtn = document.querySelector("#btn-modificar");
const finalCancelBtn = document.querySelector("#cancel");

const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

//adding or removing classes when validating inputs
const inputsValidation = (e) => {
    //email validation
    if(e.target.name === 'email'){
        if(e.target.value.match(emailRegex)){
            e.target.classList.add('is-valid')
            e.target.classList.remove('is-invalid')
        }else{
            e.target.classList.add('is-invalid')
            e.target.classList.remove('is-valid')        
        }
    }
    //date validation
    else if(e.target.name === 'date'){
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
    }
    //remaining imputs validation
    else{
        if(e.target.value === ''){
            e.target.classList.add('is-invalid')
            e.target.classList.remove('is-valid')
        }else{
            e.target.classList.add('is-valid')
            e.target.classList.remove('is-invalid')
        }
    }
}

//validating each individual input
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

//when 'reserve' button is present
if(reserveBtn){
    //validate input and select elements
    inputs.forEach((input)=>{
        input.addEventListener('keyup', validateForm);
        input.addEventListener('blur', validateForm);
    })
    selects.forEach((select)=>{
        select.addEventListener('keyup', validateForm);
        select.addEventListener('blur', validateForm);
    })

    //submit form, and load confirmation page
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
                .then(() => {
                    window.location.replace("./confirmacion.php?name="+nameValue+"&lastname="+lastnameValue+"&email="+emailValue+"&numPeople="+numPeopleValue+"&date="+dateValue+"&time="+timeValue+"&uniqueId="+uniqueIdValue);
                })      
    })
}

//when 'modify' button is present
if(modifyBtn){
    //submit form, and load confirmation-modifcation page
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
            .then(() => {
                window.location.replace("./confirmacion-modificar.php?name="+nameValue+"&lastname="+lastnameValue+"&email="+emailValue+"&numPeople="+numPeopleValue+"&date="+dateValue+"&time="+timeValue+"&uniqueId="+uniqueIdValue);
            })
    })
}

// When clicking cancel, it redirects to the cancelar page
if(finalCancelBtn){
    finalCancelBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const valores = window.location.search;
        const urlParams = new URLSearchParams(valores);
        var uniqueIdValue = urlParams.get('uniqueId');

        fetch("./php/controllerCancelar.php?uniqueId="+uniqueIdValue)
            .then((response) => response)
            .then((info) => {
                window.location.replace("./cancelar.php?uniqueId="+uniqueIdValue);
            })
    })
}