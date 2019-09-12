function mostrarError(elementoError){
  elementoError.style.display="block";
}

function ocultarError(elementoError){
  elementoError.style.display="none";
}

function comprobarCadena(cadena, minimo, maximo){
var ok=true;
var longitud=cadena.length;
if(longitud<minimo||longitud>maximo)
  ok=false;
return ok;
}

function comprobarObligatorio(valor){
  var ok=false;
  if(valor!=""){
    ok=true;
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

