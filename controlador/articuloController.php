<?php

require_once ('modelo/articulo.php');

$art = new Articulo();


class articuloController extends Articulo{
    public $instanciacontrolador;
    public $matrizArticulo;
    public $mostrarModal;
    public $filaArticulo;
    public $filaTipo;
    public $Insertar;
    public $valido;
    public $total_paginas;
   
    ////////////////////////////////////////////////////////////////////////////
    //SELECCIONAR
    ////////////////////////////////////////////////////////////////////////////
    public function SelectView($art,$pagina,$hasta) {   
       /////////////////////////////////////////////////////////////////////////
       //PAGINACIÓN
       /////////////////////////////////////////////////////////////////////////
        $this->tamanho_paginas= $hasta;
        $empezar_desde = ($pagina-1)*$this->tamanho_paginas;
        $tamanho_paginas = $this->tamanho_paginas;
        $num_filas = $art->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        ////////////////////////////////////////////////////////////////////////
        
       $matrizArticulo = $art->SelectArticulo($empezar_desde, $tamanho_paginas);
       $filaTipo = $art->SelectTipo();
       $txtID1 = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
       $accion = (isset($_POST['accion']))?$_POST['accion']:'';       
       if($accion){
            $filaArticulo=$art->Seleccionado($txtID1);
        }
        require_once ('vista/articulo/select.php');
    }
    ////////////////////////////////////////////////////////////////////////////
    //VALIDAR
    ////////////////////////////////////////////////////////////////////////////
    public function Validar($art) {
        $codArt = (isset($_POST['codArt']))?$_POST['codArt']:'';
        $nomArt = (isset($_POST['nomArt']))?$_POST['nomArt']:'';
        $marcaArt = (isset($_POST['marcaArt']))?$_POST['marcaArt']:'';
        $valido = $art->ValidarArt($codArt,$nomArt,$marcaArt);
        return $valido;
    }
    
    public function Validar2($art) {
        $idArticulo = (isset($_POST['ArtID1']))?$_POST['ArtID1']:'';
        $codArt = (isset($_POST['codArt1']))?$_POST['codArt1']:'';
        $nomArt = (isset($_POST['nomArt1']))?$_POST['nomArt1']:'';
        $marcaArt = (isset($_POST['marcaArt1']))?$_POST['marcaArt1']:'';
        $valido = $art->ValidarUpdate($idArticulo, $codArt,$nomArt,$marcaArt);
        return $valido;
    }
    ////////////////////////////////////////////////////////////////////////////
    //INSERTAR
    ////////////////////////////////////////////////////////////////////////////
    public function InsertArt($art) {
        $idArticulo = (isset($_POST['idArticulo']))?$_POST['idArticulo']:'';
        $codArt = (isset($_POST['codArt']))?$_POST['codArt']:'';
        $nomArt = (isset($_POST['nomArt']))?$_POST['nomArt']:'';
        $stockArt = (isset($_POST['stockArt']))?$_POST['stockArt']:'';
        $precioArt = (isset($_POST['precioArt']))?$_POST['precioArt']:'';
        $marcaArt = (isset($_POST['marcaArt']))?$_POST['marcaArt']:'';
        $Img = (isset($_FILES['Img']["name"]))?$_FILES['Img']["name"]:'';
        $TipoArt_idTipoArt1 = (isset($_POST['TipoArt']))?$_POST['TipoArt']:'';
        $Insertar = $art->InsertArticulo($idArticulo, $codArt, $nomArt, $stockArt, $precioArt, $marcaArt, $Img, $TipoArt_idTipoArt1);       
    }
    ////////////////////////////////////////////////////////////////////////////
    //ACTUALIZAR
    ////////////////////////////////////////////////////////////////////////////
    public function UpdateArt($art) {
        $idArticulo = (isset($_POST['ArtID1']))?$_POST['ArtID1']:'';
        $codArt = (isset($_POST['codArt1']))?$_POST['codArt1']:'';
        $nomArt = (isset($_POST['nomArt1']))?$_POST['nomArt1']:'';
        $stockArt = (isset($_POST['stockArt1']))?$_POST['stockArt1']:'';
        $precioArt = (isset($_POST['precioArt1']))?$_POST['precioArt1']:'';
        $marcaArt = (isset($_POST['marcaArt1']))?$_POST['marcaArt1']:'';
        $Img = (isset($_FILES['Img1']["name"]))?$_FILES['Img1']["name"]:'';
        $TipoArt_idTipoArt1 = (isset($_POST['TipoArt1']))?$_POST['TipoArt1']:'';
        $Actualizar = $art->UpdateArticulo($idArticulo, $codArt, $nomArt, $stockArt, $precioArt, $marcaArt, $Img, $TipoArt_idTipoArt1);       
    }
    ////////////////////////////////////////////////////////////////////////////
    //ELIMINAR
    ////////////////////////////////////////////////////////////////////////////
    public function DeleteArt($art) {
        $idArticulo = (isset($_POST['txtID1']))?$_POST['txtID1']:'';
        $Borrar = $art->DeleteArticulo($idArticulo);        
    }
    ////////////////////////////////////////////////////////////////////////////
    //BUSCAR
    ////////////////////////////////////////////////////////////////////////////
    public function SearchBycodArt($art,$pagina) {
        $codArt = (isset($_POST['buscarCod']))?$_POST['buscarCod']:'';
        $tamanho_paginas= 5;
        $num_filas = $art->Paginacion();
        $total_paginas = ceil($num_filas/$tamanho_paginas);
        if (!empty($codArt)){
            $matrizArticulo = $art->SearchArticuloByCode($codArt);
            if (isset($matrizArticulo)){
                require_once('vista/articulo/select.php');
            }else{
                echo 'No se ha encontrado el código';
            }
        }
    }
    public function SearchByName($art,$pagina) {
       $tamanho_paginas= 5;
       $num_filas = $art->Paginacion();
       $total_paginas = ceil($num_filas/$tamanho_paginas);
        $nomArt = (isset($_POST['buscarName']))?$_POST['buscarName']:'';
        if (!empty($nomArt)){
            $matrizArticulo = $art->SearchArticuloByName($nomArt);
            if (isset($matrizArticulo)){
                require_once('vista/articulo/select.php');
            }else{
                echo 'No se ha encontrado ningún articulo';
            }
        }
    }   
}
    $controlador = new articuloController();
    $error = array();
    $_SESSION['Mensaje'] = '';
    //Cantidad de filas a mostrar
    if(isset($_POST['fila1'])){
        $hasta = 5;
        $_SESSION['valor'] = 1;
    }else if (isset($_POST['fila2']) || isset($_SESSION['valor']) == 2){
        $hasta = 10;
       $_SESSION['valor'] = 2;
    } else if (isset($_POST['fila3']) || isset($_SESSION['valor']) == 3){
        $hasta = 15;
        $_SESSION['valor'] = 3;
    } else {
        $hasta = 5;
    }
    ///////////////////Paginación////////////////////////////////
    if(isset($_GET['pagina'])){       
            if ($_GET['pagina']==1){
                header("Location:menu_articulo.php");
            }
            else{
                $pagina=$_GET['pagina'];
            }       
        } else {
            $pagina = 1;
        }
    ///////////////////////////////////////////////////////////////////////    
    if (isset($_POST['btnAgregar'])){
        if ($controlador->Validar($art)){
            $controlador->InsertArt($art);
        }else{
            $_SESSION['Mensaje'] = 'Código invalido';
        }
    }
    if (isset($_POST['btnModificar'])){
        if ($controlador->Validar2($art)){
            $controlador->UpdateArt($art);
        }else{
            $_SESSION['Mensaje'] = 'Código invalido';
        }
    }
    if (isset($_POST['btnEliminar'])){      
            $controlador->DeleteArt($art);
    }
    if(isset($_POST['btnBuscar1'])){           
           $controlador->SearchBycodArt($art,$pagina);
           //$controlador->SelectView($result);
           //var_dump($result);
    }
    if(isset($_POST['btnBuscar2'])){           
           $controlador->SearchByName($art,$pagina);
    }
    
    $controlador->SelectView($art,$pagina,$hasta);
?>
