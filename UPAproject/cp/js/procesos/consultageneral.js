var contenido = null;
function cargapag() {
    $('#dd').dialog({
        title: 'Consulta de Personas',
        width: 400,
        height: 200,
        closed: false,
        cache: false,
        href: '../general/consultapersona_1.php',
        modal: false,
        buttons: [{
                text: 'Aceptar',
                iconCls: 'icon-ok',
                handler: function () {
                    var row = $('#tbLista').datagrid('getSelected');
                    if (row) {
                        contenido = row.id;
                        $('#dd').dialog('close');
                    } else {
                        alertmsg('Debe seleccionar una fila');
                    }
                }
            }]

    });
}