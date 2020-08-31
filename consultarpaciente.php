<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css./backgroundStyle.css">
	<title>Datos del paciente</title>
</head>
<body>
   <div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#miMenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="frmveterinario.php" class="navbar-brand">Bienvenido veterinario
				<?php
					session_start();
					echo $_SESSION['nombre'];
					?>
				</a>
				</a>
			</div>		
			<div class="collapse navbar-collapse" id="miMenu">
				<ul class="nav navbar-nav">						
					<li><a href="citasveterinario.php">Citas</a></li>	
					<li><a href="php/cerrarsesion.php"><span class="label label-danger">CERRAR SESION </span></a></li>								
				</ul>
			</div>
		</div>
	</nav>
</div>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">HORARIO</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>CEDULA</th>	
					<th>DIRECCION</th>				
					<th>TELEFONO</th>		
					<th>CORREO</th>	
					<th>Nombre Mascota</th>	
					<th>Tipo de Mascota</th>
					<th>SEXO</th>	
					<th>Descripcion</th>
				</tr>
			</thead>
			<tbody>
				<?php
				     require('php/conexion.php');				     
					 $user=$_SESSION['consultado'];
				     $result=mysqli_query($conexion,"SELECT * FROM datosusuario where idusuario='$user'");				    
				     while ($usuarios=mysqli_fetch_array($result)){					 
					 echo "<tr><td id='id:$user' class='cam_editable'>".$user."</td>";
					 echo "<td id='nombre:$user' class='cam_editable'>".$usuarios['nombre']."</td>";
				     echo "<td id='cedula:$user' class='cam_editable'>".$usuarios['cedula']."</td>";
					 echo "<td id='direccion:$user' class='cam_editable'>".$usuarios['direccion']."</td>";
					 //////////////////////////////////////
					 echo "<td id='telefono:$user' class='cam_editable'>".$usuarios['telefono']."</td>";
					 echo "<td id='correo:$user' class='cam_editable'>".$usuarios['correo']."</td>";
					 echo "<td id='nombremascota:$user' class='cam_editable'>".$usuarios['nombremascota']."</td>";
					 echo "<td id='tipomascota:$user' class='cam_editable'>".$usuarios['tipomascota']."</td>";
					 echo "<td id='sexo:$user' class='cam_editable'>".$usuarios['sexo']."</td>";
					 echo "<td id='descripcion:$user' class='cam_editable'>".$usuarios['descripcion']."</td>";
					 
					 echo"</tr>";
					 }
				?>
			</tbody>	
					
		</table>
	</div>
	</div>
<!--//////////////////////////////////////////////////-->
	<script src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/mainveterinario.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>