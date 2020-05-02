
var user = document.getElementById('userName_login');
var password = documentdocument.getElementById('password_login');

function validaLogin(){
    console.log("Eiii");
    const usernameValue = user.value.trim();
    const usernameValue = password.value.trim();

    if(user=""){
        setErrorFor(userName_login, 'Campo usuario no puede estar vacío.');
        return false; 
    }
    else if(!isEmail(user)){
        setErrorFor(userName_login, 'Campo usuario no cumple con el formato.');
        return false; 
    }
    if(password=""){
        setErrorFor(userName_login, 'Campo contraseña no puede estar vacío.');
        return false; 
    }
    return true; 
}
function setErrorFor(input, message){
    const formControl = input.parentElement; 
    const small = formControl.querySelector("small");

    small.innerText =message;

    formControl.className = 'input-contenedor-err';

}

function isEmail(email){ 
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
