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
                width: 400px;
                position: absolute;
                left: 50%;
                top: 50%;
                margin-left: -200px;
                margin-top: -180px;
            }
            .error{
                color: #d8000c;
                background-color: #ffbaba;
                border-color: #d8000c;
                clear: both;	
                height:18px;
                border-width: 1px;
                border-style: solid;
                margin-right:-4px;
                padding: 0px;
                background-repeat: no-repeat;
                background-position: 0px 50%;
                text-align: left;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                padding-left: 5px;
            }
            .box-info, .box-success, .box-alert, .box-error{
                clear: both;
                border-width: 1px;
                border-style: solid;
                margin: 0px;
                padding: 0px;
                background-repeat: no-repeat;
                background-position: 0px 50%;
                text-align: left;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
            }
            .box-info {
                color: #00529b;
                background-color: #bde5f8;
                border-color: #00529b;
            }
            .box-success {
                color: #4f8a10;
                background-color: #dff2bf;
                border-color: #4f8a10;
            }
            .box-alert {
                color: #9f6000;
                background-color: #feefb3;
                border-color: #9f6000;
            }
            .box-error {
                color: #d8000c;
                background-color: #ffbaba;
                border-color: #d8000c;
            }
        </style>
        <script type="text/javascript">
            var data = 'mypage';
            $(function () {
                $('#loginsys').click(function () {
                    $("#msgrpta").show();
                    setTimeout(function () {
                        $("#msgrpta").hide();
                    }, 3000);
//                    //window.location.href = data;
//                    $('#msgrpta').html('<div class="box-success"></div>');
//                    $('.box-success').hide(0).html('Un momento por favor,Estamos cargando...');
//                    $('.box-success').slideDown(1000);
//                    setTimeout(function () {
//                        //window.location.href = ".";
//                        //$("#enter").attr("disabled", true);
//                        //alert("ok")
//                        //completa(".");
//                    }, (1000 + 800));
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