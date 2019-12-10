
<?php

$hostname_conexion_elpasaje= "localhost";
$database_conexion_elpasaje = "db_elpasaje_nueva";
$username_conexion_elpasaje = "root";
$password_conexion_elpasaje = "";
$conexion_elpasaje = @mysql_connect($hostname_conexion_elpasaje, $username_conexion_elpasaje, $password_conexion_elpasaje) or trigger_error(mysql_error(),E_USER_ERROR);


mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);


$idtipoliquidacionjs = $_POST['idtipoliquidacionjs'];
$q_tipoliquidacion=mysql_query("SELECT * FROM tipoliquidacion
 	WHERE idtipoliquidacion=$idtipodeliquidacionjs");
$row_tipoliquidacion=mysql_fetch_array($q_tipoliquidacion);
	echo $row_tipoliquidacion['idtipoliquidacion'];
?>
