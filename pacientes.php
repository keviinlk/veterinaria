<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="css./backgroundStyle.css">
	<title>Pacientes</title>
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
				<a href="frmadmin.php" class="navbar-brand">Bienvenido Administrador
				<?php
					session_start();
					echo $_SESSION['nombre'];
					?>
				</a>
			</div>		
			<div class="collapse navbar-collapse" id="miMenu">
				<ul class="nav navbar-nav">
					<li><a href="administradores.php">Administradores</a></li>
					<li><a href="veterinarios.php">Veterinarios</a></li>					
					<li class="active"><a href="pacientes.php">Pacientes</a></li>	
					<li><a href="citas.php">Citas</a></li>	
					<li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>	
					<li><a href="php/cerrarsesion.php"><span class="label label-danger">CERRAR SESION </span></a></li>									
				</ul>
			</div>
		</div>
	</nav>
</div>

<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">LISTA DE PACIENTES</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
          <th>NOMBRE DE USUARIO</th>
          <th>NOMBRE</th>
					<th>CEDULA</th>	
          <th>DIRECCION</th>
          <th>TELEFONO</th>	
          <th>CORREO</th>	
					<th>Nombre Mascota</th>	
					<th>Tipo de Mascota</th>	
					<th>Sexo</th>	
					<th>Razon de consulta</th>
						
				
									
				</tr>
			</thead>
			<tbody>
				<?php
				     require('php/conexion.php');
				     $result=mysqli_query($conexion,'SELECT nombre FROM usuarios where tipo="usuario"');				    
				     while ($usuarios=mysqli_fetch_array($result)){
						 $id=$usuarios['nombre'];
					 //////////////////////////////////////
					 $result2=mysqli_query($conexion,"SELECT * FROM datosusuario where idusuario='$id'");
					 $dato=mysqli_fetch_array($result2);
					 //////////////////////////////////////
					 echo "<tr><td id='id:$id' class='cam_editable'>".$usuarios['nombre']."</td>";
					 echo "<td id='nombre:$id' class='cam_editable' contenteditable='true'>".$dato['nombre']."</td>";
				     echo "<td id='cedula:$id' class='cam_editable' contenteditable='true'>".$dato['cedula']."</td>";
					 echo "<td id='direccion:$id' class='cam_editable' contenteditable='true'>".$dato['direccion']."</td>";
					 //////////////////////////////////////
					 echo "<td id='telefono:$id' class='cam_editable' contenteditable='true'>".$dato['telefono']."</td>";
					 echo "<td id='correo:$id' class='cam_editable' contenteditable='true'>".$dato['correo']."</td>";
					 echo "<td id='nombremascota:$id' class='cam_editable' contenteditable='true'>".$dato['nombremascota']."</td>";
					 echo "<td id='tipomascota:$id' class='cam_editable' contenteditable='true'>".$dato['tipomascota']."</td>";
					 echo "<td id='sexo:$id' class='cam_editable' contenteditable='true'>".$dato['sexo']."</td>";
					 echo "<td id='descripcion:$id' class='cam_editable' contenteditable='true'>".$dato['descripcion']."</td>";
					  
					 ///////////////////////////////////////	 
             echo"<td id='$id' button='true'><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-minus'></span> Eliminar</button></td>";
             
					 echo"</tr>";
					 }				
				?>
			</tbody>	
					
		</table>
	</div>
	</div>
	<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->
	<button type="button" onclick="ventananuevo();" class="btn btn-success btn-lg" >
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
    </button>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->
	</div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nuevo Paciente</h4>
            </div>
            <form role="form"  id= "frmpaciente" name="frmpaciente" onsubmit="Registrarpaciente(); return false">
              <div class="col-lg-12">               

              <div class="form-group">
                  <label>Nombre de usuario</label>
                  <input  name="nombreusuario" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Contraseña</label>
                  <input  name="password" id="p1" type="password"  class="form-control" required>
                </div>
               
                <div class="form-group">
                  <label>repita Contraseña</label>
                  <input  name="password2" id="p2" type="password"  class="form-control" required>
                </div>
                
                <label for="" class="dueño" >Datos del dueño</label>
                <div class="form-group">
                  <label>Nombre y Apellido</label>
                  <input  name="nombre" class="form-control" required>
                </div>
                
                 <div class="form-group">
                  <label>Cedula</label>
                  <input  name="cedula" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Direccion</label>
                  <input  name="direccion"  class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Telefono</label>
                  <input  name="telefono" type="number"  class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Correo</label>
                  <input  name="correo" type="email"  class="form-control" required>
                </div>
                 <!-------------------------------------------------------------------------  -->
                <label for="" class="dueño" >Datos de la mascota</label>
                 <br>
                 <div>
                <label>Nombre</label>
                  <input  name="nombremascota" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tipo de mascota</label>
                  <input  name="tipomascota" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Sexo</label>
                  <select name='sexo' class='form-control'>
					  <option value="Femenino">Femenino</option>
					  <option value="Masculino">Masculino</option>					  
				  </select>
                 </div>
                 <div class="form-group" >
                   <label for="">Razon de consulta</label>
                <textarea name="descripcion" id="" cols="5" rows="5"class="form-control" required></textarea>

                 </div>
        
                
                <button type="submit" class="btn btn-primary btn-lg" button='agregar'>
                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Registrar
                </button>
              </div>
            </form>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
	
<!--//////////////////////////////////////////////////-->
 <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nuevo Paciente</h4>
            </div>
            <form role="form"  id= "frmcambiar" name="frmcambiar" onsubmit="cambiarpassword(); return false">
              <div class="col-lg-12">               

                <div class="form-group">
                  <label>vieja contraseña</label>
                  <input  name="password0" id="p" class="form-control" type="password"required>
                </div>
                <div class="form-group">
                  <label>nueva contraseña</label>
                  <input  name="password1" id="p3" class="form-control" type="password"required>
                </div>
                
                <div class="form-group">
                  <label>repita nueva Contraseña</label>
                  <input  name="password2" id="p4" class="form-control" type="password" required>
                </div> 
                 <button type="submit" class="btn btn-primary btn-lg" button='agregar'>
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cambiar
                </button> 
              </div>
            </form>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
<!--//////////////////////////////////////////////////-->
<script src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/mainpaciente.js"></script>
<script type="text/javascript" src="js/change.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	
        function ventananuevo(){
          $('#modal').modal('show');

        }
	function cambiar(){
          $('#modal2').modal('show');

        }
    </script>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->
</body>