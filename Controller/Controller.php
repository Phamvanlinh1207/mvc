<?php
class Controller {
    public function __construct() {

    }

    public function invoke() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET['controller'])){
                $controllerClass = ucfirst($_GET['controller']); //homeController -> HomeController
                require_once "./Controller/$controllerClass.php";
                $controller = new $controllerClass;
                $controller->invoke();
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['controller'])){
                $controllerClass = ucfirst($_POST['controller']); //homeController -> HomeController
                require_once "./Controller/$controllerClass.php";
                $controller = new $controllerClass;
                $controller->invoke();
            }
        }
        
    }
}