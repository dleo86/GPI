<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <section class="main">
		<div class="wrapp">
			<?php //include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>USUARIOS</h2>
					</div>
                                    <form action="../../controlador/usuarioController.php?action=insert" method = "post" enctype="multipart/form-data">
                            <h2>REGISTRAR USUARIOS</h2><br/>
                            <label class="warning">* Campos obligatorios</label><br/>
                            <input required type="text" name="usuario"placeholder="Usuario" autofocus/><label class="warning">*</label><br/>
                            <input required type="password" name="password" placeholder="Contraseña" /><label class="warning">*</label><br/>
                            <input required type="password" name="password2" placeholder="Repita su contraseña" /><label class="warning">*</label><br/>
                            <input required type="text" name="nombre" placeholder="Nombre:"><label class="warning">*</label><br/>
                            <input required type="text" name="apellido" placeholder="Apellido:"><label class="warning">*</label><br/>
                            <label>Fecha de Nacimiento</label><br/>
                            <input required type="date" name="fechaNac" placeholder="Fecha de Nacimiento:"><label class="warning">*</label><br/>
                            <input required type="number" name="dni" placeholder="DNI:"><label class="warning">*</label><br/>
                            <input type="email" name="correo" placeholder="Correo:"><br/>
                            <input type="number" name="telefono" placeholder="Teléfono:"><br/>
                            <label>DOMICILIO</label><br/>
                            <input required type="text" name="calle" placeholder="Calle:"><label class="warning">*</label><br/>
                            <input required type="number" name="numero" placeholder="Número:"><label class="warning">*</label><br/>
                            <label>PISO (El valor 0 equivale a planta baja)</label><br>
                            <select name="piso">  
                            <?php for($piso = 0; $piso < 55; $piso++){ ?>
                            <?php echo "<option value='". $piso. "'>". $piso . "</option>"; ?>
                            <?php } ?>
                            </select><label class="warning">*</label><br/>
                            <input type="text" name="departamento" placeholder="Departamento:"><br/>
                            <input required type="number" name="codPostal" placeholder="Código Postal:"><label class="warning">*</label><br/>
                            <select required name="roll"><br/>
                                <option value="admin">Admin</option>
                                <option value="Limitado">Limitado</option>
                            </select><label class="warning">*</label><br/>
                            <label>CIUDAD</label><br/>
                            <select  name="loc">  
                            <?php //foreach ($loc as $Sql1): ?>
                            <?php //echo "<option value='". $Sql1['idLocalidad']. "'>". utf8_encode($Sql1['nombre']). "</option>"; ?>
                            <?php //endforeach; ?>
                            </select><label class="warning">*</label><br/>
                            <a href="localidades.php"class="agregar">Ver Localidades</a><br/>
                            <br><label>FECHA DE INGRESO</label><br/>
                            <input required type="date" name="ingreso" placeholder="Fecha de ingreso:" /><label class="warning">*</label><br/>
                            <input type="submit" value="Registrar" /><br/><br>
                            <a class="btn-regresar" href="../../controlador/usuarioController.php?action=insert">Registrar</a><br/>
                            <?php // if(!empty($errores)): ?>
                              <ul>
                                  <?php// echo $errores; ?>
                              </ul>
                            <?php//  endif; ?>
                            
                            </form>	
                                    <a class="btn-regresar" href="login.php">Regresar</a><br/>
				</article>
	</section>
    </body>
</html>
