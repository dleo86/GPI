<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Iva{
    protected $idIva;
    protected $descIva;
    protected $datos;
    //protected $nomCli;
    public $sentencia;

    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->descIva=array();
        $this->datos=array();
    }
    
    ////////////////////////////////////////////////////////////////////////////
    //INSERCIONES
    ////////////////////////////////////////////////////////////////////////////   
    protected function InsertIva($TipoIva) {
        $conexion = new DB();
        $sql = "INSERT INTO iva (idIva, descripIva) VALUES (default, :descripIva)";
        $insertar = $conexion->conectar()->prepare($sql);        
        $insertar->execute(array(":descripIva"=>$TipoIva));
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateIva($idIva, $TipoIva){
        $conexion = new DB();
        $sql = "UPDATE iva SET descripIva = :descripIva WHERE idIva = '$idIva'";
        $actualizar = $conexion->conectar()->prepare($sql);        
        $actualizar->execute(array(":descripIva"=>$TipoIva));          
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectIva($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT idIva, descripIva FROM iva ORDER BY idIva DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->descIva[]=$filas;
        } 
        return $this->descIva;
    }
    
    public function IvaSeleccionado($txtID1) {
        $conexion = new DB();
        $accionAgregar= "disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $sql1 = "SELECT idIva, descripIva FROM iva WHERE idIva = :idIva";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->bindParam(':idIva',$txtID1);
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
    }
    //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM iva";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
     ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteIva($idiva) {
        $conexion = new DB();
        //Eliminar domicilio
        $sql1 = "DELETE FROM iva WHERE idIva = '$idiva'";
        $eliminar1 = $conexion->conectar()->prepare($sql1);
        $eliminar1->execute();
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchIvaByName() {
        $conexion = new DB();
        //VERIFICAR SI USUARIO ES EL VALOR CORRECTO EN LA TABLA
        $sql = "SELECT * FROM iva WHERE nomPersona = '$this->nomCli'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
        $objetoconsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoconsulta;
    }
}

?>