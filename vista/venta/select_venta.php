
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Venta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                                       
     
            <div class="modal-body">
                <div class="form-row">
                    <input type="hidden" name="idVenta1" value="<?php echo $filaVenta['idVenta']; ?>" placeholder="" required >
                    <input type="hidden" name="idCaja1" value="<?php echo $filaVenta['Caja_idCaja']; ?>" placeholder="" required >
                    <div class="form-group col-md-4">
                        <label for="">Fecha de venta: </label>
                        <input type="datetime" name="fechaVenta1" class="form-control <?php //echo (isset($error['Nombre']))?"is-invalid":""; ?>"  value="<?php echo $filaVenta['fechaVenta']; ?>" placeholder="" required >
                        <div class="invalid-feedback">
                            <?php //echo (isset($error['Nombre']))?$error['Nombre']:""; ?>
                        </div>
                        <br>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Tipo de venta: </label>
                        <input type="text" name="tipoVenta1" class="form-control <?php //echo (isset($error['Nombre']))?"is-invalid":""; ?>"  value="<?php echo $filaVenta['tipoVenta']; ?>" placeholder="" required >
                        <div class="invalid-feedback">
                            <?php //echo (isset($error['Nombre']))?$error['Nombre']:""; ?>
                        </div>
                        <br>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="">Descuento: </label>
                    <input type="text" name="descVenta1" class="form-control <?php //echo (isset($error['ApellidoP']))?"is-invalid":""; ?>"  value="<?php echo $filaVenta['descVenta']; ?>" placeholder=""  >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoP']))?$error['ApellidoP']:""; ?>
                    </div>
                    <br>
                </div>
                
                <div class="form-group col-md-4">
                    <label for="">Medio de Pago: </label>
                    <input type="text" name="medioPago1" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>" value="<?php echo $filaVenta['medioPago']; ?>" placeholder="" required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Total: </label>
                    <input type="text" class="form-control" name="totalVenta1" value="<?php echo $filaVenta['totalVenta']; ?>" placeholder="" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>     
                <div class="form-group col-md-4">
                    <label for="">Usuario: </label>                  
                    <select class="form-control" name="idUsuario1" >
                        <option value="<?php echo $filaVenta['Usuario_idUsuario'];?>" ><?php echo $filaVenta['userName'];?></option>
                        <?php foreach ($filaUsuario as $slq): ?>
			<?php echo "<option value='". $slq['Usuario_idUsuario']. "'>". $slq['userName']." </option>"; ?>
			<?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Producto: </label>
                    <input type="text" class="form-control" name="producVenta1" value="<?php echo $filaVenta['producVenta']; ?>" required >
                    
                    
                    
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Venta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                                       
            <div class="modal-body">
                <div class="form-row">   
                    
                    <div class="form-group col-md-4">
                        <label for="">Tipo de venta: </label>
                        <input type="text" name="tipoVenta" class="form-control <?php //echo (isset($error['Nombre']))?"is-invalid":""; ?>"  value="" placeholder="" required >
                        <div class="invalid-feedback">
                            <?php //echo (isset($error['Nombre']))?$error['Nombre']:""; ?>
                        </div>
                        <br>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="">Descuento: </label>
                    <input type="text" name="descVenta" class="form-control <?php //echo (isset($error['ApellidoP']))?"is-invalid":""; ?>"  value=" " placeholder="" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoP']))?$error['ApellidoP']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Usuario: </label>                  
                    <select class="form-control" name="idUsuario" >                       
                        <?php foreach ($filaUsuario as $slq): ?>
			<?php echo "<option value='". $slq['idUsuario']. "'>". $slq['userName']." </option>"; ?>
			<?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>
                <div class="form-group col-md-8">
                    <label for="">Medio de Pago: </label>
                    <input type="text" name="medioPago" class="form-control <?php //echo (isset($error['Correo']))?"is-invalid":""; ?>"  value=" " placeholder="" required >
                    <div class="invalid-feedback">
                        <?php// echo (isset($error['Correo']))?$error['Correo']:""; ?>
                    </div>
                    <br>
                </div>
                 <div class="form-group col-md-4">
                    <label for="">Total: </label>
                    <input type="number" class="form-control" name="totalVenta" value=" " placeholder="" required >
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
                    </div>
                    <br>
                </div>
                   
                
                <div class="form-group col-md-6">
                    <label for="">Producto: </label>
                    <input type="text" class="form-control" name="producVenta" id ="txtnombre" onkeyup="CambiarSelector(this.value)" required >
                    <div id="divresultados" style="position:absolute"></div>
                    <select class="form-control" name="producVenta2" id="ultnombre" style="display:none">                      
                        <?php foreach ($filaProducto as $slq3): ?>
			<?php echo "<option value='". $slq3['nomArt']. "'>". $slq3['nomArt']." </option>"; ?>
			<?php endforeach; ?>
                    </select>
                    <script language="JavaScript">
                        var inpName = document.querySelector('#ultnombre');
                        var rdiv = document.querySelector('#divresultados');
                        obj = document.querySelector('#txtnombre');
                        if(obj.offsetParent){
                            x = obj.offsetLeft;
                            y = obj.offsetTop;
                            h = obj.offsetHeight;
                            w = obj.offsetWidth;
                            while(obj = obj.offsetParent){
                                    x += obj.offsetLeft;
                                    y += obj.offsetTop;
                            }
                        }
                        document.querySelector('#divresultados').style.left = x;
                        document.querySelector('#divresultados').style.top = y + h;
                        document.querySelector('#divresultados').style.width = w;
                    </script>
                    <div class="invalid-feedback">
                        <?php //echo (isset($error['ApellidoM']))?$error['ApellidoM']:""; ?>
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
            
            
            
            
            
            
            <div class="row align-items-start" style="height: 658px">
                 <?php require_once 'vista/plantillas/nav.php';  ?>  
                <div id="tabla">
                <table class="table table-hover table-bordered">
                     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                         <div id="main1">
                            <button class="openbtn" onclick="Nav()">&#9776; </button>
                        </div>
                         <form action="" method="post"> 
                                <button type="submit" class="btn btn-primary" name="accion2">
                                    Agregar Venta 
                                </button>
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="date" name="BuscarFecha" placeholder="Buscar por fecha">
                                </div>
                                <button class="btn btn-success" type="submit" name="btnBuscar1"  style="margin-right: 10px;">Buscar</button>
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="text" name="BuscarCaja" placeholder="Buscar por caja">
                                </div>
                                <button class="btn btn-success" type="submit" name="btnBuscar2" style="margin-right: 10px;">Buscar</button>
                                
                        </form>
                     </nav> 
                    <thead class="thead-dark">
                        <tr>
                            
                            <th>Fecha </th>
                            <th>Tipo </th>
                            <th>Descuento</th>
                            <th>Prodcuto </th>
                            <th>Medio </th>
                            <th>Total </th>
                            <th>Usuario </th>
                            <th>Caja </th>
                            <th>Acciones </th>
                        </tr>
                    </thead>
                    <input type="hidden" name="txtID" value="form">
                    <?php foreach($matrizVenta as $datos){ ?>
                    <tr class="table-info">
                        
                        <td><?php echo $datos['fechaVenta']; ?> </td>
                        <td><?php echo $datos['tipoVenta']; ?></td>
                        <td><?php echo $datos['descVenta']; ?></td>
                        <td><?php echo $datos['producVenta']; ?></td>
                        <td><?php echo $datos['medioPago']; ?></td>
                        <td><?php echo $datos['totalVenta']; ?></td>
                        <td><?php echo $datos['userName']; ?></td>
                        <td><?php echo $datos['Caja_idCaja']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtID1" value="<?php echo $datos['idVenta']; ?>">
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
                    <a class="page-link" href="menu_venta.php<?php echo $PaginaAnterior; ?>" aria-label="Previous">
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
                  <a class="page-link" href="menu_venta.php<?php echo $PaginaSiguiente; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Siguiente</span>
                  </a>
                </li>
                
            <?php } 
            echo '</ul>'; ?></td></tr>
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


