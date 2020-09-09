<?php
require 'modelo/usuario.php';

$user = new Usuario();

class usuarioController extends Usuario{
    public $instanciacontrolador;
    public $matrizUsuario;
    public $mostrarModal;
    public $filaUsuario;
    public $filaLoc;
    public $filaIva;
   
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($user,$pagina) {
       /////////////////////////////////////////////////////////////////////////
       //PAGINACIÓN
       /////////////////////////////////////////////////////////////////////////
       $tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$tamanho_paginas;
       $num_filas = $user->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas); 
       /////////////////////////////////////////////////////////////////////////
       $matrizUsuario = $user->SelectUsuario($empezar_desde, $tamanho_paginas); 
       $filaLoc = $user->SelectLoc();
       $filaIva = $user->SelectIva();
       $txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaUsuario=$user->UsSeleccionado($txtID1);
       }
       require_once ('vista/usuario/select_usuario.php');
    }  
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarInsert($user) {
        $userName = (isset($_POST['usuario']))?$_POST['usuario']:'';
        $userName = trim($userName);
        $userPass = (isset($_POST['pass']))?$_POST['pass']:'';
        $valido = $user->ValidarUsuario($userName,$userPass);
        return $valido;
    }
    
    public function ValidarUpdate($user) {
        $userName = (isset($_POST['usuario1']))?$_POST['usuario1']:'';
        $userPass = (isset($_POST['pass1']))?$_POST['pass1']:'';
        $iduser = (isset($_POST['IDusuario1']))?$_POST['IDusuario1']:'';;
        $valido = $user->ValidarUsuario2($iduser,$userName,$userPass);
        return $valido;
    }
   
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertUser($user) {
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
        
        $Insertar1 = $user->InsertDomicilio($calle, $numDom, $piso, $dpto, $codPostal, $localidad);
       
        $Insertar2 = $user->InsertPersona($nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers);        
       
        $Insertar3 = $user->InsertUsuario($userName,$userPass,$userPriv);   
        
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateUser($user) {
        //Datos Proveedor
        $iduser = (isset($_POST['IDusuario1']))?$_POST['IDusuario1']:'';;
        $userName = (isset($_POST['usuario1']))?$_POST['usuario1']:'';
        $userPass = (isset($_POST['pass1']))?$_POST['pass1']:'';
        $userPriv = (isset($_POST['priv1']))?$_POST['priv1']:'';
        //Datos Persona
        $idPers = (isset($_POST['IDpers1']))?$_POST['IDpers1']:'';
        $nomPers = (isset($_POST['nomPersona1']))?$_POST['nomPersona1']:'';
        $apelPers = (isset($_POST['apelPersona1']))?$_POST['apelPersona1']:'';
        $nacPers = (isset($_POST['nac1']))?$_POST['nac1']:'';
        $telPers = (isset($_POST['tel1']))?$_POST['tel1']:'';
        $emailPers = (isset($_POST['email1']))?$_POST['email1']:'';
        $dniPers = (isset($_POST['dni1']))?$_POST['dni1']:'';
        $ivaPers = (isset($_POST['iva1']))?$_POST['iva1']:'';
        //Datos Domicilio
        $idDom = (isset($_POST['IDdom1']))?$_POST['IDdom1']:'';
        $calle = (isset($_POST['dir1']))?$_POST['dir1']:'';
        $numDom = (isset($_POST['nro1']))?$_POST['nro1']:'';
        $piso = (isset($_POST['piso1']))?$_POST['piso1']:'';
        $dpto = (isset($_POST['dpto1']))?$_POST['dpto1']:'';
        $codPostal = (isset($_POST['postal1']))?$_POST['postal1']:'';
        //Datos Localidad y Provincia
        $localidad = (isset($_POST['loc1']))?$_POST['loc1']:'';
        
        $Actualizar1 = $user->UpdateDomicilio($idDom, $calle, $numDom, $piso, $dpto, $codPostal, $localidad);
       
        $Actualizar2 = $user->UpdatePersona($idPers, $nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers);        
       
        $Actualizar3 = $user->UpdateUsuario($iduser,$userName,$userPass,$userPriv);   
        
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteUserController($user) {
        $iduser = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $idPers = (isset($_POST['idPers']))?$_POST['idPers']:'';
        $idDom = (isset($_POST['idDom']))?$_POST['idDom']:'';
        $Borrar = $user->DeleteUsuario($iduser,$idPers,$idDom);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
     public function SearchUserController($user) {
        $tamanho_paginas= 5;
        $num_filas = $user->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $user1 = (isset($_POST['buscarUser']))?$_POST['buscarUser']:'';
        if (!empty($user1)){
            $matrizUsuario = $user->SearchUser($user1);
            if (isset($matrizUsuario)){
                require_once('vista/usuario/select_usuario.php');              
            } else{
                echo 'No se ha encontrado el usuario';
            }
        } 
    }
    public function SearchApelController($user) {
        $tamanho_paginas= 5;
        $num_filas = $user->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $apellido = (isset($_POST['buscarApel']))?$_POST['buscarApel']:'';
        if (!empty($apellido)){
            $matrizUsuario = $user->SearchApel($apellido);
            if (isset($matrizUsuario)){
                require_once('vista/usuario/select_usuario.php');              
            } else{
                echo 'No se ha encontrado el apellido';
            }
        } 
    }
}

    $controlador = new usuarioController();
    $error = array();
    $_SESSION['Mensaje'] = '';
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_usuario.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    if (isset($_POST['btnAgregar'])){
        if ($controlador->ValidarInsert($user)){
            $controlador->InsertUser($user);
        }else{
           $_SESSION['Mensaje'] = 'Código invalido';
        }   
    }
    if (isset($_POST['btnModificar'])){
        if ($controlador->ValidarUpdate($user)){
            $controlador->UpdateUser($user);
        }else{
           $_SESSION['Mensaje'] = 'Código invalido';
        }
    }
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteUserController($user);
    }
    if(isset($_POST['btnBuscar1'])){           
           $controlador->SearchUserController($user);
    }
    if(isset($_POST['btnBuscar2'])){           
           $controlador->SearchApelController($user);
    }
    $controlador->SelectView($user,$pagina);

?>