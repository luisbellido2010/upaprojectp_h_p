<?php

require 'config.php';

class dConexion {

    private $cone;
    private $stmt;

    public function __construct() {
        $this->cone = @mysql_connect(hostname, dbuser, dbpass) or
                $this->throw_sqlex("Error al conectarse con el servidor => " . mysql_error());
        if (!@mysql_select_db(dbname, $this->cone)) {
            $this->throw_sqlex("Error al seleccionar la base de datos => " . mysql_error());
            exit();
        }
        return true;
    }

    private function throw_sqlex($error) {
        throw new Exception($error);
    }
    protected function getQuery($sql) {
        $this->stmt = @mysql_query($sql, $this->cone)
                or
                $this->throw_sqlex(mysql_error());
        return $this->stmt;
    }

    public function getStmt() {
        return $this->stmt;
    }

    public function getDataR() {
        return mysql_fetch_object($this->stmt);
    }

    public function getData() {
        return mysql_fetch_assoc($this->stmt);
    }

    public function getDataRow() {
        return mysql_fetch_row($this->stmt);
    }

    public function getNumRow() {
        return mysql_num_rows($this->stmt);
    }

    public function __destruct() {
        if ($this->cone) {
            mysql_close($this->cone);
        }
    }

}

?>
