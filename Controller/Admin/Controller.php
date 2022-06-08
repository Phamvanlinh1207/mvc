<?php
include_once './Controller/Auth.php';

class Controller {
    public function __construct() {
        $auth = new Auth();
        $user = $auth->user();
        if($user == NULL || $user['role'] != 'admin'){ //login thanh cong
            redirect(url_pattern('homeController', 'home'));
        }
    }

    public function invoke() {
        if(isset($_GET['controller'])){
            $controllerClass = ucfirst($_GET['controller']); 
            require_once "./Controller/Admin/$controllerClass.php";
            $controller = new $controllerClass;
            $controller->invoke();
        }else{
            //Gia tri mac dinh neu khong co tham so controller va page
            $_GET['page'] = 'index';
            $controllerClass = 'CategoryController'; 
            require_once "./Controller/Admin/$controllerClass.php";
            $controller = new $controllerClass;
            $controller->invoke();
        }

        if(isset($_POST['controller'])){
            $controllerClass = ucfirst($_POST['controller']);
            require_once "./Controller/Admin/$controllerClass.php";
            $controller = new $controllerClass;
            $controller->invoke();
        }
    }
}