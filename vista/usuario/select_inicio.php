
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
          
            <div class="row align-items-start" style="height: 618px">
               <?php require_once 'vista/plantillas/nav.php';  ?>  
                <div id="tabla">
                <table class="table table-hover table-bordered">
                     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                         <div id="main1">
                            <button class="openbtn" onclick="Nav()">&#9776; </button>
                           
                        </div>  
                        <form action="" method="post">        
                        </form>
                     </nav> 
                      <section class="main">
                          <span class="badge badge-secondary">Usuario Activo:  </span><span class="badge badge-secondary"> <?php if(isset($_SESSION['userName'])) echo ucfirst($_SESSION['userName']); ?></span>
                        <div class="wrapp">
				<article>
					<div class="mensaje">
						<h2>GPI - Gestión de Productos Informáticos</h2>
					</div>
                                    <div id="portada">
                                        <img src="img/portada/gestion.jpg" class="rounded" alt="Foto">
                                     </div>       
				</article>
                        </div>
                      </section>                    
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
            
            
            
          
        </div>

        </body>
        
</html>


