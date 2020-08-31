<?php
if(!empty($_POST)){
	session_start();
	$conexion=(mysqli_connect("localhost","root","pastor"));
    mysqli_select_db($conexion,'veterinaria') or die ("no se encuentra la bd");	
	$user=$_POST['usuario'];
	$pass=$_POST["password"];
	$sql="SELECT * FROM usuarios WHERE nombre='$user'";
	$consulta=mysqli_query($conexion,$sql)or die(mysqli_error());
//	if($fila=mysql_fetch_array($consulta,MYSQL_NUM)){
	//if($fila=mysql_fetch_array($consulta,MYSQL_ASSOC)){
		if( $fila = mysqli_fetch_assoc($consulta)){
//		echo "este usuario existe";
		if($pass==$fila['password']){
//			echo "contraseña correcta";
			$_SESSION['nombre']=$user;
			$_SESSION['tipo']=$fila['tipo'];
			echo $fila['tipo'];
		}else{
			session_destroy();
			mysqli_close($conexion);
			echo "contraseña incorrecta";
		}
		
	}else{
		session_destroy();
		mysqli_close($conexion);
		echo "este usuario no existe";
	}
}
?>