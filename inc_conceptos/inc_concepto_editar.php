<?php
mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);

$idconcepto=$_GET['idconcepto'];
$concepto="SELECT * FROM concepto WHERE idconcepto=$idconcepto";
$q_concepto=mysql_query($concepto);
$row_concepto= mysql_fetch_array($q_concepto);

?>

<table class='table table-bordered table-striped'>
<form action="concepto_editar_ok.php" method="POST">

<tr>
	<td><div align='right'>ID Concepto: </td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" value="<?php echo $idconcepto; ?>" name="idconcepto" readonly></div></td>
</tr>

<tr>
	<td><div align='right'>Descripcion:</div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="descripcionconcepto" required="required" value="<?php echo $row_concepto['descripcionconcepto'] ?>"></div></td>
	
</tr>

<tr>
	<td><div align='right'>Monto fijo: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="montofijo" value="<?php echo $row_concepto['montofijo'] ?>"></div></td>
</tr>

<tr>
	<td><div align='right'>Monto variable: </div></td>
	<td><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input class="form-control" type="text" name="montovariable" value="<?php echo $row_concepto['montovariable'] ?>"></div></td>
</tr>
 
<tr>
	<div class="form-group">
		<td><div align='right'>Tipo de concepto: </div></td>
		<td>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<select name="tipoconcepto" id="inputTipoconcepto" class="form-control" required="required">
				<?php if($row_concepto['tipoconcepto'] == 0){ ?>
				<option value="0">Retenci&oacute;n</option>
				<option value="1">Aporte</option>
				<?php } else{?>
				<option value="1">Aporte</option>
				<option value="0">Retenci&oacute;n</option>
				<?php	} ?>
			</select>
		</div>
		</td>
	</div>

</tr>

<tr>
	<td></td>
	<td><input type="submit" class="btn btn-info pull-right" name="button" id="button" value="Modificar"></td>
</tr>
	
</form>	
</table>
