<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Roles</title>
        <?php include '../plugins.php'; ?>
        <script type="text/javascript">
            $(function () {
                frmRol();
                CargarLista();
            });
            function CargarLista() {
                $('#tbLista').datagrid({
                    title: 'Control de Roles',
                    toolbar: '#toolbar',
                    rownumbers: true,
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
                    onDblClickRow: function () {
                        Editar();
                    },
                    onLoadError: function (XMLHttpRequest, textStatus, errorThrown) {
                        error("Error en el Servidor<br>Contacte con el Administrador de Sistema")
                    }
                });
                $('#tbLista').datagrid('getPanel').panel('panel').attr('tabindex', 1).bind('keypress', function (e) {
                    if (e.keyCode == 46) {
                        Eliminar();
                    }
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
            }
            function frmRol() {
                $('#divRol').dialog({
                    width: 300,
                    height: 170,
                    closed: true,
                    cache: false,
                    modal: true,
                    resizable: false,
                    buttons: [{
                            text: 'Guardar',
                            iconCls: 'icon-save',
                            handler: function () {
                                procesar();
                            }
                        }, {
                            text: 'Cancelar',
                            iconCls: 'icon-cancel',
                            handler: function () {
                                $('#divRol').dialog('close');
                            }
                        }]
                });
                $('#divRol').dialog('dialog').attr('tabIndex', -1).bind('keydown', function (e) {
                    if (e.keyCode == 27) {
                        $('#divRol').dialog('close');
                    }
                });
            }
            var url = null;
            function Agregar() {
                $('#divRol').dialog('open').dialog('setTitle', 'Nuevo Rol');
                $('#frmRol').form('clear');
                url = '../../../cn/nRoles/insertRol.php';
                $('#nombre').next().find('input').focus();
            }
            function Editar() {
                var row = $('#tbLista').datagrid('getSelected');
                if (row) {
                    $('#divRol').dialog('open').dialog('setTitle', 'Editar Rol');
                    $('#frmRol').form('load', row);
                    url = '../../../cn/nRoles/updateRol.php';
                    $('#nombre').next().find('input').focus();
                } else {
                    alertmsg('Debe seleccionar una fila');
                }
            }
            function eliminarol(idrol) {
                $.post('../../../cn/nRoles/deleteRol.php', {id: idrol}, function (result) {
                    if (result.success) {
                        $('#tbLista').datagrid('reload');
                    } else {
                        error(result.errorMsg);
                    }
                }, 'json');
            }
            function Eliminar() {
                var row = $('#tbLista').datagrid('getSelected');
                if (row) {
                    $.messager.confirm('Confirm', 'Esta seguro de eliminar el Rol seleccionado?', function (r) {
                        if (r) {
                            eliminarol(row.id);
                        }
                    });
                } else {
                    alertmsg('Debe seleccionar una fila');
                }
            }
            function procesar() {
                $('#frmRol').form('submit', {
                    url: url,
                    onSubmit: function (param) {
                        return $(this).form('enableValidation').form('validate');
                        ;
                    },
                    success: function (result) {
                        var result = eval('(' + result + ')');
                        if (result.errorMsg) {
                            error(result.errorMsg);
                        } else {
                            $('#divRol').dialog('close');
                            $('#tbLista').datagrid('reload');
                        }
                    }
                });
            }
        </script>
    </head>
    <body>
        <div id="contenedor">
            <div id="cabecera">
                <center>
                    <h2>Mantenimiento Básico - ROLES</h2>
                </center>
            </div>
            <div style="clear: both;"></div>
            <div id="contenido">
                <div style="margin: 0 auto; width: 500px;">
                    <table id="tbLista" style="width:400px;height:250px"></table>
                </div>
                <p>
                <center>
                    <a href="../../index.php">Retornar</a>
                </center>
                </p>

                <div id="toolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="Agregar()">Agregar</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="Editar()">Editar</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="Eliminar()">Eliminar</a>
                </div>
                
                <div id="divRol">
                    <form id="frmRol" method="post" data-options="novalidate:true" class="easyui-form">
                        <table cellpadding="5">
                            <tr>
                                <td>id:</td>
                                <td><input class="easyui-textbox" style="width:50px;height:22px;" name="id" id="id" readonly="true" /></td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td><input class="easyui-textbox" style="width:190px;height:22px;" maxlength="4" name="nombre" id="nombre" data-options="required:true,validType:'length[5,45]'" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
