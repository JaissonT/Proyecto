<?php 

	include"..\include/conexion.php";

	/*PAGINADOR*/

$sql_registro= pg_query($conexion,"SELECT COUNT(*) AS total_registro FROM USUARIOS"); /*Total de todos los registros*/
	$result_registro = pg_fetch_array($sql_registro);
	$total_registro= $result_registro['total_registro'];
	$por_pagina=5;

if(empty($_GET['pagina'])){

	$pagina=1;
}else{
	$pagina=$_GET['pagina'];
}

$desde=($pagina-1)*$por_pagina;
$total_paginas= ceil($total_registro/$por_pagina);
$where="";


/*BOTON DE FILTRAR*/
if(isset($_POST['Filtrar'])){

$nombre=$_POST['xnombre'];
$xcargo=$_POST['xcargo'];

	if(empty($_POST['xcargo']))
	{
		$where="and nombre like '".$nombre."%'";
	}
	else if(empty($_POST['xnombre'])){

		$where="and tipo='".$xcargo."'";

	}
	else{
		$where="and nombre like '".$nombre."%' and tipo='".$xcargo."'";
	}
}

/*cONSULTAAAAAAAAAAAAAAS*/
$Consulta_cargo_filtro="SELECT DISTINCT Tipo FROM USUARIOS u, ROL r where u.Cod_rol=r.Cod_rol ;";
		$resul1= pg_query($conexion,$Consulta_cargo_filtro);
$consulta="SELECT Nombre,Apellido,Usuario,Correo,Tipo FROM USUARIOS u, ROL r where u.Cod_rol=r.Cod_rol $where limit $por_pagina offset $desde;";
		$resul= pg_query($conexion,$consulta);
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Usuarios</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="..\imagenes\icono.ico">
	<link rel="stylesheet" type="text/css" href="..\include\estilo_header.css">

	<link rel="stylesheet" type="text/css" href="estilo\estilo_usuario.css">
</head>
<body>
	<?php include"..\include\header.html" ?>

<div class="contenedor">
	<div class="registrar_usuario">
	<a href="Registrar_Usuario.php">Registrar Usuario</a>
	</div>
	<div class="filtro">
		<h2>Lista de Usuarios</h2>
		<form class="formulario" method="post">
			<input type="text" placeholder="Nombre.." name="xnombre">
			<select name="xcargo">
			<option value="">Cargo</option>
			<?php
				while($mostrar1=pg_fetch_array($resul1))
				{	
					echo '<option value ="'.$mostrar1['tipo'].'">'.$mostrar1['tipo'].'</option>';
				}

			?>
		</select>
			<button class="btn" name="Filtrar" type="submit">Filtrar</button>
		</form>

	</div>
	<table>
		<tr class="encabezado">
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Usuario</td>
			<td>Correo</td>
			<td>Cargo</td>
			<td>Modificar</td>
			<td>Eliminar</td>

		</tr>
		<?php 

		

		while($mostrar=pg_fetch_array($resul)){
		 ?>
		 <tr class="muestras" >
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['apellido'] ?></td>
			<td><?php echo $mostrar['usuario']?></td>
			<td><?php echo $mostrar['correo'] ?></td>
			<td><?php echo $mostrar['tipo'] ?></td>
			<td><a href="#">Modificar</a></td>
			<td><a href="#">Eliminar</a></td>

		</tr>

		<?php 
	}
		 ?>

	</table>

	<div class="paginador">
			<ul>
			<li><a href="#">|<</a></li>
			<li><a href="#"><<</a></li>
<?php
		for ($i=1; $i <=$total_paginas ; $i++) { 

			if ($i == $pagina) {
					echo '<li class="pageSelected">'.$i.'</li>';
			}else{
					echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';

			}
		
		}
?>
	
			<li><a href="#">>></a></li>
			<li><a href="#">>|</a></li>
		</ul>


	</div>
</div>

</body>
</html>