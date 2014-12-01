<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SEMAFORO</title>
        <script type="text/javascript">
            function cambiacolor(objeto, color) {
                objeto.bgColor=color;
            }
        </script>
    </head>
    <body>
        <div>
            <div id="div1" style="float: left; width: 60px; height: 50px; background-color: #000000;" 
                 onmouseover="this.style.background='gray';" onmouseout="this.style.background='#000000';" ></div>
<!--            <div id="div2" style="float: left; width: 60px; height: 50px; background-color: #003147"
                 onmouseover="cambiacolor(this, '#0052A3')" onmouseout="cambiacolor(this, '#ccffcc')"></div>
            <div id="div3" style="float: left; width: 60px; height: 50px; background-color: #00ee00" 
                 onmouseover="cambiacolor(this, '#0088CC')" onmouseout="cambiacolor(this, '#ff0033')"></div>
            <div style="background-color: #1f1f1f"></div>-->
        </div>
    </body>
</html>
