<!DOCTYPE html>
<html lang="es">
<?php
	include_once 'header.php';
?>
<?php
include_once 'conexion.php'; 


$orden= "Select isbn, titulo, autor, fecha_alta from libros";


$resultado=$conn->query($orden);

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
          <h1>Libro Añadido</h1>
        </div>
      </div>
    </div>
    
<?php
  include_once 'footer.php';
?>      
