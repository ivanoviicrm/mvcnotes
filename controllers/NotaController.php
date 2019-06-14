<?php
require_once 'models/Nota.php';

class NotaController {
    
    private $nota;

    public function __construct() {
        //echo 'Nota Controller Creado.';
        $this->nota = new Nota();
    }

    public function index() { // En este caso index va a mostrar todas mis notas
        //echo 'Hola, soy index()';
        $notas = $this->nota->getAll();
        require_once 'views/Nota/todas.php';
    }

    public function crearNota() {
        require_once 'views/Nota/crearNota.php';
    }

    public function guardarNota() {
        $id    = 'null';
        $fecha = 'SYSDATE()';
        if (isset($_POST)) {
            $titulo    = $_POST['titulo'];
            $color     = $_POST['color'];
            $contenido = $_POST['contenido'];

            $this->nota->setId($id);
            $this->nota->setTitulo($titulo);
            $this->nota->setContenido($contenido);
            $this->nota->setColor($color);
            $this->nota->setFecha($fecha);

            if ($this->nota->save($this->nota)) {
                echo 'Nota guardada correctamente';
            } else {
                echo 'No se pudo guardar la nota';
            }
        }
    }

    public function eliminar() {
        if (isset($_GET)) {
            $parametros = explode('/', $_GET['url']);
            $id = $parametros[2];

            if($this->nota->delete($id)) {
                echo 'La nota se eliminó correctamente.';
            } else {
                echo 'La nota no se pudo eliminar';
            }
        }
    }

    public function editar() {
        if (isset($_GET)) {
            $parametros = explode('/', $_GET['url']);
            $id = $parametros[2];

            if($nota = $this->nota->getById($id)) {
                require_once 'views/Nota/editarNota.php';
            }
        }
    }

    public function actualizar() {
        $fecha = 'SYSDATE()';
        if (isset($_POST)) {
            $id        = $_POST['id'];
            $titulo    = $_POST['titulo'];
            $color     = $_POST['color'];
            $contenido = $_POST['contenido'];

            $this->nota->setId($id);
            $this->nota->setTitulo($titulo);
            $this->nota->setContenido($contenido);
            $this->nota->setColor($color);
            $this->nota->setFecha($fecha);

            if ($this->nota->update($this->nota)) {
                echo 'Nota editada correctamente';
            } else {
                echo 'No se pudo editar la nota';
            }
        }
    }
}