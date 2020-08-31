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

if ($enlace->query($sql) === TRUE) {
	echo "true";
	
} else {
    echo "Error al borrar registro: " . $enlace->error;
}

	}
}
?>