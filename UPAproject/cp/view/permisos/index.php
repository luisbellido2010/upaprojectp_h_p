<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Permisos</title>
        <?php include '../plugins.php'; ?>
        <script type="text/javascript">
            $(function () {
                MostrarPermisos()
            });
            function MostrarPermisos() {
                $('#tt').tree({
                    url: '../../../cn/nPermisos/permisos.php',
                    method: 'get',
                    animate: true,
                    checkbox: true
                });
            }
        </script>
    </head>
    <body>
        <div class="easyui-panel" style="padding:5px">
            <ul id="tt" class="easyui-tree" ></ul>
        </div>
    </body>
</html>
