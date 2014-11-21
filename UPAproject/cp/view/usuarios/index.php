<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Roles</title>
        <?php include '../plugins.php'; ?>
        <script src="../../js/procesos/consultageneral.js"></script>
        <script type="text/javascript">
            $(function () {
                //cargapag();
            });
        </script>
    </head>
    <body>
        <div id="contenedor">
            <div id="cabecera">
                <center>
                    <h2>Mantenimiento Básico - USUARIOS</h2>
                </center>
            </div>
            <div style="clear: both;"></div>
            <div id="contenido">
                <div id="p" class="easyui-panel" title="LISTA DE USUARIOS" 
                     style="width:100%;height:150px;padding:0px;"
                     data-options="href:'../general/consultapersona.php'">
                </div>
                <p>
                    <input type="button" id="btn" value="Buscar Usuarios" onclick="cargapag();">
                    <input type="button" id="btn" value="Ver contenido" onclick="alert(contenido)">
                </p>
                <p style="text-align: center;">
                    <a href="../../index.php">Retornar</a>
                </p>
                <div id="dd"></div>
            </div>
        </div>
    </body>
</html>
