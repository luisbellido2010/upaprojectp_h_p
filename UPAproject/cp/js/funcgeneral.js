//PARA MENSAJES
var msgtitle = "Mensaje del Sistema";
function info(msg) {
    $.messager.alert(msgtitle, msg, 'info');
}
function error(msg) {
    $.messager.alert(msgtitle, msg, 'error');
}
function warning(msg) {
    $.messager.alert(msgtitle, msg, 'warning');
}
function alertmsg(msg) {
    $.messager.alert(msgtitle, msg);
}

//PARA CALENDARIOS
function fechaactual() {
    return (new Date().toString('dd/MM/yyyy'));
}
function myformatter(date) {
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    var d = date.getDate();
    return (d < 10 ? ('0' + d) : d) + '/' + (m < 10 ? ('0' + m) : m) + '/' + y;
}
function myparser(s) {
    if (!s)
        return new Date();
    var ss = (s.split('/'));
    var y = parseInt(ss[0], 10);
    var m = parseInt(ss[1], 10);
    var d = parseInt(ss[2], 10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)) {
        return new Date(d, m - 1, y);
    } else {
        return new Date();
    }
}

/*----------Funcion para obtener la edad------------*/
function calcular_edad(fecha) {
    var fechaActual = new Date()
    var diaActual = fechaActual.getDate();
    var mmActual = fechaActual.getMonth() + 1;
    var yyyyActual = fechaActual.getFullYear();
    FechaNac = fecha.split("/");
    var diaCumple = FechaNac[0];
    var mmCumple = FechaNac[1];
    var yyyyCumple = FechaNac[2];
    if (mmCumple.substr(0, 1) == 0) {
        mmCumple = mmCumple.substring(1, 2);
    }
    if (diaCumple.substr(0, 1) == 0) {
        diaCumple = diaCumple.substring(1, 2);
    }
    var edad = yyyyActual - yyyyCumple;
    if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
        edad--;
    }
    return edad;
}