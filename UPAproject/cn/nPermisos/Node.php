<?php

require '../../cd/dRoles.php';
include '../validatorinput.php';

Class Node {

    public $id;
    public $parent_id;
    public $value;
    public $children;
    public $depth;

    function __construct($id, $parent_id, $value) {
        $this->id = $id;
        $this->parent_id = $parent_id;
        $this->value = $value;
        $this->children = array();
        $this->depth = 0;
    }

//    function __construct1($id, $parent_id) {
//        $this->id = $id;
//        $this->parent_id = $parent_id;
//    }

    function get_children_from_mysql() {
        $pro = new dRoles();
        $pro->dListaRol();
        while ($row = $pro->getDataR()) {
            $next_node = new Node($row->id, $row->nombre, $row->nombre);
            $this->children[$row->id] = $next_node;
            $next_node->get_children_from_mysql();
        }

//        $query = "SELECT * FROM your_table WHERE parent_uid = '$this->id'";
//        $results = mysql_query($query);
//        while ($next = mysql_fetch_array($results)) {
//            $next_node = new Node($next['uid'], $next['parent_uid'], $next['value']);
//            $this->children[$next_node->id] = $next_node;
//            $next_node->get_children_from_mysql();
//        }
    }

    function to_array() {
        if (count($this->children) > 0) {
            $arr = array();
            foreach ($this->children as $child) {
                array_push($arr, $child->to_array());
            }
            return array($this->value => $arr);
        } else {
            return $this->value;
        }
    }

    function to_json() {
        return json_encode($this->to_array());
    }

}

// you need to know the root uid/value or get it from mysql
$root_uid = 1;
$root_value = "root node value";
$root = new Node($root_uid, 0, $root_value);
$root->get_children_from_mysql(); // magical recursive call

echo $root->to_json();
