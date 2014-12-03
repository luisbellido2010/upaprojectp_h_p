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
        $submenu[$co] = new treenode($ro->id, $ro->text);
    }
    $menu[$c] = new treenode($idrol, $r->text, $submenu);
}

//PRINT PRINCIPAL
$principal = array(new treenode('123', 'Permisos del Sistema', $menu));

echo json_encode($principal);

//DECLARARION DE CLASE DE NEGOCIO
class nPermiso {

    protected $obj;

    public function __construct() {
        $this->obj = new dRoles();
    }

    function nListRol() {
        $this->obj->dListaRol();
        $array = array();
        while ($r = $this->obj->getDataR()) {
            $array[] = new treenode($r->id, $r->nombre);
        }
        return $array;
    }

    function nListUserRol($idrol) {
        $this->obj->dUserLisRol($idrol);
        $array = array();
        while ($r = $this->obj->getDataR()) {
            $array[] = new treenode($r->id, $r->usuario);
        }
        return $array;
    }

}
