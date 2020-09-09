<?php


$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Cliente{
    protected $idPersona;
    protected $cliente;
    protected $datos;
    protected $nomCli;
    protected $Localidad;
    protected $Iva;
    public $sentencia;
    protected $cli_arr;
    protected $apel_arr;
    ////////////////////////////////////////////////////////////////////////////
    //CONSTRUCTOR
    ////////////////////////////////////////////////////////////////////////////
    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->cliente=array();
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
    protected function InsertCliente() {
        $conexion = new DB();
        $sql = "INSERT INTO cliente ( idCliente, Persona_idPersona) VALUES (default, (SELECT MAX(idPersona) FROM persona))";
        $insertar = $conexion->conectar()->prepare($sql);      
        $insertar->execute();
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
    
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectCliente($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT * FROM cliente, persona, domicilio WHERE Persona_idPersona = idPersona AND Domicilio_idDomicilio1 = idDomicilio ORDER BY idCliente DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->cliente[]=$filas;
        } 
        return $this->cliente;
    }
    
    public function CliSeleccionado($cliID1) {
        $conexion = new DB();
        $sql1 = "SELECT * FROM cliente, persona, domicilio, localidad, iva "
                . "WHERE Persona_idPersona = idPersona AND idCliente = '$cliID1' AND Domicilio_idDomicilio1 = idDomicilio AND Localidad_idLocalidad1 = idLocalidad AND Iva_idIva1 = idIva";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        $sentencia->execute();
        $fila=$sentencia->fetch(PDO::FETCH_LAZY);
        return $fila;
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
    //PAGINACION
    public function Paginacion(){
        $conexion = new DB();
        $sql = "SELECT * FROM cliente";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarCliente($dniPers) {
        $conexion = new DB();
        $sql = "SELECT * FROM persona";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['dniPersona'] == $dniPers){
                       return false;
                   }
        } 
        return true;
    }
    
    public function ValidarCliente2($idPers,$dniPers) {
        $conexion = new DB();
        $sql = "SELECT * FROM persona WHERE idPersona != '$idPers'";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['idPersona'] == $idPers || $validar['dniPersona'] == $dniPers){
                       return false;
                   }
        } 
        return true;
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteCliente($idcli,$idPers,$idDom) {
        $conexion = new DB();
        //Eliminar domicilio
        $sql1 = "DELETE FROM cliente WHERE idCliente = '$idcli'";
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
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    protected function SearchApel($apellido) {
        $conexion = new DB();
        $sql = "SELECT * FROM cliente, persona WHERE Persona_idPersona = idPersona AND ApelPersona LIKE '%$apellido%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->apel_arr[]=$objetoconsulta;
        }   
        return $this->apel_arr;
    }
    protected function SearchDni($dni) {
        $conexion = new DB();
        $sql = "SELECT * FROM cliente, persona WHERE Persona_idPersona = idPersona AND dniPersona LIKE '%$dni%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->cli_arr[]=$objetoconsulta;
        }   
        return $this->cli_arr;        
    }
}

?>