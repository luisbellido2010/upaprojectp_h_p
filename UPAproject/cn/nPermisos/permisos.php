<?php

require '../../cd/dRoles.php';
include '../validatorinput.php';
$result = array();
$result["id"] = 123;
$result["text"] = "Permisos de Sistema";
$pro = new dRoles();
$pro->dListaRol();
while ($row = $pro->getDataR()) {
    $items[] = array(
        'id' => $row->id,
        'text' => $row->nombre,
        'children'=> getData($row->id)
    );
}

$result["children"] = $items;
$json = json_encode(
        array(
            0 => $result
        )
);

function getData($id) {
    $pro = new dRoles();
    $pro->dUserLisRol($id);
    $user=NULL;
    //$user[];
    while ($ro = $pro->getData()) {
        $user[] = array(
            'id' => $ro->id,
            'text' => $ro->usuario
        );
    }
    return $user;
}

echo $json;
?>