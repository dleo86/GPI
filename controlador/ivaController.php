<?php

require_once ('modelo/iva.php');

$iva = new Iva();


class ivaController extends Iva{
    public $instanciacontrolador;
    public $matrizIva;
    public $mostrarModal;
    public $filaIva = '';
   
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($iva,$pagina) {
       /////////////////////////////////////////////////////////////////////////
       //PAGINACIÓN
       /////////////////////////////////////////////////////////////////////////
       $tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$tamanho_paginas;
       $num_filas = $iva->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas); 
       /////////////////////////////////////////////////////////////////////////
       $matrizIva = $iva->SelectIva($empezar_desde,$tamanho_paginas); 
       $txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaIva=$iva->IvaSeleccionado($txtID1);
            //var_dump($filaArticulo);
         }
       require ('vista/persona/select_iva.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertIvaController($iva){
        //Datos Iva
        $idIva = '';
        $TipoIva = (isset($_POST['tipoIva']))?$_POST['tipoIva']:'';
        
        $Insertar1 = $iva->InsertIva($TipoIva);            
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateIvaController($iva){
        //Datos Iva
        $idIva = (isset($_POST['IDiva1']))?$_POST['IDiva1']:'';
        $TipoIva = (isset($_POST['tipoIva1']))?$_POST['tipoIva1']:'';
        
        $Actualizar1 = $iva->UpdateIva($idIva, $TipoIva);            
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteIvaController($iva) {
        $idiva = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $Borrar = $iva->DeleteIva($idiva);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    public function SearchBycodArt($codArt) {
        //$this->nombre;
        echo 'probando';
        //COMPLETAR
        //$this->InsertUsuario();
    }
    public function SearchBynomArt($nomArt) {
        //$this->nombre;
        echo 'probando';
    }
    
}

    $controlador = new ivaController();
    $error = array();
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_iva.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    if (isset($_POST['btnAgregar'])){       
        $controlador->InsertIvaController($iva);   
   }
   if (isset($_POST['btnModificar'])){
            $controlador->UpdateIvaController($iva);      
    } 
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteIvaController($iva);
    }
    $controlador->SelectView($iva,$pagina);

?>
