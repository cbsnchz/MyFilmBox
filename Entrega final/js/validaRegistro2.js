$(document).ready(function(){
  $("#lUok").hide();
  $("#lUmal").hide();
  $("#lPok").hide();
  $("#lPmal").hide();
  $("#lPerr").hide(); 
  $("#lUerr").hide();

  $("#userName_login").keyup(function(){

    if(isEmail($("#userName_login").val())){
      $("#lUok").show();
      $("#lUmal").hide();
      $("#lUerr").hide();


    } else{
      $("#lUmal").show();
      $("#lUok").hide();
      return false(); 
    }
  });

  /*$("#campoUser").keyup(function(){

    var url="comprobarUsuario.php?user=" + $("#campoUser").val();
    $.get(url, usuarioExiste);

  });*/
});



function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}



function usuarioExiste(data, status) {
    if (data=='existe'){
      $("#userOK").hide();
      $("#userMal").show();
      $("#campoUser").focus();
      
      alert("El usuario ya existe.")
    }
    else if(data=="disponible"){
      $("#userOK").show();
      $("#userMal").hide();
    }
}


