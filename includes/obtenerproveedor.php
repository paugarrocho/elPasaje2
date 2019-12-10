
<?php
$hostname_conexion_elpasaje= "localhost";
$database_conexion_elpasaje = "db_elpasaje_nueva";
$username_conexion_elpasaje = "root";
$password_conexion_elpasaje = "";

$conexion_elpasaje = @mysql_connect($hostname_conexion_elpasaje, $username_conexion_elpasaje, $password_conexion_elpasaje) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);


$idproveedorjs = $_POST['idproveedorjs'];
$q_proveedores=mysql_query("SELECT * FROM proveedor
 	WHERE idproveedor=$idproveedorjs");
$row_proveedor=mysql_fetch_array($q_proveedores);
	echo $row_proveedor['cuilproveedor'];
?>
