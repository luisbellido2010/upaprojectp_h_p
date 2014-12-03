<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <?php
        $cad = 'cp/';
        include './cp/view/plugins.php';
        ?>
        <style>
            .wrapper {
                background-color: #AAA;
                color: #000;
                /*height: 300px;*/
                width: 400px;
                position: absolute;
                left: 50%;
                top: 50%;
                margin-left: -200px;
                margin-top: -180px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="easyui-panel" title="Acceso al Sistema"  data-options="iconCls:'icon-lock'"style="width:100%;padding:30px 70px 20px 70px">
                <div style="margin-bottom:10px">
                    <input class="easyui-textbox" style="width:100%;height:40px;padding:12px" data-options="prompt:'Nombre de Usuario',iconCls:'icon-man',iconWidth:38">
                </div>
                <div style="margin-bottom:20px">
                    <input class="easyui-textbox" type="password" style="width:100%;height:40px;padding:12px" data-options="prompt:'Contraseña',iconCls:'icon-lock',iconWidth:38">
                </div>
                <div style="text-align: right;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="padding:5px 0px;width:100px;">
                        <span style="font-size:14px;">Ingresar</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
