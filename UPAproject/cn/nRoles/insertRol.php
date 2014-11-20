<?php

require '../../cd/dRoles.php';
set_error_handler('exceptions_error_handler');

function exceptions_error_handler($severity, $message, $filename, $lineno) {
    if (error_reporting() == 0) {
        return;
    }
    if (error_reporting() & $severity) {
        throw new ErrorException($message, 0, $severity, $filename, $lineno);
    }
}

try {
    $pnombre =  trim($_POST['nombre']);
    $pro = new dRoles();
    $pro->dInsertRol($pdnombre);
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