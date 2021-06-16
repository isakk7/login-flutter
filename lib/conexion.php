<?php 
$server = "ioteacenter.ga";
$user = "admin_ioteacent";
$password = "260881260881";
$db = "admin_ioteacent";

$conexion = new mysqli($server,$user,$password,$db);
if ($conexion->connect_errno) {
	die("La conexion ha fallado" . $conexion->connect_errno);
} else
{
	echo "conexion exitosa";
}
 ?>
