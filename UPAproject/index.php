<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UPA</title>
        <?php
        $cad = 'cp/';
        include './cp/view/plugins.php';
        ?>
        <link rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            var data = 'mypage';
            $(function () {
                $('#loginsys').click(function () {
                    $("#msgrpta").show();
                    setTimeout(function () {
                        $("#msgrpta").hide();
                    }, 3000);
                    $('#msgrpta').html('<div class="error"></div>');
                    $('.error').hide(0).html('Los campos estan vacios');
                    $('.error').slideDown(1000);
                });
            });
            
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="easyui-panel" title="Acceso al Sistema"  data-options="iconCls:'icon-lock'"style="width:100%;padding:30px 70px 20px 70px">
                <div style="margin-bottom:10px">
                    <input class="easyui-textbox" style="width:100%;height:40px;padding:12px" data-options="prompt:'Nombre de Usuario',iconCls:'icon-man',iconWidth:38">
                </div>
                <div style="margin-bottom:10px">
                    <input class="easyui-textbox" type="password" style="width:100%;height:40px;padding:12px" data-options="prompt:'Contraseña',iconCls:'icon-lock',iconWidth:38">
                </div>
                <div style="margin-bottom:10px;">
                    <div id="msgrpta"></div>
                </div>
                <div style="text-align: right;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" id="loginsys" data-options="iconCls:'icon-ok'" style="padding:5px 0px;width:100px;">
                        <span style="font-size:14px;">Ingresar</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>