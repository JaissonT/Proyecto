<?php 

$conexion = pg_connect(" host='localhost' dbname= Proyecto_Sistemas port=5432 user=postgres password=1252 ") or die ("Error de Conexion".pg_last_error());

	if(!$conexion){

		echo "Error al conectar la Base de Datos";
	}else{
		
	}

 ?>