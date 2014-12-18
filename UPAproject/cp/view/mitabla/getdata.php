<?php

$cab_fact = $_POST['cab_fact'];
$det_fact = $_POST['det_fact'];
$cab = json_decode($cab_fact, TRUE);
echo $cab['p_codfac'] . $cab['p_tipmod'];
print '<br>';
foreach ($det_fact as $det) {
    $df = json_decode($det);
    echo "Codigo: " . $df->p_code;
}
?>
