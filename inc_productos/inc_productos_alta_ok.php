<?php
	mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);

	 $nombreproducto=$_POST['nombreproducto'];
	 $stockproducto=$_POST['stockproducto'];
	 $marcaproducto=$_POST['marcaproducto'];
	 $porcganancia=$_POST['porcganancia'];
	 $stockcritico=$_POST['stockcritico'];
	 $preciocompra=$_POST['preciocompra'];
	 $idcategoriaproductos=$_POST['idcacategoriaproducto'];

	 $ganancia=$preciocompra * ($porcganancia/100);
	 $preciopublico = $preciocompra + $ganancia;


	$alta_producto = "INSERT INTO producto (nombreproducto, marca, stockproducto, porcentajeganancia, precioventa, preciocompra, stockcritico, categoriaproducto_idcategoriaproducto)
	 VALUES ('$nombreproducto',' $marcaproducto','$stockproducto', '$porcganancia', '$preciopublico', '$preciocompra', '$stockcritico', '$idcategoriaproductos')";
	mysql_query($alta_producto);
?>

<?php //si el producto se carga ?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
	<div><h2>Alta de producto exitosa!</h2></div>
	<br>
</div>
<div ><img src="images/icono_ok_grande.png"></div>
<div class="clearfix">
</div>
<a href="producto_alta.php">Agregar otro producto</a>
