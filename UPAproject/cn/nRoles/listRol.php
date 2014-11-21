<?php

require '../../cd/dRoles.php';
include '../validatorinput.php';
try {
    $pro = new dRoles();
    $result = array();
    $pro->dListaRol();
    while ($row = $pro->getData()) {
        $result['rows'][] = array_map('utf8_encode', $row);
    }
    echo json_encode($result);
} catch (Exception $er) {
    //trigger_error($er->getMessage());
    echo json_encode(array('errorMsg' => $er->getMessage()));
}
