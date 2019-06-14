<?php

class Database {

    private $host;
    private $user;
    private $password;
    private $dbname;

    public function __construct() {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->dbname = 'mvcnotes';
    }

    public function connect() {
        try {
            $conexion = new mysqli($this->host, $this->user, $this->password, $this->dbname);
            $conexion->query("SET NAMES 'utf8'");
            return $conexion;

        } catch (Exception $e) {
            echo 'Error en Database.php -> El erro fue: ' . $e->getMessage();
            die();
        }
    }
}