<?php  
function conexion(){

$servidor = "localhost"; 
$usuario = "root"; 
$clave = "";
$base = "tiendamascotas"; 

$conectar = mysqli_connect($servidor,$usuario,$clave,$base) or die("ERROR EN LA CONEXION");
return $conectar;
}

function buscar($a,$b){
	$conect = conexion();
	$buscarUsuario = "SELECT cliUsuario,cliContraseña FROM clientes WHERE cliUsuario='$a' && cliContraseña='$b'";
	$unir = mysqli_query($conect,$buscarUsuario);
	$unirA = mysqli_num_rows($unir);
	return $unirA;
}

?>