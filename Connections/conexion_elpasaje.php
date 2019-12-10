<?php
$hostname_conexion_elpasaje= "localhost";
$database_conexion_elpasaje = "db_elpasaje_nueva";
$username_conexion_elpasaje = "root";
$password_conexion_elpasaje = "";
$conexion_elpasaje = @mysql_connect($hostname_conexion_elpasaje, $username_conexion_elpasaje, $password_conexion_elpasaje) or trigger_error(mysql_error(),E_USER_ERROR);
Class dbObj{
  var $hostname_conexion_elpasaje= "localhost";
  var $database_conexion_elpasaje = "db_elpasaje_nueva";
  var $username_conexion_elpasaje = "root";
  var $password_conexion_elpasaje = "";

function getConnstring() {
$con = mysqli_connect($this->hostname_conexion_elpasaje, $this->username_conexion_elpasaje, $this->password_conexion_elpasaje, $this->database_conexion_elpasaje) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
?>
