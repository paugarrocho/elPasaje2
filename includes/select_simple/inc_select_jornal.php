<?php 
mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);

$horastrabajadas=mysql_query("SELECT * FROM horastrabajadas ORDER BY cantidadhoras");
?>
	<select name="horastrabajadas" id="" class="form-control" required="required">
	<?php 
	while ($row_horas=mysql_fetch_array($horastrabajadas)) { ?>
		<option value="<?php echo $row_horas['idhotastrabajadas'] ?>"><?php echo $row_horas['cantidadhoras']." horas" ?></option>
	<?php } ?>
	</select>