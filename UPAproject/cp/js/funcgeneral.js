var msgtitle="Mensaje del Sistema";
function info(msg){
    $.messager.alert(msgtitle,msg,'info');
}
function error(msg){
    $.messager.alert(msgtitle,msg,'error');
}
function warning(msg){
    $.messager.alert(msgtitle,msg,'warning');
}
function alertmsg(msg){
    $.messager.alert(msgtitle,msg);
}