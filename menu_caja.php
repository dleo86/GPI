<!DOCTYPE html>
<?php require_once 'vista/plantillas/header.php'; ?>
    <body>
        <?php
        session_start();
          if(!isset($_SESSION['userName'])){
            header('Location: login.php');
          }
          require_once ('controlador/cajaController.php');
          
        ?>
    </body>
     <?php require_once 'vista/plantillas/footer.php'; ?>
</html>
