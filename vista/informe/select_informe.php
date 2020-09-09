
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
    
       
            <div class="row align-items-start" style="height: 858px">
                <?php require_once 'vista/plantillas/nav.php';  ?>      
                <div id="tabla">
                    <table class="table table-hover table-bordered">
                     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                         <div id="main1">
                            <button class="openbtn" onclick="Nav()">&#9776; </button>
                        </div>                         
                        
                     </nav> 
                    <thead class="thead-dark">
                        <tr>
                            <th>Opciones</th>
                            <th>Informes </th>
                            <th>Tipos de gráficos </th>
                        </tr>
                    </thead>
                    <input type="hidden" name="txtID" value="form">
                    <?php //foreach($matrizArticulo as $producto){ ?>
                    <tr class="table-info">
                        <td>
                            <form action="vista/informe/informe1.php" method="post" target="_black">
                                <span class="badge badge-primary">Desde:</span>
                                <div class="col-xs-1" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="date" name="Fecha1" placeholder="Buscar por fecha">
                                </div>                          
                                <span class="badge badge-primary">Hasta:</span>
                                <div class="col-xs-1" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="date" name="Fecha2" placeholder="Buscar por fecha">
                                </div>      
                            
                        </td>
                        <td><p class="h5"><strong><em>Cantidad de ventas por cada usuario</em></strong></p></td>                 
                        <td>
                            
                                <input type="hidden" name="txtID1" value="<?php// echo $producto['idArticulos']; ?>">                               
                                <input type="submit" name="btnBarra" value="Barra" class="btn btn-info" >
                                <input type="submit" name="btnCircular" value="Circular" class="btn btn-success" >
                                <input type="submit" name="btnLineal" value="Lineal"  class="btn btn-danger" >
                            </form>
                        </td>
                    </tr>    
                    <tr class="table-info">
                        <td>
                            <form action="vista/informe/informe2.php" method="post" target="_black">
                                <span class="badge badge-success">Desde:</span>
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="date" name="Fecha3" placeholder="Buscar por fecha">
                                </div>                          
                                <span class="badge badge-success">Hasta:</span>
                                <div class="col-xs-2" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="date" name="Fecha4" placeholder="Buscar por fecha">
                                </div>      
                            </td>   
                       
                        <td><p class="h5"><strong><em>Cantidad de ventas mensuales</em></strong></p></td>                 
                        <td>
                            
                                <input type="hidden" name="txtID1" value="<?php// echo $producto['idArticulos']; ?>">
                               <input type="submit" name="btnBarra2" value="Barra" class="btn btn-info" >
                                <input type="submit" name="btnCircular2" value="Circular" class="btn btn-success" >
                                <input type="submit" name="btnLineal2" value="Lineal"  class="btn btn-danger" >
                            </form>
                        </td>
                    </tr>
                    <tr class="table-info">
                        <td>
                            <form action="vista/informe/informe3.php" method="post" target="_black">
                                <span class="badge badge-info">Desde:</span>
                                <div class="col-xs-1" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="date" name="Fecha5" placeholder="Buscar por fecha">
                                </div>                          
                                <span class="badge badge-info">Hasta:</span>
                                <div class="col-xs-1" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="date" name="Fecha6" placeholder="Buscar por fecha">
                                </div>      
                           
                        </td>
                        <td><p class="h5"><strong><em>Cantidad de ventas de acuerdo al medio de pago</em></strong></p></td>                 
                        <td>
                            
                                <input type="hidden" name="txtID1" value="<?php// echo $producto['idArticulos']; ?>">
                                <input type="submit" name="btnBarra3" value="Barra" class="btn btn-info" >
                                <input type="submit" name="btnCircular3" value="Circular" class="btn btn-success" >
                                <input type="submit" name="btnLineal3" value="Lineal"  class="btn btn-danger" >
                            </form>
                        </td>
                    </tr>
                    <tr class="table-info">
                        <td>
                            
                        </td>
                        <td><p class="h5"><strong><em>Número de clientes de cada ciudad</em></strong></p></td>                 
                        <td>
                            <form action="vista/informe/informe4.php" method="post" target="_black">
                                <input type="hidden" name="txtID1" value="<?php// echo $producto['idArticulos']; ?>">
                                <input type="submit" name="btnBarra4" value="Barra" class="btn btn-info" >
                                <input type="submit" name="btnCircular4" value="Circular" class="btn btn-success" >
                                <input type="submit" name="btnLineal4" value="Lineal"  class="btn btn-danger" >
                            </form> 
                        </td>
                    </tr>
                    <tr class="table-info">
                        <td>
                            <form action="vista/informe/informe5.php" method="post" target="_black">
                                <span class="badge badge-warning">Cantidad:</span>
                                <div class="col-xs-1" style="margin: 10px;">
                                    <input class="form-control mr-sm-2" type="number" name="cantidad" placeholder="Ingrese el valor de X">
                                </div>                                                            
                           
                        </td>
                        <td><p class="h5"><strong><em>Mostrar los X productos más vendidos</em></strong></p></td>                 
                        <td>
                            
                                <input type="hidden" name="txtID1" value="<?php// echo $producto['idArticulos']; ?>">
                                <input type="submit" name="btnBarra5" value="Barra" class="btn btn-info" >
                                <input type="submit" name="btnCircular5" value="Circular" class="btn btn-success" >
                                <input type="submit" name="btnLineal5" value="Lineal"  class="btn btn-danger" >
                            </form>
                        </td>
                    </tr>
                    <?php // } ?>
                    
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
