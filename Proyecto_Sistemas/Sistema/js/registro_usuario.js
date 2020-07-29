
var nombre= document.getElementById("nombre");
var apellido= document.getElementById("apellido");
var usuario= document.getElementById("usuario");
var clave= document.getElementById("clave");
var correo= document.getElementById("correo");
var palabra_segura= document.getElementById("palabra_segura");
var boton = document.getElementById("btn");
var cancelar = document.getElementById("cancelar");
var mensaje= document.getElementById("error");
var expresion= /\w+@\w+\.+[a-z]/;

var validar= function(e){

	if(nombre.value=="" || usuario.value== ""
		|| clave.value=="" || correo.value=="" || palabra_segura=="" ){

	mensaje.innerHTML= "Complete Todos los campos Obligatorios";
	e.preventDefault(); 

	}else if(clave.value.length<5){
	mensaje.innerHTML= "El campo clave debe tener mas de 5 caracteres";
	clave.focus();
	e.preventDefault(); 

}


}

var volver=function(){
	window.history.back();
}

btn.addEventListener("click",validar);
cancelar.addEventListener("click", volver);
