<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE>
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


  <div class='row'>
        	<div class='col-xs-10 col-xs-offset-1 text-center'>
        	  <h3>Se ha cerrado la sesion</h3>
       	    </div>
   </div>
</div>
</main>
 <script>
//Script para redirigir a index.php tras 4 segundos
setTimeout(function(){ window.location="<?= 'login.php' ?>"; }, 4000); 
</script>
    
<?php
  include_once 'footer.php';
?>      

