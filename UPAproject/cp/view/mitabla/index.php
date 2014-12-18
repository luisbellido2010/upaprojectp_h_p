<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ventas</title>
        <?php
        $cad = '../../';
        include '../plugins.php';
        ?>
        <script src="../../js/procesos/consultageneral.js"></script>

        <script type="text/javascript">
            $(function () {
                $('#dg').datagrid({
                    fitColumns: true,
                    singleSelect: true,
                    columns: [[
                            {field: 'code', title: 'Codigo', width: 100},
                            {field: 'name', title: 'Nombre', width: 250},
                            {field: 'price', title: 'Precio', width: 80, align: 'right'}
                        ]]
                });
            });
            function addrow(idtabla) {
                var existe = false;
                var rows = $('#dg').datagrid('getRows');
                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    if (contenido == row.code) {
                        existe = true;
                    }
                }
                if (!existe) {
                    $(idtabla).datagrid('insertRow', {
                        index: 0,
                        row: {
                            code: contenido,
                            name: descripcion,
                            price: Math.floor((Math.random() * 4) + 1)
                        }
                    });
                    $('#dd').dialog('close');
                } else {
                    alertmsg('El producto ya está en la Lista')
                }
            }

            function deleterow() {
                var row = $("#dg").datagrid("getSelected");
                if (row) {
                    var index = $("#dg").datagrid("getRowIndex", row);
                    $('#dg').datagrid('deleteRow', index);
                }
            }

            function recorretable() {
                $.ajax({
                    url: "getdata.php",
                    type: "POST",
                    data: {
                        'cab_fact': JSON.stringify({
                            "p_codfac": 'V0001',
                            "p_tipmod": 'SOL'
                        }),
                        'det_fact': JSON.stringify($('#dg').datagrid('getData'))
                    },
                    success: function () {
                        alert('OK');
                    },
                    error: function (result) {
                        alert(result)
                    }
                });

            }
        </script>
    </head>
    <body>
        <div id="dd"></div>
        <p>
            <input type="button" id="btnLst" value="Cargar Lista" onclick="cargapag()">
            <input type="button" id="btnRec" value="Ver Data" onclick="recorretable()">
            <input type="button" id="btnDel" value="Eliminar Fila" onclick="deleterow()">
        </p>
        <table id="dg"></table>
    </body>
</html>