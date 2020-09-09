<?php
$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Usuario{
    protected $nombre;
    protected $password;
    protected $email;
    protected $cuitProv;
    protected $RazonSocial;
    protected $idPersona;
    protected $usuario;
    protected $datos;
    protected $Localidad;
    protected $Iva;
    protected $apel_arr;
    protected $us_arr;
    public $sentencia;

    public function __construct() {   
        //$conexion = new DB();
        require_once 'db.php';
        $this->usuario=array();
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
    
    protected function InsertUsuario($userName,$userPass,$userPriv) {
        $conexion = new DB();
        $pass_cifrado= password_hash($userPass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuario(idUsuario, userName, userPass, userPriv, userIngreso, Persona_idPersona1) VALUES (default, :userName, :userPass, :userPriv, now(),(SELECT MAX(idPersona) FROM persona))";
        $insertar = $conexion->conectar()->prepare($sql);
        $insertar->execute(array(":userName"=>$userName, ":userPass"=>$pass_cifrado, ":userPriv"=>$userPriv));
    }
    /////////////////////////////////////////////////////////////////////////////
    //VALIDACIONES
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarUsuario($userName,$userPass) {
        $conexion = new DB();
        $sql = "SELECT * FROM usuario";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if((strcmp(trim($validar['userName']),$userName) === 0) || password_verify($userPass, $validar['userPass'])){   
                       return false;
                   }
        }
        return true;
    }
    public function ValidarUsuario2($iduser,$userName,$userPass) {
        $conexion = new DB();
        $sql = "SELECT * FROM usuario WHERE idUsuario != '$iduser'";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($validar=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   if($validar['idUsuario'] != $iduser && ((strcmp(trim($validar['userName']),$userName) === 0) || password_verify($userPass, $validar['userPass']))){
                       return false;
                   }
        } 
        return true;
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
    
    public function UpdateUsuario($iduser,$userName,$userPass,$userPriv) {
        $conexion = new DB();
        $pass_cifrado= password_hash($userPass, PASSWORD_DEFAULT);
        $sql = "UPDATE usuario "
                . "SET userName  = :userName, userPass = :userPass, userPriv = :userPriv WHERE idUsuario = '$iduser'";
        $actualizar3 = $conexion->conectar()->prepare($sql);
        $actualizar3->execute(array(":userName"=>$userName, ":userPass"=>$pass_cifrado,":userPriv"=>$userPriv ));
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectUsuario($empezar_desde, $tamanho_paginas) {
        $conexion = new DB();
        $sql = "SELECT * FROM usuario, persona, domicilio WHERE Persona_idPersona1 = idPersona AND Domicilio_idDomicilio1 = idDomicilio ORDER BY idUsuario DESC LIMIT $empezar_desde, $tamanho_paginas";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->usuario[]=$filas;
        } 
        return $this->usuario;
    }
    
    public function UsSeleccionado($txtID1) {
        $conexion = new DB();
        $sql1 = "SELECT * FROM usuario, persona, domicilio, localidad, iva "
                . "WHERE Persona_idPersona1 = idPersona AND idUsuario = '$txtID1' AND Domicilio_idDomicilio1 = idDomicilio AND Localidad_idLocalidad1 = idLocalidad AND Iva_idIva1 = idIva";
        $sentencia = $conexion->conectar()->prepare($sql1); 
        //$sentencia->bindParam(':idUsuario',$txtID1);
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
        $sql = "SELECT * FROM usuario";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute(array());
        return $seleccionar->rowCount();
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteUsuario($iduser,$idPers,$idDom) {
        $conexion = new DB();
        //Eliminar domicilio
        $sql1 = "DELETE FROM usuario WHERE idUsuario = '$iduser'";
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
    protected function SearchUser($user1) {
        $conexion = new DB();
        $sql = "SELECT * FROM usuario, persona WHERE Persona_idPersona1 = idPersona AND userName LIKE '%$user1%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->us_arr[]=$objetoconsulta;
        }   
        return $this->us_arr;        
    }
    protected function SearchApel($apellido) {
        $conexion = new DB();
        $sql = "SELECT * FROM usuario, persona WHERE Persona_idPersona1 = idPersona AND ApelPersona LIKE '%$apellido%'";
        $consulta = $conexion->conectar()->prepare($sql);
        $consulta->execute();
         while($objetoconsulta=$consulta->fetch(PDO::FETCH_ASSOC)){
                   $this->apel_arr[]=$objetoconsulta;
        }   
        return $this->apel_arr;
    }
}

?>
