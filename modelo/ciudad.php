<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Ciudad{
    protected $idCity;
    protected $descCity;
    protected $provincia;
    protected $datos;
    protected $city_arr;
    public $sentencia;

    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->descCity=array();
        $this->datos=array();
    }   
    ////////////////////////////////////////////////////////////////////////////
    //INSERCIONES
    ////////////////////////////////////////////////////////////////////////////   
    protected function InsertCity($Nomcity,$NomProv) {
        $conexion = new DB();
        $sql = "INSERT INTO localidad (idLocalidad, nombreLoc, Provincia_idProvincia1) VALUES (default, :nombreLoc, :idProvincia1)";
        $insertar = $conexion->conectar()->prepare($sql);        
        $insertar->execute(array(":nombreLoc"=>$Nomcity, ":idProvincia1"=>$NomProv));
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateCity($idCity, $Nomcity, $NomProv){
        $conexion = new DB();
        $sql = "UPDATE localidad SET nombreLoc = :nombreLoc, Provincia_idProvincia1 = :idProvincia1  WHERE idLocalidad = '$idCity'";
        $actualizar = $conexion->conectar()->prepare($sql);        
        $actualizar->execute(array(":nombreLoc"=>$Nomcity, ":idProvincia1"=>$NomProv));          
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectCity($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT * FROM localidad, provincia WHERE Provincia_idProvincia1 = idProvincia  ORDER BY nombreLoc LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->descCity[]=$filas;
        } 
        return $this->descCity;
    }
    
    public function CitySeleccionado($txtID1) {
        $conexion = new DB();
        $sql1 = "SELECT * FROM localidad, provincia WHERE Provincia_idProvincia1 = idProvincia AND idLocalidad = '$txtID1'";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        //$sentencia->bindParam(':idLoc',$txtID1);
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
    }
    
    public function SelectProv(){
        $conexion = new DB();
        $sql1 = "SELECT * FROM provincia";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->execute();
        while($filas=$sentencia->fetch(PDO::FETCH_ASSOC)){
                   $this->provincia[]=$filas;
        } 
        return $this->provincia;
    }
    
     //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM localidad ORDER BY idLocalidad";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
     /////////////////////////////////////////////////////////////////////////////
    //VALIDACIONES
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarInsert($Nomcity,$NomProv) {
        $conexion = new DB();
        $sql = "SELECT * FROM localidad, provincia WHERE Provincia_idProvincia1 = idProvincia";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['nombreLoc'] == $Nomcity && $validar['Provincia_idProvincia1'] == $NomProv){
                       return false;
                   }
        } 
        return true;
    }
    public function ValidarUpdate($idCity,$Nomcity,$NomProv) {
        $conexion = new DB();
        $sql = "SELECT * FROM localidad WHERE idLocalidad != '$idCity'";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['nombreLoc'] == $Nomcity && $validar['Provincia_idProvincia1'] == $NomProv){
                       return false;
                   }
        } 
        return true;
    }
     ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteCity($idCity) {
        $conexion = new DB();
        //Eliminar ciudad
        $sql1 = "DELETE FROM localidad WHERE idLocalidad = '$idCity'";
        $eliminar1 = $conexion->conectar()->prepare($sql1);
        $eliminar1->execute();
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchCity($cuidad) {
        $conexion = new DB();
        $sql = "SELECT * FROM localidad, provincia WHERE Provincia_idProvincia1 = idProvincia AND nombreLoc LIKE '$cuidad%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->city_arr[]=$objetoconsulta;
        }   
        return $this->city_arr;        
    }
}

?>