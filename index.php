<?php
include_once "comprobarSesion.php";
?>

<!DOCTYPE html>
<html lang="es">
<?php
	include_once 'header.php';
?>
<?php
include_once 'conexion.php'; 


if(isset($_POST["titulo"])){
  $titulo= $_POST["titulo"];
  $orden="Select isbn, titulo, autor, DATE_FORMAT(fecha_alta,'%d-%m-%Y') as fecha_alta from libros where titulo like '%".$titulo."%'";
}
else{
  $orden= "Select isbn, titulo, autor, DATE_FORMAT(fecha_alta,'%d-%m-%Y') as fecha_alta from libros";
}
if(isset($_GET["orden"])){

  $ordenacion=$_GET["orden"];

  if($ordenacion=="t"){
    $orden.=" order by titulo";
  }
  else if ($ordenacion=="a"){
    $orden.=" order by autor";
  }
  else if ( $ordenacion=="f"){
    $orden.= " order by fecha_alta";
  }

  if($_GET["tipo"]=="asc"){
    $orden.=" asc";
  }
  else{
    $orden.=" desc";
  }
}

if(isset($_POST["genero"])){
  $genero=$_POST["genero"];
  if($genero!=0)
  $orden= "SELECT isbn, titulo, autor, DATE_FORMAT(fecha_alta,'%d-%m-%Y') as fecha_alta from libros where genero=".$genero;
}
//echo $orden;
$resultado=$conn->query($orden);

//Recuperacion de los géneros:
  $orden= "SELECT id, descripcion from generos";

  $resul=$conn->query($orden);
  $generos = array();
  // Si existen datos
  if (isset($resul->num_rows) > 0) {  
    while($fila = $resul->fetch_assoc()) {
      $generos[$fila["id"]]= $fila["descripcion"];
    }
  } 

$conn->close();
?>


  <body>
	<main>
    <div class="row menuUsuario">
      <div class="col-xs-11 text-right">
        <p>Usuario: <?php echo $usuario ?></p>
      </div>
      <div class="col-xs-1"><a href="">   
        <a  href='logout.php'><span class='glyphicon glyphicon-off'></span></a>
      </div> 
    </div> 
      <div class="container">
<?php
	include_once 'titulo.php';
?>
        <div class="row">
        	<div class="col-xs-10 col-xs-offset-1 text-center">
        	<h1></h1>
       		</div>
       	</div>	
          <form class="form col-xs-10" action="index.php" method="post">
          <div class="row"> 
             <div class="form-group col-xs-6 col-md-4">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Titulo" aria-describedby="buscar" name="titulo"> 
                    <span class="fondo-azul input-group-addon" id="buscar">
                      <button type="submit">
                          <span class='glyphicon glyphicon-search'></span> 
                      </button>
                    </span>
                    <span class="fondo-azul input-group-addon" id="reiniciar">
                      <form action="index.php" method="post">
                        <button type="submit">
                          <span class='glyphicon glyphicon-refresh'></span> 
                       </button>
                    </form>
                    </span>
                </div>
             </div> 
             <div class='form-group col-xs-6 col-md-4 pull-right'>
                <div class="input-group">
                <span class="input-group-addon" id="addon-genero">Filtar por género</span>
                  <select class="form-control" id="genero" name="genero" aria-describedby="addon-genero"
                  onchange="this.form.submit()">
                 <?php
                  echo "<option value='0'>Mostrar todos</option>";
                    for($i = 1; $i <= count($generos); $i++) {
                      if($i==$genero){
                        echo "<option selected value='".$i."'>".$generos[$i]."</option>";
                       }
                       else {
                        echo "<option  value='".$i."'>".$generos[$i]."</option>";
                  }
                    }
                 ?>
                  </select>
                 </div> 
              </div> 
        <div class="row">
        	<div class="col-xs-12 mostrar">
        	<?php
	  	      	if (isset($resultado->num_rows) > 0) {	
	    		// Si existen datos
	  	      	$contador=0;	
	  	      	echo 
	  	      	"<table class='table' id='tablaLibros'>
                <thead>
                  <tr>
                    <th>ISBN</th>
                    <th>Título
                    <a href='index.php?orden=t&tipo=asc'><span class='glyphicon glyphicon-upload'></span></a>
                    <a href='index.php?orden=t&tipo=des'><span class='glyphicon glyphicon-download'></span></a></th>
                    </th>
                    <th>Autor
                    <a href='index.php?orden=a&tipo=asc'><span class='glyphicon glyphicon-upload'></span></a>
                    <a href='index.php?orden=a&tipo=des'><span class='glyphicon glyphicon-download'></span></a></th>
                    <th>Fecha
                    <a href='index.php?orden=f&tipo=asc'><span class='glyphicon glyphicon-upload'></span></a>
                    <a href='index.php?orden=f&tipo=des'><span class='glyphicon glyphicon-download'></span></a></th>
                </thead>";	
	   			while($fila = $resultado->fetch_assoc()) {
	        	echo 
	        	"<tr>".
	        	"<td>".$fila["isbn"]. "</td>
	        	 <td>" .$fila["titulo"]."</td>
             <td>".$fila["autor"]."</td>
             <td>".$fila["fecha_alta"]."</td>";
             if($tipo=="A"){
             echo "
	        	 <td>
	        	     <a href='borrarLibro.php?isbn=".$fila['isbn']."' class='btn btn-info btn-lg'
	        	     	 data-toggle='tooltip'
         				 data-placement='top'
         				 title='Borrar'>
         			 <span class='glyphicon glyphicon-trash'
         				 >
         			 </span>
         			 </a>
         		 </td>
         		 <td>
         		    <a href='fichaLibro.php?mod=m&isbn=".$fila["isbn"]."' class='btn btn-info btn-lg'
         		    	data-toggle='tooltip'
         		    	data-placement='top'
         		    	title='Modificar'>
         			<span class='glyphicon glyphicon-pencil' >

         			</span> 
        			</a>
	        	 </td>";
            }

	        	echo "</tr>";

	    		}
	    		echo "</table>";
				} else {
					//Si no hay datos
	    			echo "0 results";
				}
        	?>


        	</div>	
        </div>	
        <div class="row">
        	<div class="col-xs-4 col-xs-offset-5">
        	<a class="btn btn-info btn-large" name="anadirLibro"
        	href="fichaLibro.php?mod=n">Añadir Libro</a>
        	</div>
        </div>	
       </div>
    </main>  
  </body> 
  <script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });

  </script>   	
<?php
	include_once 'footer.php';
?>
