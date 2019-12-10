
<?php
$hostname_conexion_elpasaje= "localhost";
$database_conexion_elpasaje = "db_elpasaje_nueva";
$username_conexion_elpasaje = "root";
$password_conexion_elpasaje = "";

$conexion_elpasaje = @mysql_connect($hostname_conexion_elpasaje, $username_conexion_elpasaje, $password_conexion_elpasaje) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);

$fechaliquidacionjs = $_POST['fechaliquidacionjs'];
$idempleadojs=$_POST['idempleado'];
$band=0;
if (isset($fechaliquidacionjs) && $fechaliquidacionjs!="") {
	$separaperiodo= explode('-', $fechaliquidacionjs);
    $anioperiodoing = $separaperiodo[0];
    $mesperiodoing = $separaperiodo[1];
}
else{
    $anioperiodoing=date("Y");
	    $mesperiodoing =date("m");
}
$anioperiodoing;
$mesperiodoing;
$anioactual=date("Y");

if ($anioperiodoing>=$anioactual) {

	$empleados="SELECT * FROM empleado
	WHERE idempleado IN ($idempleadojs) AND estado=1 ORDER BY idempleado DESC LIMIT 0,1";
	$q_empleados=mysql_query($empleados);
	$row_empleado=mysql_fetch_array($q_empleados);
	$idempleado=$row_empleado['idempleado'];

	$liquidaciones="SELECT * FROM liquidacion
	WHERE empleado_idempleado=$idempleado";
	$q_liquidacion=mysql_query($liquidaciones);

	while ($row_liquidaciones=mysql_fetch_array($q_liquidacion)) {

		$separaperiodoliq= explode('-', $row_liquidaciones['fechaliquidacion']);
   		$mesperiodoliq = $separaperiodoliq[1];
   		if ($mesperiodoliq==$mesperiodoing) {
   			$band=1;
   		}
	}
	 echo $band;
}

else echo $band=1;

?>
