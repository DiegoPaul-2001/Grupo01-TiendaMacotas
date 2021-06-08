<?php 
$servidor="localhost";
$usuario="root";
$clave="";
$baseD="tiendamascotas";
$conectar = mysqli_connect($servidor,$usuario,$clave,$baseD) or die("Error en la conexion");
?>