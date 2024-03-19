const reloj = document.querySelector('.reloj');

function conversionFecha() {/* aaaa-dd-mm validar */
    let vFecha = new Date();
    let dia = [
      "Domingo",
      "Lunes",
      "Martes",
      "Miercoles",
      "Jueves",
      "Viernes",
      "Sabado",
    ];
    let mes = [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ];
    return dia[vFecha.getUTCDay()] + " " + (vFecha.getUTCDate()) + " de " + mes[vFecha.getUTCMonth()] + " de " + vFecha.getUTCFullYear();
  }
  
function conversionHora (hora){
    let vHora = hora.split(":");
    let nFHora;
    if(vHora[0] >= 0 && vHora[0] < 12){
        vHora[0] = (vHora[0] == 0)? '12' : vHora[0];  
        nFHora = (vHora[1] < 10)? vHora[0] + ":0" + vHora[1] + " A.M." : vHora[0] + ":" + vHora[1] + " A.M.";
    } else {
        nFHora = (vHora[1] < 10)? (vHora[0] - 12)  + ":0" + vHora[1] + " P.M." : (vHora[0] - 12)  + ":" + vHora[1] + " P.M.";
    }
    return nFHora;
}

function fechaActual(){
    let vFecha = new Date();
    let hour = vFecha.getHours();
    let minutes = vFecha.getMinutes();
    let cHour = hour +":"+minutes;
    let fecha = conversionFecha();
    let hora = conversionHora(cHour);
    reloj.innerHTML = fecha +" "+ hora;
    setTimeout("fechaActual()",1000);
}