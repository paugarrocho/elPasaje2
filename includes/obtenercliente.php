
<?php
$hostname_conexion_elpasaje= "localhost";
$database_conexion_elpasaje = "db_elpasaje_nueva";
$username_conexion_elpasaje = "root";
$password_conexion_elpasaje = "";

$conexion_elpasaje = @mysql_connect($hostname_conexion_elpasaje, $username_conexion_elpasaje, $password_conexion_elpasaje) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);


$idclientejs = $_POST['idclientejs'];
$q_clientes=mysql_query("SELECT * FROM cliente
  INNER JOIN tipo ON tipo_idtipo=idtipo
  INNER JOIN direccion ON direccion_iddireccion=iddireccion
  INNER JOIN localidad ON localidad_idlocalidad=idlocalidad
  INNER JOIN provincia ON provincia_idprovincia=idprovincia
  WHERE idcliente=$idclientejs
  ORDER BY nombreorsocial");
$row_cliente=mysql_fetch_array($q_clientes);
	echo $row_cliente['cuilcliente'].",".$row_cliente['tiponombre'];
?>
