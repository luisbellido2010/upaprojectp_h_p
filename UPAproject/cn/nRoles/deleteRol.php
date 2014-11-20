<?php

require '../../cd/dRoles.php';
include '../validatorinput.php';
try {
    $pid = $_POST['id'];
    $pro = new dRoles();
    $pro->dDeleteRol($pid);
    if ($pro->getStmt()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('errorMsg' => 'Some errors occured.'));
    }
} catch (ErrorException $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
} catch (Exception $er) {
    echo json_encode(array('errorMsg' => $er->getMessage()));
}