<?php

require_once ('modelo/proveedor.php');

$prov = new Proveedor();


class proveedorController extends Proveedor{
    public $instanciacontrolador;
    public $matrizProveedor;
    public $mostrarModal;
    public $filaProveedor;
    public $filaLoc;
    public $filaIva;
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
   public function SelectView($prov,$pagina) {
       /////////////////////////////////////////////////////////////////////////
       //PAGINACIÓN
       /////////////////////////////////////////////////////////////////////////
       $tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$tamanho_paginas;
       $num_filas = $prov->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas); 
       /////////////////////////////////////////////////////////////////////////
       $matrizProveedor = $prov->SelectProveedor($empezar_desde, $tamanho_paginas); 
       $filaLoc = $prov->SelectLoc();
       $filaIva = $prov->SelectIva();
       $idProv = (isset($_POST['idProv']))?$_POST['idProv']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaProveedor=$prov->ProvSeleccionado($idProv);
       }
       require_once ('vista/persona/select_proveedor.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarInsert($prov) {
        $cuit = (isset($_POST['cuit']))?$_POST['cuit']:'';
        $valido = $prov->ValidarProveedor($cuit);
        return $valido;
    }
    
    public function ValidarUpdate($prov) {
        $cuit = (isset($_POST['cuit1']))?$_POST['cuit1']:'';
        $idprov = (isset($_POST['IDprov1']))?$_POST['IDprov1']:'';
        $valido = $prov->ValidarProveedor2($idprov,$cuit);
        return $valido;
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertProv($prov) {
        //Datos Proveedor
        $idprov = (isset($_POST['idProv1']))?$_POST['idProv1']:'';
        $cuitProv = (isset($_POST['cuit']))?$_POST['cuit']:'';
        $RazonSocial = (isset($_POST['razonSocial']))?$_POST['razonSocial']:'';
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
        
        $Insertar1 = $prov->InsertDomicilio($calle, $numDom, $piso, $dpto, $codPostal, $localidad);
       
        $Insertar2 = $prov->InsertPersona($nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers);        
       
        $Insertar3 = $prov->InsertProveedor($idprov,$cuitProv,$RazonSocial);   
        
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateProv($prov) {
        //Datos Proveedor
        $idprov = (isset($_POST['IDprov1']))?$_POST['IDprov1']:'';
        $cuitProv = (isset($_POST['cuit1']))?$_POST['cuit1']:'';
        $RazonSocial = (isset($_POST['razonSocial1']))?$_POST['razonSocial1']:'';
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
        
        $Actualizar1 = $prov->UpdateDomicilio($idDom,$calle, $numDom, $piso, $dpto, $codPostal, $localidad);
       
        $Actualizar2 = $prov->UpdatePersona($idPers,$nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers);        
       
        $Actualizar3 = $prov->UpdateProveedor($idprov,$cuitProv,$RazonSocial);
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteProvController($prov) {
        $idprov = (isset($_POST['idProv']))?$_POST['idProv']:'';
        $idPers = (isset($_POST['idPers']))?$_POST['idPers']:'';
        $idDom = (isset($_POST['idDom']))?$_POST['idDom']:'';
        $Borrar = $prov->DeleteProveedor($idprov,$idPers,$idDom);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    public function SearchCuitController($prov) {
        $tamanho_paginas= 5;
        $num_filas = $prov->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $cuit = (isset($_POST['buscarCuit']))?$_POST['buscarCuit']:'';
        if (!empty($cuit)){
            $matrizProveedor = $prov->SearchCuit($cuit);
            if (isset($matrizProveedor)){
                require_once('vista/persona/select_proveedor.php');              
            } else{
                echo 'No se ha encontrado el cuit';
            }
        } 
    }
    public function SearchApelController($prov) {
        $tamanho_paginas= 5;
        $num_filas = $prov->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $apellido = (isset($_POST['buscarApel']))?$_POST['buscarApel']:'';
        if (!empty($apellido)){
            $matrizProveedor = $prov->SearchApel($apellido);
            if (isset($matrizProveedor)){
                require_once('vista/persona/select_proveedor.php');              
            } else{
                echo 'No se ha encontrado el apellido';
            }
        } 
    }
    
}

    $controlador = new proveedorController();
    $error = array();
    $_SESSION['Mensaje'] = '';
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_proveedor.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    if (isset($_POST['btnAgregar'])){
        if ($controlador->ValidarInsert($prov)){
            $controlador->InsertProv($prov);
        }else{
           $_SESSION['Mensaje'] = 'Código invalido';
        }   
   }
   if (isset($_POST['btnModificar'])){
        if ($controlador->ValidarUpdate($prov)){
            $controlador->UpdateProv($prov);
        }else{
           $_SESSION['Mensaje'] = 'Código invalido';
        }
    }
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteProvController($prov);
    }
    if(isset($_POST['btnBuscar1'])){           
           $controlador->SearchCuitController($prov);
    }
    if(isset($_POST['btnBuscar2'])){           
           $controlador->SearchApelController($prov);
    }
    $controlador->SelectView($prov,$pagina);
?>
