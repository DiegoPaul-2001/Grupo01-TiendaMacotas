<?php 
$servidor="localhost";
$usuario="root";
$clave="";
$baseD="tiendamascotas";
$conectar = mysqli_connect($servidor,$usuario,$clave,$baseD) or die("Error en la conexion");

function conectar(){
$servidor="localhost";
$usuario="root";
$clave="";
$baseD="tiendamascotas";
$conectar = mysqli_connect($servidor,$usuario,$clave,$baseD) or die("Error en la conexion");
return $conectar;
}
function buscar($a,$b){
	$conect = conectar();
	$buscarUsuario = "SELECT USUARIO,CONTRASEÑA FROM clientes WHERE USUARIO='$a' && CONTRASEÑA='$b'";
	$unir = mysqli_query($conect,$buscarUsuario);
	$unirA = mysqli_num_rows($unir);
	return $unirA;
}
?>