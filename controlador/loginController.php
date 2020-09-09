<?php
require_once ('modelo/login.php');

session_start();

$log = new Login();
$usuario = (isset($_POST['Usuario']))?$_POST['Usuario']:'';
$pass = (isset($_POST['Password']))?$_POST['Password']:'';
$_SESSION['Mensaje'] = '';
class loginController extends Login{
    public $matrizLogin;
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($log) {
        require_once ('vista/usuario/select_login.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarLoginController($log) {
        $login = (isset($_POST['Usuario']))?$_POST['Usuario']:'';
        $password = (isset($_POST['Password']))?$_POST['Password']:'';
        $login = htmlentities(addslashes($login));
        $password = htmlentities(addslashes($password));
        $matrizLogin = $log->validarLogin($login,$password);
        return $matrizLogin;
    }
}
$controlador = new loginController();

if (isset($_SESSION['userName'])){
	header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
        if ($controlador->ValidarLoginController($log)){
            $_SESSION['userName'] = $usuario;     
            $_SESSION['userPass'] = $pass;
            header('Location: index.php');
        }else{
            $_SESSION['Mensaje'] = 'Error';
        }   
}
$controlador->SelectView($log);

?>
