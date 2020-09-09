<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Articulo{
    protected $idArticulo;
    protected $codArt;
    protected $nomArt;
    protected $precioArt;
    protected $stockArt;
    protected $articulo;
    protected $Img;
    protected $idArt;
    protected $producto;
    public $sentencia;
    protected $tipoArticulo;
    protected $codArticulo;
    protected $nomArticulo;
    public $tamanho_paginas;
    

    public function __construct() {   
        require_once 'db.php';
        $this->articulo=array();
        $this->producto=array();
    }
    /////////////////////////////////////////////////////////////////////////////
    //VALIDACIONES
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarArt($codArt, $nomArt, $marcaArt ) {
        $conexion = new DB();
        $sql = "SELECT * FROM articulo";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['codArt'] == $codArt || ($validar['nomArt'] == $nomArt && $validar['marcaArt'] == $marcaArt)){
                       return false;
                   }
        } 
        return true;
    }
    
    public function ValidarUpdate($idArticulo, $codArt, $nomArt, $marcaArt ) {
        $conexion = new DB();
        $sql = "SELECT * FROM articulo WHERE idArticulos != '$idArticulo'";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                if($validar['codArt'] == $codArt || ($validar['nomArt'] == $nomArt && $validar['marcaArt'] == $marcaArt)){
                     return false;
                }
        } 
        return true;
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERCIONES
    ////////////////////////////////////////////////////////////////////////////   
    public function InsertArticulo($idArticulo, $codArt, $nomArt, $stockArt, $precioArt, $marcaArt, $Img, $TipoArt_idTipoArt1) {
        $conexion = new DB();
        $Fecha = new DateTime();
        $precioArt = floatval($precioArt);
        $tipo=substr($Img, -3);
        if ($tipo == 'jpg' || $tipo == 'png'){
            $nombreArchivo = ($Img != "")?$Fecha->getTimestamp()."_".$_FILES["Img"]["name"]:"";            
            $tmpImg = $_FILES["Img"]["tmp_name"];           
            if($tmpImg!=""){
                move_uploaded_file($tmpImg, "img/".$nombreArchivo);
            }
        } else {
            $Img = " ";
            $nombreArchivo = " ";
        }
        $sql = "INSERT INTO articulo(idArticulos, codArt, nomArt, stockArt, precioArt, marcaArt, Img ,TipoArt_idTipoArt1) VALUES (default, :codArt, :nomArt, :stockArt, :precioArt, :marcaArt, :Img, :TipoArt_idTipoArt1)";
        $insertar = $conexion->conectar()->prepare($sql);
        $insertar->execute(array(":codArt"=>$codArt, ":nomArt"=>$nomArt, ":stockArt"=>$stockArt, ":precioArt"=>$precioArt, ":marcaArt"=>$marcaArt, ":Img"=>$nombreArchivo, ":TipoArt_idTipoArt1"=>$TipoArt_idTipoArt1));
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateArticulo($idArticulo, $codArt, $nomArt, $stockArt, $precioArt, $marcaArt, $Img, $TipoArt_idTipoArt1) {
        $conexion = new DB();
        $Fecha = new DateTime();
        $tipo=substr($Img, -3);
        if ($tipo == 'jpg' || $tipo == 'png'){
            $nombreArchivo = ($Img != "")?$Fecha->getTimestamp()."_".$_FILES["Img1"]["name"]:"";            
            $tmpImg = $_FILES["Img1"]["tmp_name"];           
            if($tmpImg!=""){
                move_uploaded_file($tmpImg, "img/".$nombreArchivo);
            }
        } else {
            $Img = " ";
            $nombreArchivo = " ";
        }
        $sql = "UPDATE articulo SET codArt = :codArt, nomArt = :nomArt, stockArt = :stockArt, precioArt = :precioArt, marcaArt = :marcaArt, Img = :Img, TipoArt_idTipoArt1 = :tipoArt WHERE idArticulos = '$idArticulo'";
        $actualizar = $conexion->conectar()->prepare($sql);
        $actualizar->execute(array(":codArt"=>$codArt, ":nomArt"=>$nomArt, ":stockArt"=>$stockArt, ":precioArt"=>$precioArt, ":marcaArt"=>$marcaArt, ":Img"=>$nombreArchivo, ":tipoArt"=>$TipoArt_idTipoArt1));
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteArticulo($idArticulo) {
        $conexion = new DB();
        $sql = "DELETE FROM articulo WHERE idArticulos = '$idArticulo'";
        $eliminar = $conexion->conectar()->prepare($sql);
        $eliminar->execute();
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectArticulo($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT * FROM articulo, tipoart WHERE idTipoArt = TipoArt_idTipoArt1 ORDER BY idArticulos DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->articulo[]=$filas;
        } 
        return $this->articulo;
    }
    
    public function Seleccionado($txtID1) {
        $conexion = new DB();
        $sql1 = "SELECT * FROM articulo, tipoart WHERE idTipoArt = TipoArt_idTipoArt1 AND idArticulos = :idArticulos";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->bindParam(':idArticulos',$txtID1);
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
    }
    
    public function SelectTipo(){
        $conexion = new DB();
        $sql1 = "SELECT * FROM tipoArt";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->execute();
        while($filas=$sentencia->fetch(PDO::FETCH_ASSOC)){
                   $this->tipoArticulo[]=$filas;
        } 
        return $this->tipoArticulo;
    }
    //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM articulo ORDER BY codArt";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSQUEDAS
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchArticuloByCode($codArt) {
        $conexion = new DB();
        $sql = "SELECT * FROM articulo WHERE codArt LIKE '%$codArt%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
        //$objetoconsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        //$fila=$sentencia->fetch(PDO::FETCH_LAZY);
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->codArticulo[]=$objetoconsulta;
        } 
        return $this->codArticulo;
    }

    protected function SearchArticuloByName($nomArt) {
        $conexion = new DB();
        $sql = "SELECT * FROM articulo WHERE nomArt LIKE '%$nomArt%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->nomArticulo[]=$objetoconsulta;
        } 
        return $this->nomArticulo;
    }
}

?>