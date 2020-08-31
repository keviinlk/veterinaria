<?php
if(!empty($_POST)){
	$enlace=mysqli_connect('localhost','root','pastor');
	if (!$enlace){
		die('no se pudo conectar: '.mysqli_error());
	}
	mysqli_select_db($enlace,'veterinaria');
	foreach($_POST as $field_name=>$val){
		$field_id=strip_tags(trim($field_name));
		
			$sql = "DELETE FROM usuarios WHERE nombre='$field_id'";
			$borrar = "DELETE FROM datosusuario WHERE idusuario='$field_id'";
		//	mysqli_query("DELETE FROM usuarios where nombre='$field_id'") or mysqli_error();
		//	mysqli_query("DELETE FROM datosusuario where idusuario='$field_id'") or mysqli_error();
		if (($enlace->query($sql))&&($enlace->query($borrar))  === TRUE) {
			echo "true";
			
		} else {
			echo "Error al borrar registro: " . $enlace->error;
		}
		
		
	}
}
?>