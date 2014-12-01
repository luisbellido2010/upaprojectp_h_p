<?php

ini_set("display_errors", true);
ini_set("html_errors", true);

class TreeNode {

    public $id = "";
    public $text = "";
    public $children = Array();
    public $state = "";
    public $checked = false;

     function __construct($id, $text) {
      $this->id = $id;
      $this->text = $text;
      }

    function __construct1($id, $text, $children) {
        $this->id = $id;
        $this->text = $text;
        $this->children[] = $children;
    }

}

class TreeNodes {

    protected $nodes = array();

    function add($id, $text) {

        $params = array('id' => 12354, 'text' => 54321);

        $n = new TreeNode($id, $text, $params);
        $this->nodes[] = $n;
    }

    function toJson() {
        return json_encode($this->nodes);
    }

}

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


$treeNodes = new TreeNodes();
$treeNodes->add('123', 'Permisos Disponibles');

//
//$treeNodes->add("datasources", "Datasources", "data", true, false, "", "");
//$treeNodes->add("datasets", "Datasets", "dataset", true, false, "", "");
//$treeNodes->add("reports", "Reports", "report", true, false, "", "");
//

echo $treeNodes->toJson();
?>