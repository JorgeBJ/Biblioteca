
<?php
function recuperarGeneros(){
	$orden= "SELECT id, descripcion from generos";

	$resultado=$conn->query($orden);
	// Si existen datos
	if (isset($resultado->num_rows) > 0) {	
		
		while($fila = $resultado->fetch_assoc()) {
			echo $fila["descripcion"];
		}
	}		

	return $resultado;
}

?>