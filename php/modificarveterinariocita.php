<?php
if(!empty($_POST)){
	$conexion=(mysqli_connect("localhost","root","pastor"));
    mysqli_select_db($conexion,'veterinaria') or die ("no se encuentra la bd");	
	foreach($_POST as $field_name=>$val){
		echo $field_name; //codigo del horario
		echo $val; // nombre del veterinario		
				if(!empty($field_name)&&!empty($val)){					 
					mysqli_query($conexion,"UPDATE horarios set veterinario='$val' where id='$field_name'");
					echo"registro modificado correctamente";
				}else{
					echo"no se pudo actualizar";
				}
	}
}
?>