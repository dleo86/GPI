<?php
require_once ('modelo/informe.php');

$info = new informe();
class informeController extends informe{
    
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($info) {
        
    }
}
$controlador = new informeController();
$fecha1 = $_POST['date1'];
$fecha2 = $_POST['date2'];
$tipo = 1;
if ($fecha2 < $fecha1) {
  $tipo = 6;
}
if (($fecha2 == null) || ($fecha1 == null)) {
  $tipo = 7;
}
$controlador->SelectView($info);
?>
