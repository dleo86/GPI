<?php

//session_start();
if(!isset($_SESSION['userName'])){
     header('Location: login.php');
}
require_once ('modelo/tipo_articulo.php');


$tipo_art = new TipoArticulo();


class tipoArtController extends TipoArticulo{
    public $instanciacontrolador;
    public $matrizTipoArt;
    public $mostrarModal;
    public $filaTipoArt;
    public $total_paginas;
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($tipo_art,$pagina) {
    ////////////////////////////////////////////////////////////////////////////
    //PAGINACIÓN
    ////////////////////////////////////////////////////////////////////////////
       $tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$tamanho_paginas;
       $num_filas = $tipo_art->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas);       
       $matrizTipoArt = $tipo_art->SelectTipoArt($empezar_desde, $tamanho_paginas); 
       $txtID1 = (isset($_POST['idTipo']))?$_POST['idTipo']:'';//Cambio de ultimo momento
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaTipoArt=$tipo_art->TipoSeleccionado($txtID1);
         }
       require_once ('vista/articulo/select_rubro.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarInsert($tipo_art) {
        $tipoArt = (isset($_POST['tipoArt']))?$_POST['tipoArt']:'';
        $valido = $tipo_art->ValidarTipoArt($tipoArt);
        return $valido;
    }
    
    public function ValidarModificar($tipo_art) {
        $idTipoArt = (isset($_POST['ArtID1']))?$_POST['ArtID1']:'';
        $descripArt = (isset($_POST['descripArt1']))?$_POST['descripArt1']:'';
        $tipoArt = (isset($_POST['tipoArt1']))?$_POST['tipoArt1']:'';
        $valido = $tipo_art->ValidarUpdate($idTipoArt, $descripArt,$tipoArt);
        return $valido;
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertArt($tipo_art) {
        $idTipoArt = (isset($_POST['idTipoArt']))?$_POST['idTipoArt']:'';
        $descripArt = (isset($_POST['descripArt']))?$_POST['descripArt']:'';
        $tipoArt = (isset($_POST['tipoArt']))?$_POST['tipoArt']:'';
       
        $Insertar = $tipo_art->InsertTipoArt($idTipoArt,$descripArt, $tipoArt);       
    }    
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////   
    public function UpdateTipoArt($tipo_art) {
        $idTipoArt = (isset($_POST['ArtID1']))?$_POST['ArtID1']:'';
        $descripArt = (isset($_POST['descripArt1']))?$_POST['descripArt1']:'';
        $tipoArt = (isset($_POST['tipoArt1']))?$_POST['tipoArt1']:'';
        $Actualizar = $tipo_art->UpdateTipoArticulo($idTipoArt, $descripArt,$tipoArt);       
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteTipoArt($tipo_art) {
        $idTipoArt = (isset($_POST['idTipo']))?$_POST['idTipo']:'';
        $Borrar = $tipo_art->DeleteTipoArticulo($idTipoArt);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    public function SearchByTipo($tipo_art) {
       $tamanho_paginas= 5;
       $num_filas = $tipo_art->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas);
        $tipoArt = (isset($_POST['buscarTipo']))?$_POST['buscarTipo']:'';
        if (!empty($tipoArt)){
            $matrizTipoArt = $tipo_art->SearchArticuloByTipo($tipoArt);
            if (isset($matrizTipoArt)){
                require_once('vista/articulo/select_rubro.php');                
            }else{
                echo 'No se ha encontrado el rubro';
            }
            
        }
    }
    
}

    $controlador = new tipoArtController();
    $error = array();
    $_SESSION['Mensaje'] = '';
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_rubro.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    if (isset($_POST['btnAgregar'])){
        if ($controlador->ValidarInsert($tipo_art)){
            $controlador->InsertArt($tipo_art);
        }else{
           $_SESSION['Mensaje'] = 'Código invalido';
        }   
   }
   
   if (isset($_POST['btnModificar'])){
        if ($controlador->ValidarModificar($tipo_art)){
            $controlador->UpdateTipoArt($tipo_art);
        }else{
            $_SESSION['Mensaje'] = 'Código invalido';
        }
    }
    
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteTipoArt($tipo_art);
    }
    
    if(isset($_POST['btnBuscar'])){           
           $controlador->SearchByTipo($tipo_art);
    }
    $controlador->SelectView($tipo_art,$pagina);

?>
