
        
   
const user = document.getElementById('userName_login');
const password = document.getElementById('password_login');



function validaLogin(){
   
    var valid = true; 
    if(user.value.trim()==""){
        setErrorFor(user, "E-mail no válido.")
        valid= false; 
    }

    else if(isEmail(user.value.trim())){
        setErrorFor(user, "E-mail no válido.")
        valid= false; 
    }
    
    if(password.value.trim()==""){
        setErrorFor(password, "Debes rellenar el campo contraseña")
        valid= false; 
    }
    return valid; 
}

function setErrorFor(input, message){
    const formControl = input.parentElement; 
    const small = formControl.querySelector('small');

    small.innerText =message;

    formControl.className = 'input-contenedor-err';
}

function isEmail(email){ 
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

        
        
        