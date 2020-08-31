<?php
if(!empty($_POST)){
	$conexion=(mysqli_connect("localhost","root","pastor"));
    mysqli_select_db($conexion,'veterinaria') or die ("no se encuentra la bd");	
	$nombreusuario=$_POST['nombreusuario'];
	$password=$_POST['password'];	
	$nombre=$_POST['nombre'];
	$cedula=$_POST['cedula'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	$nombremascota=$_POST['nombremascota'];
	$tipomascota=$_POST['tipomascota']; 
	$sexo=$_POST['sexo'];
	$descripcion=$_POST['descripcion'];
	
		
	
	
	$tipo='usuario';
	$consultarcedula="SELECT * FROM datosusuario where cedula='$cedula'";
	$resultadocedula=mysqli_query($conexion,$consultarcedula);
	$busquedacedula=mysqli_fetch_array($resultadocedula);
//	echo $busquedacedula;
	$consultarusuario="SELECT * FROM usuarios where nombre='$nombreusuario'";
	$resultadousuario=mysqli_query($conexion,$consultarusuario);	
	$busquedausuario=mysqli_fetch_array($resultadousuario);
//	echo $busquedausuario;	
	if(empty($busquedacedula)&&empty($busquedausuario)){		
		$insertar="INSERT INTO usuarios (nombre, password, tipo) VALUES ('$nombreusuario', '$password', '$tipo')";
        mysqli_query($conexion,$insertar) or die ("NO se pudo insertar usuario");
		$insertar="INSERT INTO datosusuario (idusuario, nombre, cedula, direccion, telefono, correo, nombremascota, tipomascota, sexo, descripcion, cita) VALUES ('$nombreusuario', '$nombre', '$cedula', '$direccion', '$telefono', '$correo', '$nombremascota', '$tipomascota','$sexo', '$descripcion', 0)";
        mysqli_query($conexion,$insertar) or die ("NO se pudo insertar datos personales");
        mysqli_close($conexion);
			echo"true";
		}else{
		    if (!empty($busquedacedula)){
				echo "la cedula ya esta registrada";
			}
		    if (!empty($busquedausuario)){
				echo "el nombre de usuario ya existe";
			}	
		}
}
?>