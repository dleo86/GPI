<?php

require_once ('modelo/ciudad.php');

$city = new Ciudad();


class ciudadController extends Ciudad{
    public $instanciacontrolador;
    public $matrizCity;
    public $matrizProv;
    public $mostrarModal;
    public $filaCity = '';
    public $total_paginas;
  
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($city,$pagina) {
       /////////////////////////////////////////////////////////////////////////
       //PAGINACIÓN
       /////////////////////////////////////////////////////////////////////////
       $this->tamanho_paginas= 5;
       $empezar_desde = ($pagina-1)*$this->tamanho_paginas;
       $tamanho_paginas = $this->tamanho_paginas;
       $num_filas = $city->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas);
       ////////////////////////////////////////////////////////////////////////
       $matrizCity = $city->SelectCity($empezar_desde, $tamanho_paginas); 
       $matrizProv = $city->SelectProv();
       $txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';  
       if($accion){
            $filaCity=$city->CitySeleccionado($txtID1);
         }
       require_once ('vista/persona/select_ciudad.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertCityController($city){
        //Datos Ciudad
        $idCity = '';
        $Nomcity = (isset($_POST['nombreCity']))?$_POST['nombreCity']:'';
        $NomProv = (isset($_POST['provincia']))?$_POST['provincia']:'';      
        $Insertar1 = $city->InsertCity($Nomcity,$NomProv);            
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateCityController($city){
        //Datos Ciudad
        $idCity = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $Nomcity = (isset($_POST['nombreCity1']))?$_POST['nombreCity1']:'';
        $NomProv = (isset($_POST['provincia1']))?$_POST['provincia1']:'';
        
        $Actualizar1 = $city->UpdateCity($idCity, $Nomcity,$NomProv);            
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function ValidarCityInsert($city) {
        $cuit = (isset($_POST['cuit']))?$_POST['cuit']:'';
        $Nomcity = (isset($_POST['nombreCity']))?$_POST['nombreCity']:'';
        $NomProv = (isset($_POST['provincia']))?$_POST['provincia']:'';
        $valido = $city->ValidarInsert($Nomcity,$NomProv);
        return $valido;
    }
    
    public function ValidarCityUpdate($city) {
        $idCity = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $Nomcity = (isset($_POST['nombreCity1']))?$_POST['nombreCity1']:'';
        $NomProv = (isset($_POST['provincia1']))?$_POST['provincia1']:'';
        $valido = $city->ValidarUpdate($idCity,$Nomcity,$NomProv);
        return $valido;
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteCityController($city) {
        $idCity = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $Borrar = $city->DeleteCity($idCity);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
   public function SearchCityController($city) {
       $tamanho_paginas= 5;
       $num_filas = $city->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas);
        $cuidad = (isset($_POST['buscarCity']))?$_POST['buscarCity']:'';
        if (!empty($cuidad)){
            $matrizCity = $city->SearchCity($cuidad);
            if (isset($matrizCity)){
                require_once('vista/persona/select_ciudad.php');              
            } else{
                echo 'No se ha encontrado la ciudad';
            }
        } 
    }  
}

    $controlador = new ciudadController();
    $error = array();
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_ciudad.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    if (isset($_POST['btnAgregar'])){ 
        if ($controlador->ValidarCityInsert($city)){
            $controlador->InsertCityController($city);  
        }else {
            echo 'Ya existe esa ciudad en la provincia indicada';
        }
   }
   if (isset($_POST['btnModificar'])){
       if ($controlador->ValidarCityUpdate($city)){
            $controlador->UpdateCityController($city);       
       }else{
           echo 'Ya existe esa ciudad en la provincia indicada';
       }      
    } 
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteCityController($city);
    }
    if(isset($_POST['btnBuscar1'])){           
           $controlador->SearchCityController($city);
    }
    $controlador->SelectView($city,$pagina);

?>
