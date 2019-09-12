<!DOCTYPE html>
<html lang="es">
<?php
	include_once 'header.php';
?>
<?php
include_once 'conexion.php'; 

$isbn= $_POST["isbn"];


$orden= "DELETE FROM libros WHERE isbn='".$isbn."'";


$resultado=$conn->query($orden);

if ($resultado === TRUE) {
    $mensaje="<h1>Libro borrado</h1>";
} else {
    $mensaje="<h1>No se ha podido borrar el libro: </h1><p>" . $conn->error."</p>";
}


$conn->close();
?>

  <body>
	<main>
    <div class="container">
<?php
	include_once 'titulo.php';
?>
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 text-center">
         <?php echo $mensaje ?>
        </div>
      </div>
    </div>

<script>
  //Script para redirigir a index.php tras 4 segundos
setTimeout(function(){ window.location="<?= 'index.php' ?>"; }, 4000); 
</script>
    
<?php
  include_once 'footer.php';
?>      
