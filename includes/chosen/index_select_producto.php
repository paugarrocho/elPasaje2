<?php
 mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);

  $q_productos=mysql_query("SELECT * FROM producto
  ORDER BY nombreproducto");
?>
  <select data-placeholder="Productos" class="form-control chosen-select" tabindex="4" name="idproducto" id="inputidproducto">
      <option value="">Seleccione un Producto</option>
      <?php
      while ($row_productos=mysql_fetch_array($q_productos)){
        if ($row_productos['stockproducto']!=0) { ?>
          <option value="<?php echo $row_productos['idproducto']?>"><?php echo $row_productos['idproducto']?> - <?php echo $row_productos['nombreproducto']?> <?php echo $row_productos['marca']?> </option>
        <?php }
} ?>
  </select>


  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'No encontrado'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>

    <script type="text/javascript">
    $('select#inputidproducto').on('change',function(){
    var idproductojs = $(this).val();
    $.post("includes/obtenerproducto.php", { idproductojs: idproductojs }, function(data){

                var devuelve=data.split(",");
                var idproducto = devuelve[0];
                var inputprecioventa = devuelve[1];
                var stockproducto= devuelve[2];
                $("#idproducto").val(idproducto);
                $("#precioventa").val(inputprecioventa);
                $("#stockproducto").val(stockproducto);
            });
    });
    </script>
