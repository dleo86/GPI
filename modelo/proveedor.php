<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Proveedor{
    protected $cuitProv;
    protected $RazonSocial;
    protected $idPersona;
    protected $proveedor;
    protected $datos;
    protected $Localidad;
    protected $Iva;
    protected $cuit_arr;
    protected $apel_arr;
    public $sentencia;
    ////////////////////////////////////////////////////////////////////////////
    //CONSTRUCTOR
    ////////////////////////////////////////////////////////////////////////////
    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->proveedor=array();
        $this->datos=array();
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERCIONES
    ////////////////////////////////////////////////////////////////////////////
    protected function InsertDomicilio($calle, $numDom, $piso, $dpto, $codPostal, $localidad) {
        $conexion = new DB();
        $sql = "INSERT INTO domicilio(idDomicilio, calleDom, numDom, pisoDom, dptoDom, codPostal, Localidad_idLocalidad1) VALUES (default,  :calleDom, :numDom, :pisoDom, :dptoDom, :codPostal, :idLocalidad)";
        $insertar = $conexion->conectar()->prepare($sql);
        $insertar->execute(array(":calleDom"=>$calle, ":numDom"=>$numDom,":pisoDom"=>$piso, ":dptoDom"=>$dpto,":codPostal"=>$codPostal, ":idLocalidad"=>$localidad ));       
    }
    
    protected function InsertPersona($nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers) {
        $conexion = new DB();
        $sql = "INSERT INTO persona(idPersona, nomPersona, ApelPersona, nacPersona, telPersona, emailPersona, dniPersona, Domicilio_idDomicilio1, Iva_idIva1) VALUES (default, :nomPersona, :ApelPersona, :nacPersona, :telPersona, :emailPersona, :dniPersona, (SELECT MAX(idDomicilio) FROM domicilio), :iva)";
        $insertar = $conexion->conectar()->prepare($sql);
        $insertar->execute(array(":nomPersona"=>$nomPers, ":ApelPersona"=>$apelPers,":nacPersona"=>$nacPers, ":telPersona"=>$telPers,":emailPersona"=>$emailPers, ":dniPersona"=>$dniPers,":iva"=>$ivaPers ));
    }
    protected function InsertProveedor($idprov,$cuitProv,$RazonSocial) {
        $conexion = new DB();
        $sql = "INSERT INTO proveedor(idProveedor, cuitProv, RazonSocial, Persona_idPersona) VALUES (default, :cuitProv, :RazonSocial,(SELECT MAX(idPersona) FROM persona))";
        $insertar = $conexion->conectar()->prepare($sql);
        $insertar->execute(array(":cuitProv"=>$cuitProv, ":RazonSocial"=>$RazonSocial));
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZACIONES
    ////////////////////////////////////////////////////////////////////////////
    
    public function UpdateDomicilio($idDom,$calle, $numDom, $piso, $dpto, $codPostal, $localidad) {
        $conexion = new DB();        
        $sql = "UPDATE domicilio "
                . "SET calleDom  = :calle, numDom = :numDom, pisoDom = :piso, dptoDom = :dpto, codPostal = :codPostal, Localidad_idLocalidad1 = :loc WHERE idDomicilio = '$idDom'";
        $actualizar = $conexion->conectar()->prepare($sql);
        $actualizar->execute(array(":calle"=>$calle, ":numDom"=>$numDom, ":piso"=>$piso, ":dpto"=>$dpto, ":codPostal"=>$codPostal, ":loc"=>$localidad));
    }   
    
    public function UpdatePersona($idPers,$nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers) {
        $conexion = new DB();
        $sql = "UPDATE persona "
                . "SET nomPersona  = :nomPers, ApelPersona = :apelPers, nacPersona = :nacPers, telPersona = :telPers, emailPersona = :emailPers, dniPersona = :dniPers, Iva_idIva1 = :iva WHERE idPersona = '$idPers'";
        $actualizar2 = $conexion->conectar()->prepare($sql);
        $actualizar2->execute(array(":nomPers"=>$nomPers, ":apelPers"=>$apelPers, ":nacPers"=>$nacPers, ":telPers"=>$telPers, ":emailPers"=>$emailPers, ":dniPers"=>$dniPers, ":iva"=>$ivaPers));
    }
    
    public function UpdateProveedor($idprov,$cuitProv,$RazonSocial) {
        $conexion = new DB();
        $sql = "UPDATE proveedor "
                . "SET cuitProv  = :cuitProv, RazonSocial = :RazonSocial WHERE idProveedor = '$idprov'";
        $actualizar3 = $conexion->conectar()->prepare($sql);
        $actualizar3->execute(array(":cuitProv"=>$cuitProv, ":RazonSocial"=>$RazonSocial));
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectProveedor($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT * FROM proveedor, persona, domicilio WHERE Persona_idPersona = idPersona AND Domicilio_idDomicilio1 = idDomicilio ORDER BY idProveedor DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->proveedor[]=$filas;
        } 
        return $this->proveedor;
    }
    
    public function SelectLoc(){
        $conexion = new DB();
        $sql1 = "SELECT * FROM localidad";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->execute();
        while($filas=$sentencia->fetch(PDO::FETCH_ASSOC)){
                   $this->Localidad[]=$filas;
        } 
        return $this->Localidad;
    }
    public function SelectIva(){
        $conexion = new DB();
        $sql1 = "SELECT * FROM iva";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->execute();
        while($filas=$sentencia->fetch(PDO::FETCH_ASSOC)){
                   $this->Iva[]=$filas;
        } 
        return $this->Iva;
    }
    
    public function ProvSeleccionado($idProv) {
        $conexion = new DB();
        //$sql1 = "SELECT idProveedor, cuitProv, RazonSocial, Persona_idPersona, idPersona, nomPersona, ApelPersona FROM proveedor, persona WHERE Persona_idPersona = idPersona AND idProveedor = :idProveedor";
        $sql1 = "SELECT * FROM proveedor, persona, domicilio, localidad, iva "
                . "WHERE Persona_idPersona = idPersona AND idProveedor = '$idProv' AND Domicilio_idDomicilio1 = idDomicilio AND Localidad_idLocalidad1 = idLocalidad AND Iva_idIva1 = idIva";
        //$sql1 = "SELECT * FROM proveedor WHERE idProveedor = '$IDprov1'";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        //$sentencia->bindParam(':idProveedor',$IDprov1);
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
    }
    //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM proveedor";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
    /////////////////////////////////////////////////////////////////////////////
    //VALIDACIONES
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarProveedor($cuit) {
        $conexion = new DB();
        $sql = "SELECT * FROM proveedor";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['cuitProv'] == $cuit){
                       return false;
                   }
        } 
        return true;
    }
    public function ValidarProveedor2($idprov,$cuit) {
        $conexion = new DB();
        $sql = "SELECT * FROM proveedor WHERE idProveedor != '$idprov'";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['idProveedor'] == $idprov || $validar['cuitProv'] == $cuit){
                       return false;
                   }
        } 
        return true;
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteProveedor($idprov,$idPers,$idDom) {
        $conexion = new DB();
        //Eliminar domicilio
        $sql1 = "DELETE FROM proveedor WHERE idProveedor = '$idprov'";
        $eliminar1 = $conexion->conectar()->prepare($sql1);
        $eliminar1->execute();
        //Eliminar persona
        $sql2 = "DELETE FROM persona WHERE idPersona = '$idPers'";
        $eliminar2 = $conexion->conectar()->prepare($sql2);
        $eliminar2->execute();
        //Eliminar proveedor
        $sql3 = "DELETE FROM domicilio WHERE idDomicilio = '$idDom'";
        $eliminar3 = $conexion->conectar()->prepare($sql3);
        $eliminar3->execute();
        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSQUEDAS
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchCuit($cuit) {
        $conexion = new DB();
        $sql = "SELECT * FROM proveedor, persona WHERE Persona_idPersona = idPersona AND cuitProv LIKE '%$cuit%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->cuit_arr[]=$objetoconsulta;
        }   
        return $this->cuit_arr;        
    }
    protected function SearchApel($apellido) {
        $conexion = new DB();
        $sql = "SELECT * FROM proveedor, persona WHERE Persona_idPersona = idPersona AND ApelPersona LIKE '%$apellido%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->apel_arr[]=$objetoconsulta;
        }   
        return $this->apel_arr;
    }
}

?>