<?php 

include"..\include/conexion.php";


$usuario= $_POST['usuario'];
$clave= $_POST['clave'];

//conectando la base de datos


$consulta = "SELECT * FROM USUARIOS WHERE Usuario='$usuario' and clave='$clave' ";

$resultado = pg_query($conexion,$consulta); //ejecuta conexion y consulta
$filas= pg_num_rows($resultado); // numero de filas
if($filas>0){

	header("location: ..\Sistema\inicio.php"); // location es para redireccionar a otra pagina

}else{

	echo "ERROR EN LA AUTENTIFICACION";
}

pg_free_result($resultado); //libera espacio
pg_close($conexion);

 ?>