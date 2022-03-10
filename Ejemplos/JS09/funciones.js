addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
  var ob=document.getElementById('boton1');
  addEvent(ob,'click',presionBoton,false);
}

function presionBoton(e)
{
  var cadena="{ 'microprocesador':'pentium'," +
             "  'memoria':1024," +
             "  'discos':[80,250]" +
             " }";
  var maquina=eval('(' + cadena + ')');
  alert('microprocesador:'+maquina.microprocesador);
  alert('Memoria ram:'+maquina.memoria);
  alert('Capacidad disco 1:'+maquina.discos[0]);
  alert('Capacidad disco 2:'+maquina.discos[1]);
}

//***************************************
//Funciones comunes a todos los problemas
//***************************************
function addEvent(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else  
    if (elemento.addEventListener)
    {
      elemento.addEventListener(nomevento,funcion,captura);
      return true;
    }
    else
      return false;
}