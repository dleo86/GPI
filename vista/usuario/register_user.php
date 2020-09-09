<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/password.js"></script>
<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <div class="controls">
        <legend class="">Registro</legend>
            <a href="menu_login.php">Volver al login</a>
      </div>
    </div>
    
      <div class="control-group">
       <?php
         if(!empty($_SESSION['Mensaje'])){
      ?>
      <div class="alert alert-warning" role="alert">
          <p class="m-none text-semibold h6">
              El usuario o contraseña ya existen
          </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
          </button>
      </div>
      
      <?php
         }else if(!empty($_SESSION['Exito'])){ 
      ?><div class="alert alert-success" role="alert">
          <p class="m-none text-semibold h6">
              Usuario registrado
          </p>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <?php
         } 
      ?>
     </div>
      <div class="control-group">
        <div class="controls">
            <p>* Campos obligatorios</p>
        </div>
      </div>
    <div class="control-group">
      <!-- Usuario -->
      <label class="control-label"  for="nombre">Nombre</label>
      <div class="controls">
          <input type="text" id="username" name="nomPersona" placeholder="" class="input-xlarge" required>*
      </div>
    </div>  
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="nombre">Apellido</label>
      <div class="controls">
        <input type="text" id="username" name="apelPersona" placeholder="" class="input-xlarge" required>*
      </div>
    </div>  
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Usuario</label>
      <div class="controls">
        <input type="text" id="username" name="usuario" placeholder="" class="input-xlarge" required>*
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Contraseña</label>
      <div class="controls">
          <input type="password" id="pass" name="pass" placeholder="" class="input-xlarge" required>*
        <input name="pass"  type="checkbox" onclick="Mostrar()">    
      <label for="pass">Mostrar Contraseña:</label><br>
      </div>
    </div>
 
      
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="nac">DNI</label>
      <div class="controls">
        <input type="number" name="dni" placeholder="" class="input-xlarge" required>*
      </div>
    </div>
      
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" class="input-xlarge">
      </div>
    </div> 
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="nac">Fecha nac</label>
      <div class="controls">
        <input type="date" name="nac" placeholder="" class="input-xlarge">
      </div>
    </div>
      
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="nac">Teléfono</label>
      <div class="controls">
        <input type="text" name="tel" placeholder="" class="input-xlarge">
      </div>
    </div>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="dir">Dirección</label>
      <div class="controls">
        <input type="text" name="dir" placeholder="" class="input-xlarge">
      </div>
    </div>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label" for="nro">Nro</label>
      <div class="controls">
          <input type="number" name="nro" placeholder="" class="input-xshort">
      </div>
    </div>
    
    <div class="control-group">
      <!-- Username -->
      <label class="control-label" for="piso">Piso</label>
      <div class="controls">
          <select class="input-xshort" name="piso"  >                       
                <?php for($piso = 0; $piso < 55; $piso++){ ?>
		<?php echo "<option value='". $piso. "'>". $piso . "</option>"; ?>
		<?php } ?>
          </select>     
      </div>
    </div>
      
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="dpto">Dpto</label>
      <div class="controls">
          <input type="text" name="dpto" placeholder="" class="input-xshort">
      </div>
    </div>
      
    <div class="control-group">
      <!-- Username -->
      <label class="control-label" for="postal">Codigo Postal</label>
      <div class="controls">
          <input type="number" name="postal" placeholder="" class="input-xshort">
      </div>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="loc">Localidad</label>
      <div class="controls">
          <select class="input-xshort" name="loc" >                        
                <?php foreach ($filaLoc as $slq): ?>
		<?php echo "<option value='". $slq['idLocalidad']. "'>". $slq['nombreLoc']." </option>"; ?>
		<?php endforeach; ?>
          </select> 
      </div>
    </div>  
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="iva">Iva</label>
      <div class="controls">
          <select class="input-xshort" name="iva" >                       
                <?php foreach ($filaIva as $slq1): ?>
		<?php echo "<option value='". $slq1['idIva']. "'>". $slq1['descripIva']." </option>"; ?>
		<?php endforeach; ?>
          </select> 
      </div>
    </div>   
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
          <button name="btnRegistrar" class="btn btn-success" type="submit">Registrar</button>
      </div>
     
    </div>
      
  </fieldset>
</form>
