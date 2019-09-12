<?php
include_once 'conexion.php'; 
$ISBNrecibido=$_GET["numero"];
$numeroFilas=-1;

$orden= "select '1' from libros where ISBN=".$ISBNrecibido;


$resultado=$conn->query($orden);

if ($resultado->num_rows > 0)
    $numeroFilas=1;
echo $numeroFilas;
?>