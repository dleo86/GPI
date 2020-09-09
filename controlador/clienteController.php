<?php

require_once ('modelo/cliente.php');

$cli = new Cliente();


class clienteController extends Cliente{
    public $instanciacontrolador;
    public $matrizCliente;
    public $mostrarModal;
    public $filaCliente;
    public $filaLoc;
    public $filaIva;
  
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($cli,$pagina) {
       /////////////////////////////////////////////////////////////////////////
       //PAGINACIÓN
       /////////////////////////////////////////////////////////////////////////
       $tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$tamanho_paginas;
       $num_filas = $cli->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas); 
       /////////////////////////////////////////////////////////////////////////
       $matrizCliente = $cli->SelectCliente($empezar_desde, $tamanho_paginas); 
       $filaLoc = $cli->SelectLoc();
       $filaIva = $cli->SelectIva();
       $cliID1 = (isset($_POST['idCli']))?$_POST['idCli']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaCliente=$cli->CliSeleccionado($cliID1);
         }
       require ('vista/persona/select_cliente.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarInsert($cli) {
        $dniPers = (isset($_POST['dni']))?$_POST['dni']:'';
        $valido = $cli->ValidarCliente($dniPers);
        return $valido;
    }
    
    public function ValidarUpdate($cli) {
        $dniPers = (isset($_POST['dni1']))?$_POST['dni1']:'';
        $idPers = (isset($_POST['IDpers1']))?$_POST['IDpers1']:'';
        $valido = $cli->ValidarCliente2($idPers,$dniPers);
        return $valido;
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertCli($cli) {
        //Datos Cliente
        $idcli = (isset($_POST['idCliente']))?$_POST['idCliente']:'';
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
        
        $Insertar1 = $cli->InsertDomicilio($calle, $numDom, $piso, $dpto, $codPostal, $localidad);
       
        $Insertar2 = $cli->InsertPersona($nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers);        
       
        $Insertar3 = $cli->InsertCliente();   
        
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateCli($cli) {
        //Datos Cliente
        $idcli = (isset($_POST['idCliente1']))?$_POST['idCliente1']:'';
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
        
        $Actualizar1 = $cli->UpdateDomicilio($idDom, $calle, $numDom, $piso, $dpto, $codPostal, $localidad);
       
        $Actualizar2 = $cli->UpdatePersona($idPers, $nomPers, $apelPers, $nacPers, $telPers, $emailPers, $dniPers, $ivaPers);           
        
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteCliController($cli) {
        $idcli = (isset($_POST['idCli']))?$_POST['idCli']:'';
        $idPers = (isset($_POST['idPers']))?$_POST['idPers']:'';
        $idDom = (isset($_POST['idDom']))?$_POST['idDom']:'';
        $Borrar = $cli->DeleteCliente($idcli, $idPers, $idDom);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////     
    public function SearchApelController($cli) {
        $tamanho_paginas= 5;
        $num_filas = $cli->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $apellido = (isset($_POST['buscarApel']))?$_POST['buscarApel']:'';
        if (!empty($apellido)){
            $matrizCliente = $cli->SearchApel($apellido);
            if (isset($matrizCliente)){
                require_once('vista/persona/select_cliente.php');              
            } else{
                echo 'No se ha encontrado el apellido';
            }
        } 
    }
    
    public function SearchDniController($cli) {
        $tamanho_paginas= 5;
        $num_filas = $cli->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        $dni = (isset($_POST['buscarDni']))?$_POST['buscarDni']:'';
        if (!empty($dni)){
            $matrizCliente = $cli->SearchDni($dni);
            if (isset($matrizCliente)){
                require_once('vista/persona/select_cliente.php');              
            } else{
                echo 'No se ha encontrado el dni';
            }
        } 
    }
    
}

    $controlador = new clienteController();
    $error = array(); 
    $_SESSION['Mensaje'] = '';
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_cliente.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    if (isset($_POST['btnAgregar'])){
        if ($controlador->ValidarInsert($cli)){
            $controlador->InsertCli($cli);
        }else{
           $_SESSION['Mensaje'] = 'Código invalido';
        }   
    }
    if (isset($_POST['btnModificar'])){
        if ($controlador->ValidarUpdate($cli)){
            $controlador->UpdateCli($cli);
        }else{
           $_SESSION['Mensaje'] = 'Código invalido';
        }
    }
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteCliController($cli);
    }
    if(isset($_POST['btnBuscar1'])){           
           $controlador->SearchApelController($cli);
    }
    if(isset($_POST['btnBuscar2'])){           
           $controlador->SearchDniController($cli);
    }
    $controlador->SelectView($cli,$pagina);

?>
