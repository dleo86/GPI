<?php

require_once ('modelo/venta.php');

$sell = new Venta();

class ventaController extends Venta{
    public $instanciacontrolador;
    public $matrizVenta;
    public $mostrarModal;
    public $filaVenta;
    public $filaUsuario;
    public $filaCaja;
    public $filaProducto;
    
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($sell,$pagina) {
    ////////////////////////////////////////////////////////////////////////////
    //PAGINACIÓN
    ////////////////////////////////////////////////////////////////////////////
       $this->tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$this->tamanho_paginas;
       $tamanho_paginas = $this->tamanho_paginas;
       $num_filas = $sell->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas); 
       /////////////////////////////////////////////////////////////////////////
       $matrizVenta = $sell->SelectVenta($empezar_desde, $tamanho_paginas); 
       $filaUsuario = $sell->SelectUser();
       $filaCaja = $sell->SelectCaja();
       $filaProducto = $sell->SelectProducto();
       $txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaVenta=$sell->VentaSeleccionado($txtID1);
         }
       require ('vista/venta/select_venta.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarInsert($sell) {
        $userName = (isset($_POST['usuario']))?$_POST['usuario']:'';
        $userPass = (isset($_POST['pass']))?$_POST['pass']:'';
        $valido = $sell->ValidarVenta($userName,$userPass);
        return $valido;
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertVentaController($sell) {
        //Datos Venta
        $idVenta = '';
        $fechaVenta = (isset($_POST['fechaVenta']))?$_POST['fechaVenta']:'';
        $tipoVenta = (isset($_POST['tipoVenta']))?$_POST['tipoVenta']:'';
        $descVenta = (isset($_POST['descVenta']))?$_POST['descVenta']:'';
        $producVenta = (isset($_POST['producVenta']))?$_POST['producVenta']:'';
        $medioPago = (isset($_POST['medioPago']))?$_POST['medioPago']:'';
        $totalVenta = (isset($_POST['totalVenta']))?$_POST['totalVenta']:'';
        //Datos usuario
        $idUsuario = (isset($_POST['idUsuario']))?$_POST['idUsuario']:'';
        
        $Insertar1 = $sell->InsertVenta($tipoVenta, $descVenta, $producVenta, $medioPago, $totalVenta,$idUsuario);
               
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateVentaController($sell) {
        //Datos Venta
        $idVenta = (isset($_POST['idVenta1']))?$_POST['idVenta1']:'';;
        $fechaVenta = (isset($_POST['fechaVenta1']))?$_POST['fechaVenta1']:'';
        $tipoVenta = (isset($_POST['tipoVenta1']))?$_POST['tipoVenta1']:'';
        $descVenta = (isset($_POST['descVenta1']))?$_POST['descVenta1']:'';
        $producVenta = (isset($_POST['producVenta1']))?$_POST['producVenta1']:'';
        $medioPago = (isset($_POST['medioPago1']))?$_POST['medioPago1']:'';
        $totalVenta = (isset($_POST['totalVenta1']))?$_POST['totalVenta1']:'';
        //Datos usuario
        $idUsuario = (isset($_POST['idUsuario1']))?$_POST['idUsuario1']:'';
               
        $Actualizar1 = $sell->UpdateVenta($idVenta, $fechaVenta, $tipoVenta, $descVenta, $producVenta, $medioPago, $totalVenta, $idUsuario);
             
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteVentaController($sell) {
        $idventa = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $Borrar = $sell->DeleteVenta($idventa);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
   public function SearchFechaController($sell) {
       $tamanho_paginas= 5;
       $num_filas = $sell->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas);
        $fecha = (isset($_POST['BuscarFecha']))?$_POST['BuscarFecha']:'';
        if (!empty($fecha)){
            $matrizVenta = $sell->SearchFecha($fecha);
            if (isset($matrizVenta)){
                require_once('vista/venta/select_venta.php');              
            } else{
                echo 'No se ha encontrado ninguna venta con esa fecha';
            }
        } 
    }
    
    public function SearchCajaController($sell) {
        $tamanho_paginas= 5;
        $num_filas = $sell->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $caja = (isset($_POST['BuscarCaja']))?$_POST['BuscarCaja']:'';
        if (!empty($caja)){
            $matrizVenta = $sell->SearchCaja($caja);
            if (isset($matrizVenta)){
                require_once('vista/venta/select_venta.php');              
            } else{
                echo 'No se ha encontrado la caja';
            }
        } 
    }
    
}

    $controlador = new ventaController();
    $error = array();
    //Paginacion
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_venta.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    ////////////////////////////////////////////////////////////////////////////    
    if (isset($_POST['btnAgregar'])){       
        $controlador->InsertVentaController($sell);   
   }
   if (isset($_POST['btnModificar'])){
            $controlador->UpdateVentaController($sell);      
    }
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteVentaController($sell);
    }
    if(isset($_POST['btnBuscar1'])){           
           $controlador->SearchFechaController($sell);
    }
    if(isset($_POST['btnBuscar2'])){           
           $controlador->SearchCajaController($sell);
    }
    $controlador->SelectView($sell,$pagina);

?>
