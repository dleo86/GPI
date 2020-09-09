
   <body>         
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><img class="img-thumbnail" height="20px" width="30px" src="img/portada/logo.jpg"></a>
                 <div class="collapse navbar-collapse" id="navbarTogglerDemo01">  
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                       
                    </ul>    
                 </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php if(isset($_SESSION['userName'])) echo ucfirst($_SESSION['userName']); ?></a>        
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cerrar.php">Salir</a>
                    </div>
                </li>
            </nav>
   <form action="" method="post" enctype="multipart/form-data">    
                <!-- Modal: Abre la ventana para modificar los datos -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Artículo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
            <div class="modal-body">
                <div class="form-row">
                    <input type="hidden" name="ArtID1" value="<?php echo $filaArticulo['idArticulos']; ?>" placeholder="" id="ArtID1" required >  
                <div class="form-group col-md-4">
                    <label for="">Codigo: </label>
                    <input type="text" class="form-control <?php //echo (isset($error['Nombre']))?"is-invalid":""; ?>" name="codArt1" value="<?php echo $filaArticulo['codArt']; ?>" placeholder="" id="codArt1" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['Nombre']))?$error['Nombre']:""; ?>
                    </div>
                    <br>
                 </div>
                    <div class="form-group col-md-4">
                    <label for="">Nombre: </label>
                    <input type="text" class="form-control <?php //echo (isset($error['ApellidoP']))?"is-invalid":""; ?>" name="nomArt1" value="<?php echo $filaArticulo['nomArt']; ?>" placeholder="" id="nomArt1" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoP']))?$error['ApellidoP']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Stock: </label>
                    <input type="text" class="form-control" name="stockArt1" value="<?php echo $filaArticulo['stockArt']; ?>" placeholder="" id="stockArt1" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Precio: </label>
                    <input type="text" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>" name="precioArt1" value="<?php echo $filaArticulo['precioArt']; ?>" placeholder="" id="precioArt1" required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Marca: </label>
                    <input type="text" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>" name="marcaArt1" value="<?php echo $filaArticulo['marcaArt']; ?>" placeholder="" id="marcaArt1" required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
               <div class="form-group col-md-12">
                    <label for="">Rubro: </label>
                    <select class="form-control" name="TipoArt1" required> 
                        <option value="<?php echo $filaArticulo['idTipoArt'];?>" ><?php echo $filaArticulo['tipoArt'];?></option>
                        <?php foreach ($filaTipo as $slq1): ?>
			<?php echo "<option value='". $slq1['idTipoArt']. "'>". $slq1['tipoArt']." </option>"; ?>
			<?php endforeach; ?>
                    </select>                   
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Imagen: </label>
                    <?php //if($txtFoto != ""){ ?>
                    <br/>
                    <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="img/<?php echo $filaArticulo['Img']; ?>">
                    <br/>
                    <br/>
                    <?php// } ?>                
                    <input type="file" class="form-control" accept="img/*" name="Img1"  value="img/<?php echo $filaArticulo['Img']; ?>" placeholder="" id="Img1"  >
                    <br>
                </div>
        </div>
        </div>
        <div class="modal-footer">          
                <button value="btnModificar" <?php //echo $accionModificar; ?>  class="btn btn-warning" type="submit" name="btnModificar">Modificar</button>
                <button type="button" value="Cancelar" data-dismiss="modal" aria-label="Close" name="btnCancelar" class="btn btn-primary"><span aria-hidden="true">Cancelar</span></button>
        </div>
        </div>
        </div>
      </div>
  </form>
       
   <form action="" method="post" enctype="multipart/form-data">    
                <!-- Modal: Abre la ventana para modificar los datos -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Articulo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
            <div class="modal-body">
                <div class="form-row"> 
                    <input type="hidden" name="idArticulo" value="" placeholder="" id="idArticulo"  >  
              
                <div class="form-group col-md-4">
                    <label for="">Codigo: </label>
                    <input type="text" class="form-control <?php //echo (isset($error['Nombre']))?"is-invalid":""; ?>" name="codArt" value=" " placeholder="" id="codArt" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['Nombre']))?$error['Nombre']:""; ?>
                    </div>
                    <br>
                 </div>
                    <div class="form-group col-md-4">
                    <label for="">Nombre: </label>
                    <input type="text" class="form-control <?php //echo (isset($error['ApellidoP']))?"is-invalid":""; ?>" name="nomArt" value=" " placeholder="" id="nomArt" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoP']))?$error['ApellidoP']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Stock: </label>
                    <input type="number" class="form-control" name="stockArt" value=" " placeholder="" id="stockArt" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Precio: </label>
                    <input type="number" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>" name="precioArt" value=" " placeholder="" id="precioArt" required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Marca: </label>
                    <input type="text" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>" name="marcaArt" value=" " placeholder="" id="marcaArt" required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Rubro: </label>
                    <select class="form-control" name="TipoArt" id="TipoArt" required>
                        <?php foreach ($filaTipo as $slq): ?>
			<?php echo "<option value='". $slq['idTipoArt']. "'>". $slq['tipoArt']." </option>"; ?>
			<?php endforeach; ?>
                    </select>                   
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Imagen: </label>           
                    <input type="file" class="form-control" accept="img/*" name="Img" value="" placeholder="" id="Img"  >
                    <br>
                </div>
        </div>
        </div>
        <div class="modal-footer">          
               <button value="btnAgregar" class="btn btn-success" type="submit" name="btnAgregar">Agregar</button>
                <button type="button" value="Cancelar" data-dismiss="modal" aria-label="Close" name="btnCancelar" class="btn btn-primary"><span aria-hidden="true">Cancelar</span></button>
        </div>
        </div>
        </div>
      </div>
  </form>

       
       
            <div class="row align-items-start" style="height: 788px">
               <?php require_once 'vista/plantillas/nav.php';  ?>    
                <div id="tabla">
                    <table class="table table-hover table-bordered">
                     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                         <div id="main1">
                            <button class="openbtn" onclick="Nav()">&#9776; </button>
                         </div> 
                        <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="accion2">
                                    Agregar Artículo 
                                </button>                              
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="text" name="buscarCod" placeholder="Buscar por código">
                                </div>
                                <button class="btn btn-success" type="submit" style="margin-right: 10px;" name="btnBuscar1">Buscar</button>
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="text" name="buscarName" placeholder="Buscar por nombre">
                                </div>
                                <button class="btn btn-success" type="submit" style="margin-right: 10px;" name="btnBuscar2">Buscar</button>
                       <?php
                        if(!empty($_SESSION['Mensaje'])){
                       ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <p class="m-none text-semibold h6">
                             Los datos del artículo son incorrectos
                          </p>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                       <?php
                        }
                        ?>
                        </form>
                     </nav> 
                    <thead class="thead-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>Código </th>
                            <th>Nombre </th>
                            <th>Marca </th>
                            <th>Precio </th>
                            <th>Acciones </th>
                        </tr>
                    </thead>
                    <input type="hidden" name="txtID" value="form">
                    <?php foreach($matrizArticulo as $producto){ ?>
                    <tr class="table-info">
                        <td><img class="img-thumbnail" height="5px" width="100px" src="img/<?php echo $producto['Img'];?>"></td>                       
                        <td><?php echo $producto['codArt']; ?></td>
                        <td><?php echo $producto['nomArt']; ?> </td>
                        <td><?php echo $producto['marcaArt']; ?> </td>
                        <td><?php echo $producto['precioArt']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtID1" value="<?php echo $producto['idArticulos']; ?>">
                                <input type="submit" value="Seleccionar" class="btn btn-info" name="accion" >
                                <button type="submit" value="btnEliminar" onclick="return Confirmar('¿Realmente deseas borrar?');" class="btn btn-danger" name="btnEliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                   

                    <tr><td><?php
            //PAGINACIÓN
            //agrego el link a la pagina anterior 
            //si no tengo la variable q viaja por GET, debo mostrar el listado de la pagina 1, y el Anterior no debe ser link
            if (empty($_GET['pagina'])) {
                $PaginaAnterior = '';
                
            } else if ($_GET['pagina'] == 1) {
                //si tengo la variable q viaja por GET, y es la primer pagina, debo mostrar el listado de la pagina 1, y el Anterior tampoco debe ser link
                $PaginaAnterior = '';
                
            } else if ($_GET['pagina'] <= $total_paginas) {
                //si tengo la variable GET y es alguna pagina intermedia, agrego 1 para la proxima page
                $PaginaAnterior = '?pagina=' . ($_GET['pagina'] - 1);
            }
             echo '<ul class="pagination">';
            //se mostrara si estoy en la pagina 2 o superior.
            //No deberia ver una pagina anterior si estoy en la pagina 1 con los primeros registros
            if (!empty($PaginaAnterior)) {
                ?> 
                <li class="page-item">
                    <a class="page-link" href="menu_articulo.php<?php echo $PaginaAnterior; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                    </a>
                </li>
                
            <?php } 
//--------------------------Paginación-------------------------------------------------------
                    for($i=1;$i<=$total_paginas;$i++){
                        echo "<li class='page-item'><a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a></li> ";
                    }
            //agrego el link a la pagina siguiente 
            //si no tengo la variable q viaja por GET, debo mostrar el listado de la pagina 1, y el Siguiente apunta a la page 2
            if (empty($_GET['pagina'])) {
                $PaginaSiguiente = '?pagina=2';
            } else if ($_GET['pagina'] < $total_paginas) {
                //si tengo la variable GET y es alguna pagina intermedia, agrego 1 para la proxima page
                $PaginaSiguiente = '?pagina=' . ($_GET['pagina'] + 1);
            } else if ($_GET['pagina'] == $total_paginas) {
                //si la variable GET tiene el valor de la ultima pagina, no le doy valor al Siguiente
                $PaginaSiguiente = '';
            }

            if (!empty($PaginaSiguiente)) {
                ?> 
                <li class="page-item">
                  <a class="page-link" href="menu_articulo.php<?php echo $PaginaSiguiente; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Siguiente</span>
                  </a>
                </li>
                
            <?php } 
            echo '</ul>'; ?>
                    </td></tr>
                    
           
                </table>
                </div>
            </div>
           
            
          <?php if(isset($_POST['accion'])){ ?>
               <script>
                    $('#exampleModal').modal('show');
                </script>
                
            <?php } ?>
            
            <?php if(isset($_POST['accion2'])){ ?>
               <script>
                    $('#exampleModal2').modal('show');
                </script>
                
            <?php } ?>
            
            
            
                <script>
                    function Confirmar(Mensaje){
                        
                        return(confirm(Mensaje))?true:false;          
                    }
                </script>
              
        </div>      
        </body>
       
</html>
