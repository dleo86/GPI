<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class TipoArticulo{
    protected $descripArt;
    protected $tipoArt;
    protected $precioArt;
    protected $tipo_articulo;
    protected $idArt;
    protected $producto;
    protected $sentencia;
    protected $rubroArticulo;

    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->tipo_articulo=array();
        $this->producto=array();
    }
     /////////////////////////////////////////////////////////////////////////////
    //VALIDACIONES
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarTipoArt($tipoArt) {
        $conexion = new DB();
        $sql = "SELECT * FROM tipoart";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['tipoArt'] == $tipoArt){
                       return false;
                   }
        } 
        return true;
    }
    
    public function ValidarUpdate($idTipoArt, $descripArt,$tipoArt ) {
        $conexion = new DB();
        $sql = "SELECT * FROM tipoart WHERE idTipoArt != 'idTipoArt'";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                if($validar['tipoArt'] == $tipoArt){
                     return false;
                }
        } 
        return true;
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateTipoArticulo($idTipoArt, $descripArt,$tipoArt) {
        $conexion = new DB();
        $sql = "UPDATE tipoart SET descripArt = :descripArt, tipoArt = :tipoArt WHERE idTipoArt = '$idTipoArt'";
        $actualizar = $conexion->conectar()->prepare($sql);
        $actualizar->execute(array(":descripArt"=>$descripArt, ":tipoArt"=>$tipoArt));
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERCIONES
    //////////////////////////////////////////////////////////////////////////// 
    public function InsertTipoArt($idTipoArt, $descripArt, $tipoArt) {
        $conexion = new DB();
        $sql = "INSERT INTO tipoart (idTipoArt, descripArt, tipoArt) VALUES (default, :descripArt, :tipoArt)";
        $insertar = $conexion->conectar()->prepare($sql);   
        $insertar->execute(array(":descripArt"=>$descripArt, ":tipoArt"=>$tipoArt));
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectTipoArt($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT * FROM tipoart ORDER BY idTipoArt DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->tipo_articulo[]=$filas;
        } 
        return $this->tipo_articulo;
    }
    
    public function TipoSeleccionado($txtID1) {
        $conexion = new DB();
        $accionAgregar= "disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $sql1 = "SELECT * FROM tipoart WHERE idTipoArt = :idTipoArt";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->bindParam(':idTipoArt',$txtID1);
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
    }
    //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM tipoart ORDER BY idTipoArt";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
     ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteTipoArticulo($idTipoArt) {
        $conexion = new DB();
        $sql = "DELETE FROM tipoart WHERE idTipoArt = '$idTipoArt'";
        $eliminar = $conexion->conectar()->prepare($sql);
        $eliminar->execute();
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchArticuloByTipo($tipoArt) {
        $conexion = new DB();
        $sql = "SELECT * FROM tipoart WHERE tipoArt LIKE '%$tipoArt%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
        while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->rubroArticulo[]=$objetoconsulta;
        } 
        return $this->rubroArticulo;
    }
}

?>