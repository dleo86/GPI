<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Caja{
    protected $total;
    protected $subtotal;
    protected $datos;
    protected $fecha_arr;
    public $sentencia;

    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->cliente=array();
        $this->datos=array();
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERCIONES
    ////////////////////////////////////////////////////////////////////////////
    protected function InsertCaja($totalCaja,$subtotalCaja) {
        $conexion = new DB();
        $sql = "INSERT INTO caja (idCaja, totalCaja, subtotalCaja, fechaCaja) VALUES (default,:totalCaja, :subtotalCaja, now())";
        $insertar = $conexion->conectar()->prepare($sql);

        $insertar->execute(array(":totalCaja"=>$totalCaja, ":subtotalCaja"=>$subtotalCaja));
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZACIONES
    ////////////////////////////////////////////////////////////////////////////
    protected function UpdateCaja($idCaja, $totalCaja, $subtotalCaja) {
        $conexion = new DB();
        $sql = "UPDATE caja SET totalCaja = :totalCaja, subtotalCaja = :subtotalCaja WHERE idCaja = '$idCaja'";
        $actualizar = $conexion->conectar()->prepare($sql);

        $actualizar->execute(array(":totalCaja"=>$totalCaja, ":subtotalCaja"=>$subtotalCaja));
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectCaja($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT idCaja, totalCaja, subtotalCaja, fechaCaja FROM caja ORDER BY idCaja DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->total[]=$filas;
        } 
        return $this->total;
    }
    
    public function CajaSeleccionado($txtID1) {
        $conexion = new DB();
        $sql1 = "SELECT idCaja, totalCaja, subtotalCaja, fechaCaja FROM caja WHERE idCaja = :idCaja";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->bindParam(':idCaja',$txtID1);
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
    }
     //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM caja";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteCaja($idcaja) {
        $conexion = new DB();
        //Eliminar domicilio
        $sql1 = "DELETE FROM caja WHERE idCaja = '$idcaja'";
        $eliminar1 = $conexion->conectar()->prepare($sql1);
        $eliminar1->execute();
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSQUEDAS
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchFecha($fecha) {
        $conexion = new DB();
        $sql = "SELECT * FROM caja WHERE fechaCaja LIKE '%$fecha%'";
         $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->fecha_arr[]=$objetoconsulta;
        }   
        return $this->fecha_arr;
    }
}

?>