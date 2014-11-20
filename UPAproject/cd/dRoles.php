<?php

require 'dConexion.php';

class dRoles extends dConexion {

    function dListaRol() {
        $query = "SELECT id, nombre FROM rol";
        return $this->getQuery($query);
    }

    function dInsertRol($pnombre) {
        $query = "INSERT INTO rol (nombre) VALUES('$pnombre')";
        return $this->getQuery($query);
    }

    function dUpdateRol($pnombre, $pid) {
        $query = "UPDATE rol SET nombre = '$pnombre' WHERE id =$pid";
        return $this->getQuery($query);
    }

    function dDeleteRol($pid) {
        $query = "delete FROM rol WHERE id =$pid";
        return $this->getQuery($query);
    }

}

?>
