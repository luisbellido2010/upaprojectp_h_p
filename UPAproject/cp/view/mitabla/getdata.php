<?php

$cab_fact = $_POST['cab_fact'];
$det_fact = $_POST['det_fact'];
$cab = json_decode($cab_fact, TRUE);
//echo $cab['p_codfac'] . $cab['p_tipmod'];
//print '<br>';
$det = json_decode($det_fact, TRUE);
//echo $det['total'];
foreach ((array) $det['rows'] as $de) {
    //echo $de['code'] . $de['name'] . $de['price'];
}

echo json_encode(array(
    'succesMsg' => $cab['p_codfac'],
    'detailMsg' => $cab['p_tipmod']
));
?>
