<?php

ini_set("display_errors", true);
ini_set("html_errors", true);

class TreeNode {

    public $id = "";
    public $text = "";
    public $children = Array();
    public $state = "";
    public $checked = false;

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    function __construct1($id) {
        $this->id = $id;
        //echo '__construct1'.$id;
    }

    function __construct2($id, $text) {
        $this->id = $id;
        $this->text = $text;
        //echo '__construct2'.$id.$text;
    }

    function __construct3($id, $text, $children) {
        $this->id = $id;
        $this->text = $text;
        $this->children = $children;
        //echo '__construct3';
    }

}

//class TreeNodes {
//
//    protected $nodes = array();
//
//    function add($id, $text) {
//
//        $params = array('id' => 12354, 'text' => 54321);
//
//        $n = new TreeNode($id, $text, $params);
//        $this->nodes[] = $n;
//    }
//
//    function toJson() {
//        return json_encode($this->nodes);
//    }
//
//}
//class TreeNodes {
//
//    protected $nodes = array();
//
//    function add($id, $text, $iconCls, $leaf, $draggable, $href, $hrefTarget) {
//        $n = new TreeNode($id, $text, $iconCls, $leaf, $draggable, $href, $hrefTarget);
//        $this->nodes[] = $n;
//    }
//
//    function toJson() {
//        return json_encode($this->nodes);
//    }
//
//}

/*
  $n1 = new TreeNode("datasources","Datasources","data",true,false,"","");
  $n2 = new TreeNode("datasets","Datasets","dataset",true,false,"","");
  $n3 = new TreeNode("reports","Reports","report",true,false,"","");

  $nodes = array($n1,$n2,$n3);

  echo (json_encode($nodes));
 */


///$treeNodes = new TreeNodes();
//$treeNodes->add('123', 'Permisos Disponibles');
//
//$treeNodes->add("datasources", "Datasources", "data", true, false, "", "");
//$treeNodes->add("datasets", "Datasets", "dataset", true, false, "", "");
//$treeNodes->add("reports", "Reports", "report", true, false, "", "");
//
//echo $treeNodes->toJson();
//$a=new TreeNode('Saludo');
//$b=new TreeNode('Saludo','parades');
$menu = array();
for ($i = 0; $i < 3; $i++) {
    $submenu = array();
    for ($x = 0; $x < 2; $x++) {
        $submenu[$x] = new TreeNode('456' . $x, 'Permisos del Sistema' . $x);
    }
    $menu[$i] = new TreeNode('123' . $i, 'Permisos del Sistema', $submenu);
}

$principal = array();
$n = new TreeNode('123', 'Permisos del Sistema', $menu);
$principal[] = $n;
echo json_encode($principal);
?>