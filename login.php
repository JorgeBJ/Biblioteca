<!DOCTYPE html>
<html lang="es">
<?php
	include_once 'header.php';
?>

  <body>
	<main>
    <div class="container">
<?php
	include_once 'titulo.php';
?>
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-center">
         Iniciar sesión
        </div>
      </div>
      <form class="form col-xs-8 col-xs-offset-2" action="acceder.php" method="post">
       <div class="form-group col-xs-6">
         <div class="input-group">
              <span class="input-group-addon"
                   id="addon-usuario">Usuario</span>
                     <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="addon-usuario">
                </div>
          
       </div>
       <div class="form-group col-xs-6">
         <div class="input-group">
              <span class="input-group-addon"
                   id="addon-pass">Contraseña</span>
                     <input type="password" class="form-control" id="pass" name="pass" aria-describedby="addon-pass">
                </div>
       </div>

      <div class="form-group col-xs-10 col-xs-offset-1">
        <button type="submit" class="btn btn-default btn-block"
           >Acceder</button>  
       </div>    
    </form>
  </div>   
</main>

    
<?php
  include_once 'footer.php';
?>      