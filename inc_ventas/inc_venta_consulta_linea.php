<?php

mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);

$consulta="SELECT * FROM lineaventa
INNER JOIN producto ON producto_idproducto=idproducto
WHERE venta_idventa=1";
$q_consulta=mysql_query($consulta);

?>