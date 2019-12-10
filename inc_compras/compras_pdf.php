<?php require_once('../Connections/conexion_elpasaje.php'); ?>
<?php include('../sis_acceso_ok.php'); ?>
<?php
include_once('../lib/pdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->SetTitle('LIBRO IVA_COMPRA');
    $this->Image('../images/logo.png',10,5,25);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->SetTextColor(39, 138, 226);

    $this->Cell(80,10,'LIBRO IVA COMPRA',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8

    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();

// $q_compra=mysql_query("SELECT * FROM compra");
mysql_select_db($database_conexion_elpasaje,$conexion_elpasaje);
if (isset($_POST['fechadesde']) && $_POST['fechadesde']!=''&& isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
  	$fecha_desde = $_POST['fechadesde'];
    $fecha_hasta = $_POST['fechahasta'];

  $result = mysqli_query($connString, "SELECT fechacompra,razonsocialproveedor,cuilproveedor,tiponombre, numerofactura,
     totalcompra, ivacompra FROM compra
    INNER JOIN proveedor on proveedor_idproveedor=idproveedor
    INNER JOIN tipo on tipo_idtipo = idtipo
      where fechacompra >= '$fecha_desde' && fechacompra <= '$fecha_hasta'") or die("database error:". mysqli_error($connString));

}else {
  if (isset($_POST['fechadesde']) && $_POST['fechadesde']!='') {
    $fecha_desde = $_POST['fechadesde'];
    $result = mysqli_query($connString, "SELECT fechacompra,razonsocialproveedor,cuilproveedor,tiponombre, numerofactura,
       totalcompra, ivacompra FROM compra
      INNER JOIN proveedor on proveedor_idproveedor=idproveedor
      INNER JOIN tipo on tipo_idtipo = idtipo
        where fechacompra >= '$fecha_desde'") or die("database error:". mysqli_error($connString));
  } else {
      if (isset($_POST['fechahasta']) && $_POST['fechahasta']!='') {
        $fecha_hasta = $_POST['fechahasta'];
        $result = mysqli_query($connString, "SELECT fechacompra,razonsocialproveedor,cuilproveedor,tiponombre, numerofactura,
           totalcompra, ivacompra FROM compra
          INNER JOIN proveedor on proveedor_idproveedor=idproveedor
          INNER JOIN tipo on tipo_idtipo = idtipo
            where fechacompra <= '$fecha_hasta'") or die("database error:". mysqli_error($connString));
      } else{
        $result = mysqli_query($connString, "SELECT fechacompra,razonsocialproveedor,cuilproveedor,tiponombre, numerofactura,
           totalcompra, ivacompra FROM compra
          INNER JOIN proveedor on proveedor_idproveedor=idproveedor
          INNER JOIN tipo on tipo_idtipo = idtipo") or die("database error:". mysqli_error($connString));

      }
  }
}

$total = 0;
while($row=mysqli_fetch_assoc($result))
  {
    $total = $total + $row['ivacompra'];
  }

$pdf = new PDF();
//header
$pdf->AddPage('L','A4',-90);
//foter page
$pdf->AliasNbPages();
$pdf->SetTextColor(39, 138, 226);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(37,8,"Fecha de compra",1,0,'C');
$pdf->Cell(37,8,"Proveedor",1,0,'C');
$pdf->Cell(37,8,"Cuil Proveedor",1,0,'C');
$pdf->Cell(37,8,"Cond. IVA",1,0,'C');
$pdf->Cell(37,8,"Nro Factura",1,0,'C');
$pdf->Cell(37,8,"Total($)",1,0,'C');
$pdf->Cell(37,8,"IVA",1,0,'C');

foreach($result as $row) {
  $pdf->SetTextColor(100);
  $pdf->SetFont('Arial','',9);
  $pdf->Ln();
  foreach($row as $column)
  $pdf->Cell(37,8,$column,1,0,'C');
}

$pdf->Ln();

$pdf->SetX(195);
$pdf->SetTextColor(208, 49, 53);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(37,8,'Total',1,0,'C');
$pdf->Cell(37,8,round($total, 2),1,0,'C');

$pdf->SetTextColor(100);
$pdf->Output('','IVA_COMPRA.pdf');
?>
