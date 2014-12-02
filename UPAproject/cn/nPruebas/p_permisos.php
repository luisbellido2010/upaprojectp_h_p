<?php

require '../../cd/dRoles.php';
include '../validatorinput.php';
$result = array();
$result["id"] = 123;
$result["text"] = "Permisos de Sistema";
$pro = new dRoles();
$pro->dListaRol();
while ($row = $pro->getDataR()) {

    
    $submenu = array(
        'id' => '123456',
        'text' => 'Luis Albertho'
    );
    $submenu1 = array(
        'id' => '123456',
        'text' => 'Luis Albertho'
    );
    
    $menu[] = array(
        'id' => $row->id,
        'text' => $row->nombre,
        "state" => "open",
        "checked" => true,
        'children' => array(
            $submenu,
            $submenu1,
            /*array(
                'id' => 'Une',
                'text' => 'Janvier'
            )*/
        )
    );
}

$result["children"] = $menu;
$json = json_encode(
        array(
            0 => $result
        )
);

//function getData($id) {
//    $pro = new dRoles();
//    $pro->dUserLisRol($id);
//    $user=NULL;
//    //$user[];
//    while ($ro = $pro->getData()) {
//        $user[] = array(
//            'id' => $ro->id,
//            'text' => $ro->usuario
//        );
//    }
//    return $user;
//}

echo $json;
?>