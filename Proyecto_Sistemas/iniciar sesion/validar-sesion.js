var usuario= document.getElementById("usuario");
var clave= document.getElementById("clave");
var boton = document.getElementById("btn");
var mensaje= document.getElementById("error");

var validar= function(e){

	if(usuario.value== "" || clave.value=="" ){

	mensaje.innerHTML= "Complete Todos los campos";
	e.preventDefault(); 

	}


}

btn.addEventListener("click",validar);