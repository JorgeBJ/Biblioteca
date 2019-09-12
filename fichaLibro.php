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
	$orden= "SELECT id, descripcion from generos";

	$resultado=$conn->query($orden);
	$generos = array();
	// Si existen datos
	if (isset($resultado->num_rows) > 0) {	
		while($fila = $resultado->fetch_assoc()) {
			$generos[$fila["id"]]= $fila["descripcion"];
		}
	}	
?>

 <body>
	<main>
      <div class="container">
<?php
	include_once 'titulo.php';
?>

<?php
$autor=""; 
$genero="";
$titulo="";
$argumento="";
$editorial="";
$edicion="";
$fecha="";


if($_GET["mod"]=="n"){
	$opcion="Añadir Libro";
	$salida="grabarLibro.php";
}
else {
	$opcion="Modificar libro";
	$salida="modificarLibro.php";
	//Debo recuperar los datos del libro además de los generos que hay en la BBDD que ya recuperé
	$orden= "SELECT autor, titulo, genero, DATE_FORMAT(fecha_alta,'%d-%m-%Y') as fecha , edicion, editorial, argumento from libros where isbn = '".$_GET["isbn"]."'";

	$resultado=$conn->query($orden);

	if (isset($resultado->num_rows) > 0) {	
		while($fila = $resultado->fetch_assoc()) {
			$autor= $fila["autor"];
		    //	echo $autor;
			$genero=$fila["genero"];
			//	echo $genero;
			$titulo=$fila["titulo"];
			//	echo $titulo;
			$argumento=$fila["argumento"];
			//	echo $argumento;
			$editorial=$fila["editorial"];
			//	echo $editorial;
			$edicion=$fila["edicion"];
			//	echo $edicion;
			$fecha=$fila["fecha"];
		}
	}

}
?>
  <div class='row'>
        	<div class='col-xs-10 col-xs-offset-1 text-center'>
        	  <h1><?php echo $opcion?></h1>
       	    </div>
   </div>
      <form class="form col-xs-8 col-xs-offset-2" action="<?php echo $salida ?>" method="post">
          <div class="row"> 
          	 <div class="form-group col-xs-12">
                <div class="input-group">
                   <span class="input-group-addon" id="addon-ISBN">ISBN*</span>
                     <input  <?php if($_GET["mod"]=="m") echo "READONLY value='".$_GET["isbn"]."' "?>type="text" class="form-control" id="isbn" name="isbn" aria-describedby="addon-ISBN"
                     onblur="comprobarObligatorioInline(this, errorISBN), comprobarCadenaInline(this, errorISBNLongitud, 12, 14), comprobarISBN(this.value)"> 
                </div>
                <p class="bg-danger text-danger="id="errorISBNBBDD"></p>
                <p class="error bg-danger text-danger" id="errorISBN">El ISBN es obligatorio</p>
                <p class="error bg-danger text-danger" id="errorISBNLongitud">EL ISBN debe tener 13 caracteres</p>
              </div>
          </div>

         <div class="row"> 
          	 <div class="form-group col-xs-12">
                <div class="input-group">
                   <span class="input-group-addon" id="addon-autor">Autor*</span>
                     <input type="text" <?php echo "value='".$autor."'"?> class="form-control" id="autor" name="autor" aria-describedby="addon-autor"
                     onblur="comprobarObligatorioInline(this, errorAutor), comprobarCadenaInline(this, errorAutorLongitud, 0, 100)">
                </div>
                <p class="error bg-danger text-danger" id="errorAutor">El autor es obligatorio</p>
                <p class="error bg-danger text-danger" id="errorAutorLongitud">EL autor debe tener 100 caracteres como máximo</p>
              </div>
          </div>

          <div class="row"> 
          	 <div class="form-group col-xs-12">
                <div class="input-group">
                   <span class="input-group-addon" id="addon-titulo">Título*</span>
                     <input type="text" <?php echo "value='".$titulo."'"?>class="form-control" id="titulo" name="titulo" aria-describedby="addon-titulo"
                     onblur="comprobarObligatorioInline(this, errorTitulo), comprobarCadenaInline(this, errorTituloLongitud, 0, 100)">
                </div>
                <p class="error bg-danger text-danger" id="errorTitulo">El Titulo es obligatorio</p>
                <p class="error bg-danger text-danger" id="errorTituloLongitud">EL Titulo debe tener 150 caracteres como máximo</p>
              </div>
          </div>

          <div class="row"> 
          	 <div class="form-group col-xs-6">
                <div class="input-group">
                   <span class="input-group-addon"
                   id="addon-fecha">Fecha de alta*</span>
                     <input type="text"  <?php echo "value='".$fecha."'"?> class="form-control" id="fecha" name="fecha" aria-describedby="addon-fecha" placeholder="dd-mm-yyyy"
                     onblur="comprobarObligatorioInline(this, errorFecha), comprobarFechaInline(this,errorFechaValida, errorFechaFormato)">
                </div>
                <p class="error bg-danger text-danger" id="errorFecha">La fecha de alta es obligatoria</p>
                <p class="error bg-danger text-danger" id="errorFechaValida">La fecha de alta no es valida.</p>
                <p class="error bg-danger text-danger" id="errorFechaFormato">Formato de fecha no válido</p>


              </div>

          	 <div class="form-group col-xs-6">
                <div class="input-group">
                   <span class="input-group-addon" id="addon-editorial">Editorial*</span>
                     <input type="text"  <?php echo "value='".$editorial."'"?> class="form-control" id="editorial" name="editorial" aria-describedby="addon-editorial"
                     onblur="comprobarObligatorioInline(this, errorEditorial), comprobarCadenaInline(this, errorEditorialLongitud, 0, 100)">
                </div>
                <p class="error bg-danger text-danger" id="errorEditorial">La editorial es obligatoria</p>
                <p class="error bg-danger text-danger" id="errorEditorialLongitud">La editorial debe tener 100 caracteres como máximo</p>

              </div>
          </div>
          <div class="row"> 
          	 <div class="form-group col-xs-6">
                <div class="input-group">
                   <span class="input-group-addon" 
                   id="addon-edicion">Edición*</span>
                     <input type="text"   <?php echo "value='".$edicion."'"?> class="form-control" id="edicion" name="edicion" aria-describedby="addon-edicion"
                     onblur="comprobarObligatorioInline(this, errorEdicion), comprobarCadenaInline(this, errorEdicion, 0, 30)">
                </div>
                <p class="error bg-danger text-danger" id="errorEdicion">La edición es obligatoria</p>
                <p class="error bg-danger text-danger" id="errorEdicionLongitud">La edición debe tener 30 caracteres como máximo</p>

              </div>

          	  <div class="form-group col-md-6">
               <div class="input-group">
                  <span class="input-group-addon" id="addon-genero">Género</span>
                  <select class="form-control" id="genero" name="genero" aria-describedby="addon-genero" onblur="comprobarSelectInline(this, errorGenero)">
                 <?php
                 	echo "<option value='0'>Seleccionar una opcion</option>";
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
                <p class="error bg-danger text-danger" id="errorGenero">Debe seleccionarse un género<p>
              </div>
          </div>

          <div class="row">
                <div class="form-group col-xs-12">
                  <div class="input-group">
                  	<span class="input-group-addon" 
                  	id="addon-argumento">Argumento</span>
                    <textarea class="form-control"  rows="4" cols="120" id="argumento" name="argumento" aria-describedby="addon-argumento" placeholder="" onblur="comprobarObligatorioInline(this, errorArgumento), comprobarCadenaInline(this, errorArgumento, 0, 200)"><?php echo $argumento?> </textarea>
                  </div>
                  <p class="error bg-danger text-danger" id="errorArgumento">Este campo no puede tener más de 200 caracteres<p>

                </div>
              </div>	

      <button type="submit" class="btn btn-default btn-block"
         onclick="return validar()"><?php echo $opcion?></button>    
      </form>
      </div>
    </main>  
 </body> 


<?php
	include_once 'footer.php';
?>
