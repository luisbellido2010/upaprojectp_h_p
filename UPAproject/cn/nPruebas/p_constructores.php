<?php

//class BaseClass {
//
//    function __construct() {
//        print "En el constructor BaseClass\n";
//    }
//
//}
//
//class SubClass extends BaseClass {
//   function __construct() {
//       parent::__construct();
//       print "En el constructor SubClass\n";
//   }
//}

class A {

    function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
        echo '__construct';
    }

    function __construct1($aaa1) {
        echo('__construct with 1 param called: ' . $aaa1 . PHP_EOL);
    }

    function __construct2($a1, $a2) {
        echo('__construct with 2 params called: ' . $a1 . ',' . $a2 . PHP_EOL);
    }

    function __construct3($a1, $a2, $a3) {
        echo('__construct with 3 params called: ' . $a1 . ',' . $a2 . ',' . $a3 . PHP_EOL);
    }

}

$a = new A('sheep');
$b = new A('sheep', 'cat');
$c = new A('sheep', 'cat', 'dog');
//echo PHP_EOL;
