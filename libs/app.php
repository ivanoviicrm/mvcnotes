<?php
require_once 'config/config.php';

class App {

    public $controller;
    public $controllerObj;
    public $action;

    public function __construct(){

        // Cargo el header para el HTML
        require_once 'views/layout/header.php';

        // Compruebo la URL
        $this->checkURL();
        //echo '<p>El controlador actual es: <b>' . $this->controller . '</b>, y la acción: <b>' . $this->action . '</b></p>';

        // Compruebo el Controlador
        $this->comprobarControlador();

        // Compruebo la accion
        if (!empty($this->action)) {
            $this->comprobarAccion();
        } else {
            $this->action = 'index';
            $this->comprobarAccion();
        }

        // Cargo el footer para el HTML
        require_once 'views/layout/footer.php';
    }

    public function checkURL() {
        // Si recibo parámetros
        if (isset($_GET) && count($_GET) >= 1) {
            // Particiono la URL en parámetros
            $camposURL = explode('/', $_GET['url']);

            // Cuento los parámetros recibidos
            if (count($camposURL) == 3 && $camposURL[0] == 'nota' && is_numeric($camposURL[2])) {
                // Caso especial para editar/elimar nota, que me envian el id por GET como 3er parametro
                $this->controller = $camposURL[0];
                $this->action = $camposURL[1];

            } else if (count($camposURL) == 2) {
                $this->controller = $camposURL[0];
                $this->action = $camposURL[1];

            } else if (count($camposURL) == 1) {
                $this->controller = $camposURL[0];
                $this->action = DEFAULT_ACTION;

            } else {
                echo '<h4 style="color: red;">La url contenía más de 2 parámetros</h4>';
                die();
            }

        // Si no recibo parámetros
        } else {
            $this->controller = DEFAULT_CONTROLLER;
            $this->action = DEFAULT_ACTION;
        }

        // Le añado la terminacion Controller al controlador -> Nota -> NotaController
        $this->controller = $this->controller . 'Controller';
    }

    public function comprobarControlador() {
        // Si el controlador es correcto.
        if (file_exists('controllers/' . $this->controller . '.php')) {
            //echo '<p>El controlador ' . $this->controller . ' existe.</p>';

            // Cargo el controlador
            require_once 'controllers/' . $this->controller . '.php';

            // Creo el Objeto controller
            $this->controllerObj = new $this->controller;
       

        } else {
            echo '<h4 style="color: red;">El controlador ' . $this->controller . ' no se reconoció.</h4>';
            die();
        }
    }

    public function comprobarAccion() {
        // Si la accion existe como método en la clase del controller
        if (method_exists($this->controllerObj, $this->action)) {
            $accion = $this->action;
            // Ejecuto esa accion
            $this->controllerObj->$accion();
        
        } else {
            echo '<h4 style="color: red;">La accion ' . $this->action . ' no se reconoció.</h4>';
            die();
        }
    }
}