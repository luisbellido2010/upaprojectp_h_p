<?php

require '../../cd/dRoles.php';
include '../validatorinput.php';
try {
    $pnombre = trim($_POST['nombre']);
    $pro = new dRoles();
    $pro->dInsertRol($pnombre);
    if ($pro->getStmt()) {
        echo json_encode(array(
            'id' => mysql_insert_id(),
            'nombre' => $pnombre
        ));
    } else {
        echo json_encode(array('errorMsg' => 'Some errors occured.'));
    }
} catch (ErrorException $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
}