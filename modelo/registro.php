<?php
$txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
$accion = (isset($_POST['accion']))?$_POST['accion']:'';
$error = array();

class Registro{
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
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONES
    ////////////////////////////////////////////////////////////////////////////
    public function SelectUsuario() {
        $conexion = new DB();
        $sql = "SELECT * FROM usuario, persona, domicilio WHERE Persona_idPersona1 = idPersona AND Domicilio_idDomicilio1 = idDomicilio ORDER BY idUsuario DESC";
        $seleccionar = $conexion->conectar()->prepare($sql);
        $seleccionar->execute();
        while($filas=$seleccionar->fetch(PDO::FETCH_ASSOC)){
                   $this->usuario[]=$filas;
        } 
        return $this->usuario;
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

}

?>
