<?php
        

class Login{   
        
        public function __construct() {   
            require_once 'db.php';
        }
        ////////////////////////////////////////////////////////////////////////
        //VALIDAR
        ////////////////////////////////////////////////////////////////////////
        protected function validarLogin($login,$password) {
             $conexion = new DB();
             $sql = "SELECT * FROM usuario";
             $resultado = $conexion->conectar()->prepare($sql); 
             $salida = false;
             $resultado->execute();          
             while($validar=$resultado->fetch(PDO::FETCH_ASSOC)){
                   if($validar['userName'] == $login && password_verify($password, $validar['userPass'])){
                       $_SESSION['userPriv'] = $validar['userPriv'];
                       $salida = true;
                   }           
             }
             return $salida;
        }           
}
   
?>