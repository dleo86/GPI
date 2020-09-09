<?php


$start = new StarterController();
class StarterController{
    
    public function __construct() {
        session_start();
    }
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView() {
        
        require_once ('vista/usuario/select_inicio.php');
    }
    
   /* public function redirect() {
        header("location: usuarioController.php?action=login");
    }*/
}

if (isset($_SESSION['userName'])){
    if (isset($_POST['articulos'])){
            require_once ('controlador/articuloController.php');
        }
        $start->SelectView();
}else{
       header('Location: menu_login.php');
}	      
?>



