<?php
mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);
$idcliente=$_GET['idcliente'];
$direccion="SELECT * FROM cliente
INNER JOIN direccion ON direccion_iddireccion = iddireccion
INNER JOIN localidad ON localidad_idlocalidad=idlocalidad
INNER JOIN provincia ON provincia_idprovincia=idprovincia
WHERE idcliente=$idcliente";
$q_direccion=mysql_query($direccion);

?>

<table class='table table-bordered table-striped'>
	<thead>
		<th>Provincia</th>
		<th>Localidad</th>
		<th>Calle</th>
		<th>Numero</th>
		<th>Barrio</th>
		<th>Manzana</th>
	</thead>
	<tbody>
	<?php while ($row_direccion= mysql_fetch_array($q_direccion)) { ?>
		<tr>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_direccion['nombreprovincia']; ?></td>
			<td class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><?php echo $row_direccion['nombrelocalidad']; ?></td>
			<td class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?php echo $row_direccion['calle']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_direccion['numero']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_direccion['barrio']; ?></td>
			<td class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><?php echo $row_direccion['manzana']; ?></td>
		</tr>

		<tr>

			<td colspan="8"><a><a href="cliente_modificar_direccion.php?idcliente=<?php echo $idcliente ; ?>&iddireccion=<?php echo $row_direccion['iddireccion'] ; ?>"><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></a></td>
	</tr>
		<?php } ?>

	</tbody>	
</table>