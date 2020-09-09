<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Venta{
    protected $idPersona;
    protected $venta;
    protected $nomCli;
    protected $User;
    protected $Caja;
    protected $Prod;
    protected $caja_arr;
    protected $venta_arr;
    public $sentencia;
    public $tamanho_paginas;

    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->venta=array();
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectVenta($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT idVenta, fechaVenta, tipoVenta, descVenta, producVenta, medioPago, totalVenta, idUsuario, userName, Usuario_idUsuario, Caja_idCaja FROM venta, caja, usuario WHERE Usuario_idUsuario = idUsuario AND Caja_idCaja = idCaja ORDER BY idVenta DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->venta[]=$filas;
        } 
        return $this->venta;
    }
    
    public function VentaSeleccionado($txtID1) {
        $conexion = new DB();
        $sql1 = "SELECT idVenta, fechaVenta, tipoVenta, descVenta, producVenta, medioPago, totalVenta, userName, idUsuario, Usuario_idUsuario, Caja_idCaja FROM venta, caja, usuario WHERE Usuario_idUsuario = idUsuario AND Caja_idCaja = idCaja AND idVenta = :idVenta";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->bindParam(':idVenta',$txtID1);
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
    }
    
    public function SelectUser(){
        $conexion = new DB();
        $sql1 = "SELECT * FROM usuario";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->execute();
        while($filas=$sentencia->fetch(PDO::FETCH_ASSOC)){
                   $this->User[]=$filas;
        } 
        return $this->User;
    }
    
    public function SelectCaja(){
        $conexion = new DB();
        $sql2 = "SELECT * FROM caja";
        $sentencia = $conexion->conectar()->prepare($sql2); 
        $sentencia->execute();
        while($filas=$sentencia->fetch(PDO::FETCH_ASSOC)){
                   $this->Caja[]=$filas;
        } 
        return $this->Caja;
    }
    
    public function SelectProducto(){
        $conexion = new DB();
        $sql3 = "SELECT * FROM articulo ORDER BY nomArt";
        $sentencia = $conexion->conectar()->prepare($sql3); 
        $sentencia->execute();
        while($filas=$sentencia->fetch(PDO::FETCH_ASSOC)){
                   $this->Prod[]=$filas;
        } 
        return $this->Prod;
    }
    //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM venta";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERCIONES
    ////////////////////////////////////////////////////////////////////////////   
    protected function InsertVenta($tipoVenta, $descVenta, $producVenta, $medioPago, $totalVenta, $idUsuario) {
        $conexion = new DB();
        $sql = "INSERT INTO venta (idVenta, fechaVenta, tipoVenta, descVenta, producVenta, medioPago, totalVenta, Usuario_idUsuario, Caja_idCaja) VALUES (default, now(), :tipoVenta, :descVenta, :producVenta, :medioPago, :totalVenta, :idUsuario, (SELECT MAX(idCaja)FROM caja))";
        $insertar = $conexion->conectar()->prepare($sql);        
        $insertar->execute(array(":tipoVenta"=>$tipoVenta, ":descVenta"=>$descVenta,":producVenta"=>$producVenta, ":medioPago"=>$medioPago, ":totalVenta"=>$totalVenta, ":idUsuario"=>$idUsuario));
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZACIONES
    ////////////////////////////////////////////////////////////////////////////
    protected function UpdateVenta($idVenta, $fechaVenta, $tipoVenta, $descVenta, $producVenta, $medioPago, $totalVenta, $idUsuario) {
        $conexion = new DB();
        $sql = "UPDATE venta SET fechaVenta = :fechaVenta, tipoVenta = :tipoVenta, descVenta = :descVenta, producVenta = :producVenta, medioPago = :medioPago, totalVenta = :totalVenta, Usuario_idUsuario = :idUsuario WHERE idVenta = '$idVenta'";
        $actualizar = $conexion->conectar()->prepare($sql);        
        $actualizar->execute(array(":fechaVenta"=>$fechaVenta, ":tipoVenta"=>$tipoVenta, ":descVenta"=>$descVenta,":producVenta"=>$producVenta, ":medioPago"=>$medioPago, ":totalVenta"=>$totalVenta, ":idUsuario"=>$idUsuario));
    }
    /////////////////////////////////////////////////////////////////////////////
    //VALIDACIONES
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarVentas($userName,$userPass) {
        $conexion = new DB();
        $sql = "SELECT * FROM usuario";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['userName'] == $userName || $validar['userPass'] == $userPass){
                       return false;
                   }
        } 
        return true;
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteVenta($idventa) {
        $conexion = new DB();
        //Eliminar domicilio
        $sql1 = "DELETE FROM venta WHERE idVenta = '$idventa'";
        $eliminar1 = $conexion->conectar()->prepare($sql1);
        $eliminar1->execute();
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSQUEDAS
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchFecha($fecha) {
        $conexion = new DB();
        $sql = "SELECT * FROM venta, usuario, caja WHERE Caja_idCaja = idCaja AND Usuario_idUsuario = idUsuario AND fechaVenta LIKE '%$fecha%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->venta_arr[]=$objetoconsulta;
        }   
        return $this->venta_arr;
    }
    protected function SearchCaja($caja) {
        $conexion = new DB();
        $sql = "SELECT * FROM venta, usuario, caja WHERE Caja_idCaja = idCaja AND Usuario_idUsuario = idUsuario AND Caja_idCaja LIKE '%$caja%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->caja_arr[]=$objetoconsulta;
        }   
        return $this->caja_arr;        
    }
}

?>