<?php

$ruc = '10411501235';
$sunat = file_get_contents('http://www.sunat.gob.pe/w/wapS01Alias?ruc=' . $ruc);

$busqueda = '<card title="Resultado" id="frstcard">';
$existe = strpos($sunat, $busqueda);
if ($existe === false) {
    echo "El RUC ingresado no existe.";
} else {
    //RECUPERAMOS LA RAZÓN SOCIAL
    $razonSocialExiste = strpos($sunat, "Ruc. </b> $ruc - ");
    $razonSocialExisteFin = strpos($sunat, "<small><b>Antiguo Ruc.</b><br/></small>");
    $razonSocial = substr($sunat, $razonSocialExiste + 24, ($razonSocialExisteFin - $razonSocialExiste - 46));
    //RECUPERAMOS LA DIRECCIÓN
    $direccionExiste = strpos($sunat, "<small><b>Direcci&#xF3;n.</b><br/>");
    $direccionExisteFin = strpos($sunat, "<small>Situaci&#xF3;n.<b>");
    $direccion = substr($sunat, $direccionExiste + 34, ($direccionExisteFin - $direccionExiste - 55));

    echo 'RUC: ' . $ruc . ' <br> ';
    echo 'Razón Social: ' . $razonSocial . '<br>';
    echo 'Dirección: ' . $direccion . '<br>';
}