<div>
    <script>
        $(function () {
            $('#tbLista').datagrid({
                rownumbers: false,
                remoteSort: false,
                nowrap: false,
                fitColumns: true,
                singleSelect: true,
                pagination: false,
                method: 'get',
                url: '../../../cn/nRoles/listRol.php',
                columns: [[
                        {field: 'id', title: 'C&oacute;digo', width: 50, sortable: true},
                        {field: 'nombre', title: 'Nombre', width: 250, sortable: true}
                    ]],
                onClickRow: function () {
                    var row = $('#tbLista').datagrid('getSelected');
                    contenido = row.id;
                    //alertmsg(contenido);
                    $('#dd').dialog('close');
                },
                onLoadError: function (XMLHttpRequest, textStatus, errorThrown) {
                    error("Error en el Servidor<br>Contacte con el Administrador de Sistema")
                }
            });
            $('#tbLista').datagrid('getPanel').panel('panel').attr('tabindex', 1).bind('keypress', function (e) {
                var selected = $("#tbLista").datagrid('getSelected');
                var index = $('#tbLista').datagrid('getRowIndex', selected);
                var evt = e.keyCode;
                if (evt == 38) {
                    $('#tbLista').datagrid('selectRow', selected ? index - 1 : 0);
                }
                if (evt == 40) {
                    $('#tbLista').datagrid('selectRow', selected ? index + 1 : 0);
                }
            });
        });
    </script>
    <table style="width:100%;height:100px;" id="tbLista"></table>
</div>
