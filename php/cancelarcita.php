<?php
if(!empty($_POST)){
	$enlace=mysqli_connect('localhost','root','pastor');
	if (!$enlace){
		die('no se pudo conectar: '.mysqli_error());
	}
	mysqli_select_db($enlace,'veterinaria');	
	foreach($_POST as $field_name=>$val){
		$field_id=strip_tags(trim($field_name));
		$val=strip_tags(trim(mysqli_real_escape_string($enlace,$val)));
		$split_data=explode(':',$field_id);
		$field_name=$split_data[0];
		// if(!empty($field_name)&&!empty($val)){

			$sql = "UPDATE datosusuario set cita='0' where idusuario='$val'"; 	
			$subir = "UPDATE horarios set paciente='' where id='$field_name'";

			if (($enlace->query($sql))&&($enlace->query($subir))  === TRUE) {
				echo "true";
				
			} else {
				echo "Error al borrar registro: " . $enlace->error;
			}
			// mysql_query("UPDATE datosusuario set cita='0' where idusuario='$val'") or mysql_error();
			// mysql_query("UPDATE horarios set paciente='' where id='$field_name'") or mysql_error();
			// echo"true";
		// }else{
		// 	echo"false";
		// }
	}
}
?>