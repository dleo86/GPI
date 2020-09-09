<?php

require_once ('modelo/caja.php');

$caja = new Caja();


class cajaController extends Caja{
    public $instanciacontrolador;
    public $matrizCaja;
    public $mostrarModal;
    public $filaCaja;
    
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
   public function SelectView($caja,$pagina) {
       /////////////////////////////////////////////////////////////////////////
       //PAGINACIÓN
       /////////////////////////////////////////////////////////////////////////
       $tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$tamanho_paginas;
       $num_filas = $caja->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas); 
       /////////////////////////////////////////////////////////////////////////
       $matrizCaja = $caja->SelectCaja($empezar_desde, $tamanho_paginas); 
       $txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaCaja=$caja->CajaSeleccionado($txtID1);
         }
       require_once ('vista/venta/select_caja.php');
    }
     ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertCajaController($caja) {
        //Datos Caja
        $idCaja = '';
        $totalCaja = (isset($_POST['total']))?$_POST['total']:'';
        $subtotalCaja = (isset($_POST['subtotal']))?$_POST['subtotal']:'';
               
        $Insertar1 = $caja->InsertCaja($totalCaja, $subtotalCaja);
       
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateCajaController($caja) {
        //Datos Caja
        $idCaja = (isset($_POST['IDcaja1']))?$_POST['IDcaja1']:'';;
        $totalCaja = (isset($_POST['total1']))?$_POST['total1']:'';
        $subtotalCaja = (isset($_POST['subtotal1']))?$_POST['subtotal1']:'';
               
        $Actualizar1 = $caja->UpdateCaja($idCaja, $totalCaja, $subtotalCaja);      
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteCajaController($caja) {
        $idcaja = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $Borrar = $caja->DeleteCaja($idcaja);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    public function SearchFechaController($caja) {
        $tamanho_paginas= 5;
        $num_filas = $caja->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $fecha = (isset($_POST['BuscarFecha']))?$_POST['BuscarFecha']:'';
        if (!empty($fecha)){
            $matrizCaja = $caja->SearchFecha($fecha);
            if (isset($matrizCaja)){
                require_once('vista/venta/select_caja.php');              
            } else{
                echo 'No se ha encontrado ninguna caja con esa fecha';
            }
        } 
    }
    
}

    $controlador = new cajaController();
    $error = array();
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_caja.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    if (isset($_POST['btnAgregar'])){
        $controlador->InsertCajaController($caja);        
   }
    if (isset($_POST['btnModificar'])){
            $controlador->UpdateCajaController($caja);      
    }
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteCajaController($caja);
    }
     if(isset($_POST['btnBuscar1'])){           
           $controlador->SearchFechaController($caja);
    }
    $controlador->SelectView($caja,$pagina);    
?>
