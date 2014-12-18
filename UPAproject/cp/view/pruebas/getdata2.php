<?php
$newUsers = $_POST['newUsers'];
foreach ($newUsers as $user) {
    $usr = json_decode($user);
    echo "Nome: " . $usr->nome . " - Idade: " . $usr->idade;
}

//foreach ($det_fact as $det) {
//    $df = json_decode($det);
//    echo "Codigo: " . $df->p_code;
//}

?>
