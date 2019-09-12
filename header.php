  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Biblioteca</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/estilos.css" rel="stylesheet"/>
    <script src=js/3.3.1-jquery.min.js></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/javaScript.js"></script>
     <script type="text/javascript">
      function comprobarObligatorioInline(elemento, elementoError){
          var valor=elemento.value;
          var ok=comprobarObligatorio(valor);

          if(!ok){
            mostrarError(elementoError);
          }
          else {
            ocultarError(elementoError);
          }
          return ok;
      }

      function validarEmailInline(elemento, elementoError, min, max){
        var email=elemento.value;


        var ok=comprobarCadena(email, min, max);

        if(!ok){
          mostrarError(elementoError);
        }
        else{
          ok=validarEmail(email);
          if(!ok){
            mostrarError(elementoError);
          }
          else{
            ocultarError(elementoError);
          }
        }
        return ok;
    }

    function comprobarCadenaInline(elemento, elementoError, min, max){
      var cadena= elemento.value;
      var ok=comprobarCadena(cadena, min, max);

      if(!ok){
          mostrarError(elementoError);
        }
      else {
          ocultarError(elementoError);
      }
      return ok;
    }

    function comprobarISBN(cadena) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if(this.responseText==1){
             document.getElementById("errorISBNBBDD").innerHTML = "El ISBN ya existe en la base de datos";
            }
            else{
             document.getElementById("errorISBNBBDD").innerHTML = "";
            }
          }
        };
        xmlhttp.open("GET", "pruebaAJAX.php?numero="+cadena, true);
        xmlhttp.send();
    }

    function comprobarSelectInline(elemento, elementoError){
      var ok=true;
      if(elemento.value==0){
        ok=false;
        mostrarError(elementoError);
     }
     else{
        ocultarError(elementoError);
     }
     return ok;
    }
    function comprobarFechaInline(elemento, elementoErrorFecha,elementoErrorFormato){
    var fecha=elemento.value;
    var ok=false;
    var re=/^(\d{2})(\-)(\d{2})(\-)\d{4}$/;
    if (re.test(fecha)){
      ocultarError(elementoErrorFormato);
      var arrayFecha=fecha.split("-");
      var dia=parseInt(arrayFecha[0]);
      var mes=parseInt(arrayFecha[1]);
      var ano=parseInt(arrayFecha[2]);
      ok=comprobarFecha(dia,mes,ano);
      if(!ok){
          mostrarError(elementoErrorFecha);
      }
      else {
        //Si la fecha es correcta 
        ocultarError(elementoErrorFecha);
        ocultarError(elementoErrorFormato);

      }
    }
    else{
      mostrarError(elementoErrorFormato);
    }
    return ok;
  }
  function comprobarFecha(dia, mes, ano){
  var ok=false;
  //dd/mm/aaaa

    switch (mes) {
    case 01:
    case 03:
    case 05:
    case 07:
    case 08:
    case 10:
    case 12:
      if (dia<=31){
          var ok=true;
      }
      break;
    case 04: case 06:case 09:case 11:
      if (dia<=30){
        var ok=true;
      }
      break;
    case 02:
      if (ano%4==0){
        if(ano%100==0){
          if(ano5400==0){
            if (dia<=29){
              var ok=true;
            }
          }
          else
          if (dia<=28){
            var ok=true;
          }
        }
        if (dia<=29){
          var ok=true;
        }
      }
      else {
        if (dia<=28){
          var ok=true;
        }
      }
      break;
    }
  return ok;
}


  function validar(){
    var todoOK=true;
    //ISBN
    var elemento=document.getElementById("isbn");
    var elementoError=document.getElementById("errorISBN");
    if(!comprobarObligatorioInline(elemento, elementoError)){
      todoOK=false;
    }
    else{
      elementoError=document.getElementById("errorISBNLongitud");
      if(!comprobarCadenaInline(elemento, elementoError, 12, 14)){
        todoOK=false;
      }
    }
       //autor
    var elemento=document.getElementById("autor");
    var elementoError=document.getElementById("errorAutor");
    if(!comprobarObligatorioInline(elemento, elementoError)){
      todoOK=false;
    }
    else{
      elementoError=document.getElementById("errorAutorLongitud");
      if(!comprobarCadenaInline(elemento, elementoError, 0, 150)){
        todoOK=false;
      }
    }
    //Titulo
    var elemento=document.getElementById("titulo");
    var elementoError=document.getElementById("errorTitulo");
    if(!comprobarObligatorioInline(elemento, elementoError)){
      todoOK=false;
    }
    else{
      elementoError=document.getElementById("errorTituloLongitud");
      if(!comprobarCadenaInline(elemento, elementoError, 0, 150)){
        todoOK=false;
      }
    }
     //Editorial
    var elemento=document.getElementById("editorial");
    var elementoError=document.getElementById("errorEditorial");
    if(!comprobarObligatorioInline(elemento, elementoError)){
      todoOK=false;
    }
    else{
      elementoError=document.getElementById("errorEditorialLongitud");
      if(!comprobarCadenaInline(elemento, elementoError, 0, 100)){
        todoOK=false;
      }
    }
    //Edicion
    var elemento=document.getElementById("edicion");
    var elementoError=document.getElementById("errorEdicion");
    if(!comprobarObligatorioInline(elemento, elementoError)){
      todoOK=false;
    }
    else{
      elementoError=document.getElementById("errorEdicionLongitud");
      if(!comprobarCadenaInline(elemento, elementoError, 0, 30)){
        todoOK=false;
      }
    }

    //Género
    var elemento=document.getElementById("genero");
    var elementoError=document.getElementById("errorGenero");
    if(!comprobarSelectInline(elemento, elementoError)){
      todoOK=false;
    }
    //fecha
    var elemento=document.getElementById("fecha");
    var elementoError=document.getElementById("errorFecha");
    var elementoErrorValida=document.getElementById("errorFechaValida");
    var elementoErrorFormato=document.getElementById("errorFechaFormato");
    if(!comprobarFechaInline(elemento, errorFechaValida, errorFechaFormato)){
      todoOK=false;
    }

    return todoOK;
  }

    
</script>
  </head>  