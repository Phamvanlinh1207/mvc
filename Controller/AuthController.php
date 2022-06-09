<?php
include_once './Controller/Auth.php';

class AuthController { 
    private $auth;
    public function __construct() {
        $this->auth = new Auth();
    }

    public function invoke() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET['page'])){
                switch($_GET['page']){
                    case 'login':
                        $this->loginPage();
                        break;
                    case 'logout':
                        $this->logoutPage();
                        break;
                    case 'register':
                        $this->registerPage();
                        break;
                    }
                }
            }
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['page'])){
                switch($_POST['page']){
                    case 'login':
                        $this->postLoginPage();
                        break;
                    case 'register':
                        $this->postRegisterPage();
                        break;
                }
            }
        }
        

        
    }

    private function loginPage(){
        require_once './View/login.php';
    }

    private function postLoginPage(){
        $auth = new Auth();
        $auth->login($_POST['phone'], $_POST['password']);
        redirect(url_pattern('homeController', 'home'));
    }

    private function logoutPage(){
        unset($_SESSION['user']);
        redirect(url_pattern('homeController', 'home'));
    }

    private function registerPage(){
        require_once './View/register.php';
    }

    private function postRegisterPage(){
        $auth = new Auth();
        $auth->register(
            array(
                'phone' => $_POST['phone'],
                'name' => $_POST['name'],  
                'password' => $_POST['password'], 
                'address' => $_POST['address']
            )
        );
        redirect(url_pattern('homeController', 'home'));
    }
}