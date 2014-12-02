<?php

require '../../cd/dRoles.php';
require '../class_tree.php';
include '../validatorinput.php';
ini_set("display_errors", true);
ini_set("html_errors", true);

$per = new nPermiso();

//MENUS DISPONIBLES
$menu = array();
foreach ($per->nListRol() as $c => $r) {
    $idrol = $r->id;
    $submenu = array();
    foreach ($per->nListUserRol($idrol)as $co => $ro) {
        $submenux = array();
        foreach ($per->nListUserRol($idrol)as $con => $row) {
            $submenux[$con] = new treenode($row->id, $row->text);
        }
        $submenu[$co] = new treenode($ro->id, $ro->text, $submenux);
    }
    $menu[$c] = new treenode($idrol, $r->text, $submenu);
}

//PRINT PRINCIPAL
$principal = array(new treenode('123', 'Permisos del Sistema', $menu));

echo json_encode($principal);

//DECLARARION DE CLASE DE NEGOCIO
class nPermiso {

    function nListRol() {
        $obj = new dRoles();
        $obj->dListaRol();
        $array = array();
        while ($r = $obj->getDataR()) {
            $array[] = new treenode($r->id, $r->nombre);
        }
        return $array;
    }

    function nListUserRol($idrol) {
        $obj = new dRoles();
        $obj->dUserLisRol($idrol);
        $array = array();
        while ($r = $obj->getDataR()) {
            $array[] = new treenode($r->id, $r->usuario);
        }
        return $array;
    }

}
