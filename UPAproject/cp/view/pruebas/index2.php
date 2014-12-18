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

                var rows = $('#dg').datagrid('getRows');
                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    alert(row.code + ' - ' + row.name + ' - ' + row.price);
                }
                var newUsers = [];

                newUser = {};
                newUser['nome'] = 'alvaro';
                newUser['idade'] = '34';
                newUsers.push(JSON.stringify(newUser));

                newUser1 = {};
                newUser1['nome'] = 'bia';
                newUser1['idade'] = '7';
                newUsers.push(JSON.stringify(newUser1));
                newUser2 = {};
                newUser2['nome'] = 'alice';
                newUser2['idade'] = '2';
                newUsers.push(JSON.stringify(newUser2));
                $.ajax({
                    url: "getdata2.php",
                    type: "POST",
                    data: {
                        'newUsers[]': newUsers
                    },
                    success: function () {
                    },
                    error: function () {
                    }
                });

                var myarray = [];
                var myJSON = "";

                for (var i = 0; i < 10; i++) {

                    var item = {
                        "nome": i,
                        "idade": i
                    };

                    //myarray.push(item);
                    myarray.push(JSON.stringify(item));
                }

                //myJSON = JSON.stringify({myarray: myarray});


                var newUsers = [];
                newUser = {};
                newUser['nome'] = 'alvaro';
                newUser['idade'] = '34';
                newUsers.push(JSON.stringify(newUser));

                newUser1 = {};
                newUser1['nome'] = 'bia';
                newUser1['idade'] = '7';
                newUsers.push(JSON.stringify(newUser1));
                newUser2 = {};
                newUser2['nome'] = 'alice';
                newUser2['idade'] = '2';
                newUsers.push(JSON.stringify(newUser2));



//                //$.messager.alert("Almacenado de detalles exitoso y se insertaron  " + jsondata.detalle + " registros");
//                $.ajax({
//                    type: "POST",
//                    url: "getdata.php",
//                    data: {
//                        //registros: 'newUsdsasers'
//                        'registros[]': newUsers
//                    },
//                    //dataType: "json",
//                    success: function (jsondata) {
//                        alert(jsondata)
//                    },
//                    error: function (xhr, ajaxOptions, thrownError) {
//                        alert(xhr.status);
//                        alert(thrownError);
//                    },
//                    complete: function () {
//                        //EnviaDatos(2);
//                    }
//                });

            }
        </script>
    </head>
    <body>
        <div id="dd"></div>
        <p>
            <input type="button" id="btnLst" value="Cargar Lista" onclick="cargapag()">
<!--            <input type="button" id="btnCon" value="Ver contenido" onclick="alert(contenido)">
            <input type="button" id="btnAdd" value="Agregar Fila" onclick="addrow()">-->
            <input type="button" id="btnRec" value="Ver Data" onclick="recorretable()">
            <input type="button" id="btnDel" value="Eliminar Fila" onclick="deleterow()">
        </p>
        <table id="dg"></table>
    </body>
</html>