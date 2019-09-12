<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<?php
	include_once 'header.php';
?>
<?php
include_once 'conexion.php'; 

$usuario=$_POST["usuario"];

$pass=$_POST["pass"];

$orden= "select email, tipo from usuarios where email='".$usuario."' AND password='".$pass."'";


$resultado=$conn->query($orden);


if ($resultado->num_rows > 0) {
    $mensaje="<h1>Usuario Correcto</h1>";
    $datosUsuario= $resultado->fetch_assoc();
    $_SESSION["usuario"]=$datosUsuario["email"];
    $_SESSION["tipo"]=$datosUsuario["tipo"];


} else {
    $mensaje="<h1>El usuario no existe</h1><p>" . $conn->error."</p>";
    
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
      	<?php
	echo $mensaje;
?>
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
