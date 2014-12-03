<?php

class treenode {

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
    }

    function __construct2($id, $text) {
        $this->id = $id;
        $this->text = $text;
    }

    function __construct3($id, $text, $children) {
        $this->id = $id;
        $this->text = $text;
        $this->children = $children;
    }

    function __construct4($id, $text, $children,$checked) {
        $this->id = $id;
        $this->text = $text;
        $this->children = $children;
        $this->checked = $checked;
    }

}
