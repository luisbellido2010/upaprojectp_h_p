<?php

require '../../cd/dRoles.php';
include '../validatorinput.php';

try {
    $pnombre = trim($_POST['nombre']);
    $pid = $_POST['id'];
    $pro = new dRoles();
    $pro->dUpdateRol($pnombre, $pid);
    if ($pro->getStmt()) {
        echo json_encode(array(
            'id' => $pid,
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