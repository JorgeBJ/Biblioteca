
<?php
//Acceso a la Base de Datos
$serverName="localhost";
$userName="bibliotecario";
$pw="bibliotecario";
$db="biblioteca";

//Creacion de la conexion
$conn= new mysqli($serverName,$userName,$pw,$db);

//Comprobando la conexión
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
} 

?>