<?php
require 'modelo/registro.php';

$registro = new Registro();

class registroController extends Registro{
    public $instanciacontrolador;
    public $matrizUsuario;
    public $mostrarModal;
    public $filaUsuario;
    public $filaLoc;
    public $filaIva;
   
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($registro) {
       $matrizUsuario = $registro->SelectUsuario(); 
       $filaLoc = $registro->SelectLoc();
       $filaIva = $registro->SelectIva();
       $txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       
       require_once ('vista/usuario/register_user.php');
    }  
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarInsert($registro) {
        $userName = (isset($_POST['usuario']))?$_POST['usuario']:'';
        $userName = trim($userName);
        $userPass = (isset($_POST['pass']))?$_POST['pass']:'';
        $valido = $registro->ValidarUsuario($userName,$userPass);
        return $valido;
    }
   
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertUser($registro) {
        //Datos Proveedor
        $iduser = '';
        $userName = (isset($_POST['usuario']))?$_POST['usuario']:'';
        $userPass = (isset($_POST['pass']))?$_POST['pass']:'';
        $userPriv = (isset($_POST['priv']))?$_POST['priv']:'Usuario';
        //Datos Persona
        $nomPers = (isset($_POST['nomPersona']))?$_POST['nomPersona']:'';
        $apelPers = (isset($_POST['apelPersona']))?$_POST['apelPersona']:'';
        $nacPers = (isset($_POST['nac']))?$_POST['nac']:'';
        $telPers = (isset($_POST['tel']))?$_POST['tel']:'';
        $emailPers = (isset($_POST['email']))?$_POST['email']:'';
        $dniPers = (isset($_POST['dni']))?$_POST['dni']:'';
        $ivaPers = (isset($_POST['iva']))?$_POST['iva']:'';
        //Datos Domicilio
        $calle = (isset($_POST['dir']))?$_POST['dir']:'';
        $numDom = (isset($_POST['nro']))?$_POST['nro']:'';
        $piso = (isset($_POST['piso']))?$_POST['piso']:'';
        $dpto = (isset($_POST['dpto']))?$_POST['dpto']:'';
        $codPostal = (isset($_POST['postal']))?$_POST['postal']:'';
        //Datos Localidad y Provincia
        $localidad = (isset($_POST['loc']))?$_POST['loc']:'';
        
        $Insertar1 = $registro->InsertDomicilio($calle, $numDom, $piso, $dpto, $codPostal, $localidad);
       
        $Insertar2 = $registro->InsertPersona($nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers);        
       
        $Insertar3 = $registro->InsertUsuario($userName,$userPass,$userPriv);   
        
    }

}

    $controlador = new registroController();
    $error = array();
    $_SESSION['Mensaje'] = '';
    
    if (isset($_POST['btnRegistrar'])){
        if ($controlador->ValidarInsert($registro)){
            $controlador->InsertUser($registro);
            $_SESSION['Exito'] = 'Usuario registrado';
            header("refresh:3; url= menu_login.php");
        }else{
           $_SESSION['Mensaje'] = 'No fue registrado: El usuario o contraseña ya existen';
        }   
    }
    
    $controlador->SelectView($registro);

?>