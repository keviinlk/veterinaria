<?php
$conexion=(mysqli_connect("localhost","root","pastor"));
mysqli_select_db($conexion,'veterinaria') or die ("no se encuentra la bd");
mysqli_set_charset($conexion,"utf8");
?>
