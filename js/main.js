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

if(btnReservar){
    btnReservar.addEventListener("click", (e) => {
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
    btnModificar.addEventListener("click", (e) => {
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
                window.location.replace("./cancelar.php");
            })
    })
}