<!DOCTYPE html>
<html lang="es">
<?php
	include_once 'header.php';
?>
<?php
include_once 'conexion.php'; 


$isbn= $_POST["isbn"];
$titulo=$_POST["titulo"];
$autor=$_POST["autor"];
$fecha=$_POST["fecha"];
$generoID=$_POST["genero"];
$generoDescripcion="";
$argumento=$_POST["argumento"];
$editorial=$_POST["editorial"];
$edicion=$_POST["edicion"];

$orden= "UPDATE libros SET titulo='".$titulo."' , autor='".$autor."' , fecha_alta= STR_TO_DATE('".$fecha."', '%d-%m-%Y'), editorial='".$editorial."', genero ='".$generoID."' , edicion='".$edicion."' , argumento='".$argumento."' WHERE ISBN='".$isbn."'"; 

$resultado=$conn->query($orden);

if ($resultado === TRUE) {
    $mensaje="<h1>Libro modificado</h1>";
} else {
    $mensaje="<h1>No se ha podido modificar el libro: </h1><p>" . $conn->error."</p>";
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

