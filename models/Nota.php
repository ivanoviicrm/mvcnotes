<?php
require_once 'libs/Database.php';

class Nota {

    private $db;

    private $id;
    private $titulo;
    private $contenido;
    private $color;
    private $fecha;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    // METODOS PARA BBDD
    public function getAll() {
        $notas = false;
        $resultado = $this->db->query("SELECT * FROM notas ORDER BY id DESC");
        while ($row = $resultado->fetch_object('Nota')) {
            $notas[] = $row;
        }

        return $notas;
    }

    public function getById($id) {
        $nota = false;
        $resultado = $this->db->query("SELECT * FROM notas WHERE id = $id");
        if ($row = $resultado->fetch_object('Nota')) {
            $nota = $row;
        }
        return $nota;
    }

    public function save($nota) {
        $resultado = $this->db->query("INSERT INTO notas(id, titulo, contenido, color, fecha) VALUES($nota->id, '$nota->titulo', '$nota->contenido', '$nota->color', $nota->fecha)");
        return $resultado;
    }

    public function update($nota) {
        $resultado = $this->db->query("UPDATE notas SET titulo = '$nota->titulo', contenido = '$nota->contenido', color = '$nota->color', fecha = $nota->fecha WHERE id = $nota->id");
        return $resultado;
    }

    public function delete($id) {
        $resultado = $this->db->query("DELETE FROM notas WHERE id = $id");
        return $resultado;
    }

    // GETTERS
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getColor() {
        return $this->color;
    }

    public function getFecha() {
        return $this->fecha;
    }

    // SETTERS
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}