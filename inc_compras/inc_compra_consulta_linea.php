<?php

mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);

$consulta="SELECT * FROM lineacompra
INNER JOIN producto ON producto_idproducto=idproducto
WHERE compra_idcompra=1";
$q_consulta=mysql_query($consulta);

?>