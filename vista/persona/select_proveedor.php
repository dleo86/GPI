
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
                                <h5 class="modal-title" id="exampleModalLabel">Proveedor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>   
        <div class="modal-body">
            <div class="form-row">
                <input type="hidden" name="IDprov1" value="<?php echo $filaProveedor['idProveedor']; ?>" placeholder="" required >
                <input type="hidden" name="IDpers1" value="<?php echo $filaProveedor['idPersona']; ?>" placeholder="" required >
                <input type="hidden" name="IDdom1" value="<?php echo $filaProveedor['idDomicilio']; ?>" placeholder="" required >
                
                <div class="form-group col-md-4">
                    <label for="">Nombre: </label>
                    <input type="text" name="nomPersona1" class="form-control <?php //echo (isset($error['Nombre']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['nomPersona']; ?>" placeholder="" id="txtNombre" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['Nombre']))?$error['Nombre']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Apellido: </label>
                    <input type="text" name="apelPersona1" class="form-control <?php //echo (isset($error['ApellidoP']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['ApelPersona']; ?>" placeholder="" id="txtApellidoP" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoP']))?$error['ApellidoP']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">CUIT: </label>
                    <input type="text" name="cuit1" class="form-control"  value="<?php echo $filaProveedor['cuitProv']; ?>" placeholder="" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Razon Social: </label>
                    <input type="text" name="razonSocial1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['RazonSocial']; ?>" placeholder=""  required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>     
                <div class="form-group col-md-4">
                    <label for="">Fecha nac: </label>
                    <input type="date" name="nac1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['nacPersona']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>  
                <div class="form-group col-md-4">
                    <label for="">Teléfono: </label>
                    <input type="text" name="tel1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['telPersona']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>  
                <div class="form-group col-md-4">
                    <label for="">Email: </label>
                    <input type="email" name="email1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['emailPersona']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>  
                <div class="form-group col-md-4">
                    <label for="">DNI: </label>
                    <input type="number" name="dni1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['dniPersona']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Dirección: </label>
                    <input type="text" name="dir1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['calleDom']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Nro: </label>
                    <input type="number" name="nro1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['numDom']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Piso: </label>
                    <select class="form-control" name="piso1"  >
                        <option value="<?php $filaProveedor['idDomicilio'];?>" ><?php echo $filaProveedor['pisoDom'];?></option>
                         <?php for($piso = 0; $piso < 55; $piso++){ ?>
			<?php echo "<option value='". $piso. "'>". $piso . "</option>"; ?>
			<?php } ?>
                    </select>                   
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Dpto: </label>
                    <input type="text" name="dpto1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['dptoDom']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Cod Post: </label>
                    <input type="number" name="postal1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php echo $filaProveedor['codPostal']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Loc: </label>
                    <select class="form-control" name="loc1" >
                        <option value="<?php echo $filaProveedor['idLocalidad'];?>" ><?php echo $filaProveedor['nombreLoc'];?></option>
                        <?php foreach ($filaLoc as $slq): ?>
			<?php echo "<option value='". $slq['idLocalidad']. "'>". $slq['nombreLoc']." </option>"; ?>
			<?php endforeach; ?>
                    </select> 
                    <br>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="">Iva: </label>                  
                    <select class="form-control" name="iva1" >
                        <option value="<?php echo $filaProveedor['idIva'];?>" ><?php echo $filaProveedor['descripIva'];?></option>
                        <?php foreach ($filaIva as $slq1): ?>
			<?php echo "<option value='". $slq1['idIva']. "'>". $slq1['descripIva']." </option>"; ?>
			<?php endforeach; ?>
                    </select>                  
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
        </div>
        </div>
        <div class="modal-footer">            
                <button value="btnModificar" name="btnModificar" <?php //echo $accionModificar; ?>  class="btn btn-warning" type="submit" >Modificar</button>
                <button type="button" value="Cancelar" data-dismiss="modal" aria-label="Close" name="btnCancelar" class="btn btn-primary"><span aria-hidden="true">Cancelar</span></button>
        </div>
        </div>
        </div>
        </div>              
     </form>
        
    <form action="" method="post" enctype="multipart/form-data">
                <!-- Modal: Abre la ventana para agregar los datos -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Proveedor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>   
        <div class="modal-body">
            <div class="form-row">
                <input type="hidden" name="idProv" value=""   >
                <div class="form-group col-md-4">
                    <label for="">Nombre: </label>
                    <input type="text" name="nomPersona" class="form-control <?php //echo (isset($error['Nombre']))?"is-invalid":""; ?>"  value=" " placeholder="" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['Nombre']))?$error['Nombre']:""; ?>
                    </div>
                    <br>
                </div>
                    <div class="form-group col-md-4">
                    <label for="">Apellido: </label>
                    <input type="text" name="apelPersona" class="form-control <?php //echo (isset($error['ApellidoP']))?"is-invalid":""; ?>" value=" " placeholder="" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoP']))?$error['ApellidoP']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">CUIT: </label>
                    <input type="text" name="cuit" class="form-control" value=" " placeholder=""  required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Razon Social: </label>
                    <input type="text" name="razonSocial" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>" value=" " placeholder="" required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Fecha nac: </label>
                    <input type="date" name="nac" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>"   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>  
                <div class="form-group col-md-4">
                    <label for="">Teléfono: </label>
                    <input type="text" name="tel" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>  
                <div class="form-group col-md-4">
                    <label for="">Email: </label>
                    <input type="email" name="email" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>  
                <div class="form-group col-md-4">
                    <label for="">DNI: </label>
                    <input type="number" name="dni" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Dirección: </label>
                    <input type="text" name="dir" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Nro: </label>
                    <input type="number" name="nro" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>"   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Piso: </label>
                    <select class="form-control" name="piso" >
                        <?php for($piso = 0; $piso < 55; $piso++){ ?>
			<?php echo "<option value='". $piso. "'>". $piso . "</option>"; ?>
			<?php } ?>
                    </select>                   
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Dpto: </label>
                    <input type="text" name="dpto" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-2">
                    <label for="">Cod Post: </label>
                    <input type="number" name="postal" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value="<?php //echo $filaProveedor['RazonSocial']; ?>" placeholder=""   >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Loc: </label>
                    <select class="form-control" name="loc" >
                        <?php foreach ($filaLoc as $slq): ?>
			<?php echo "<option value='". $slq['idLocalidad']. "'>". $slq['nombreLoc']." </option>"; ?>
			<?php endforeach; ?>
                    </select> 
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="">Iva: </label>
                    <select class="form-control" name="iva" >
                        <?php foreach ($filaIva as $slq1): ?>
			<?php echo "<option value='". $slq1['idIva']. "'>". $slq1['descripIva']." </option>"; ?>
			<?php endforeach; ?>
                    </select>                  
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
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
        
        
        
            <div class="row align-items-start" style="height: 620px">
                <?php require_once 'vista/plantillas/nav.php';  ?>    
                <div id="tabla">
                <table class="table table-hover table-bordered">
                     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                         <div id="main1">
                            <button class="openbtn" onclick="Nav()">&#9776; </button>
                        </div>  
                        <form action="" method="post">
                                <button type="submit" class="btn btn-primary" name="accion2">
                                    Agregar Proveedor 
                                </button> 
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="text" name="buscarCuit" placeholder="Buscar por cuit">
                                </div>
                                <button class="btn btn-success" type="submit" name="btnBuscar1" style="margin-right: 10px;">Buscar</button>
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="text" name="buscarApel" placeholder="Buscar por apellido">
                                </div>
                                <button class="btn btn-success" type="submit" name="btnBuscar2" style="margin-right: 10px;">Buscar</button>
                                <?php
                        if(!empty($_SESSION['Mensaje'])){
                       ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <p class="m-none text-semibold h6">
                             Los datos del proveedor son incorrectos
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
                            <th>Nombre </th>
                            <th>Apellido </th>
                            <th>CUIT </th>
                            <th>Razón Social </th>
                            <th>Acciones </th>
                        </tr>
                    </thead>
                    <input type="hidden" name="txtID" value="form">
                    <?php foreach($matrizProveedor as $datos){ ?>
                    <tr class="table-info">
                        <td><?php echo $datos['nomPersona']; ?></td>
                        <td><?php echo $datos['ApelPersona']; ?> </td>
                        <td><?php echo $datos['cuitProv']; ?></td>
                        <td><?php echo $datos['RazonSocial']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="idProv" value="<?php echo $datos['idProveedor']; ?>">
                                <input type="hidden" name="idPers" value="<?php echo $datos['idPersona']; ?>">
                                <input type="hidden" name="idDom" value="<?php echo $datos['idDomicilio']; ?>">
                                <input type="submit" value="Seleccionar" class="btn btn-info" name="accion" >
                                <button type="submit" value="btnEliminar" name="btnEliminar" onclick="return Confirmar('¿Realmente deseas borrar?');" class="btn btn-danger" >Eliminar</button>
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
                    <a class="page-link" href="menu_proveedor.php<?php echo $PaginaAnterior; ?>" aria-label="Previous">
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
                  <a class="page-link" href="menu_proveedor.php<?php echo $PaginaSiguiente; ?>" aria-label="Next">
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


