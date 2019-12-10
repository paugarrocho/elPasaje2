
<?php
$hostname_conexion_elpasaje= "localhost";
$database_conexion_elpasaje = "db_elpasaje_nueva";
$username_conexion_elpasaje = "root";
$password_conexion_elpasaje = "";

$conexion_elpasaje = @mysql_connect($hostname_conexion_elpasaje, $username_conexion_elpasaje, $password_conexion_elpasaje) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);


$idproductojs = $_POST['idproductojs'];
$q_productos=mysql_query("SELECT * FROM producto
  WHERE idproducto=$idproductojs
  ORDER BY nombreproducto"); 
$row_producto=mysql_fetch_array($q_productos);
	echo $row_producto['idproducto'].",".$row_producto['precioventa'].",".$row_producto['stockproducto'];
?>