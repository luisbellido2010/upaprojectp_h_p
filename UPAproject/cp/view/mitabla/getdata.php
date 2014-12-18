<?php

//$newUsers = $_POST['newUsers'];
//foreach ($newUsers as $user) {
//    $usr = json_decode($user);
//    echo "Nome: " . $usr->nome . " - Idade: " . $usr->idade;
//}

$facturas = $_POST['facturas'];
foreach ($facturas as $fac) {
    $f = json_decode($fac);
    echo "Codigo: " . $f->p_code;
}
?>
