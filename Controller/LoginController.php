<?php
class LoginController {
    public function __construct() {

    }

    public function invoke() {
        if(isset($_GET['page'])){
            include_once './View/login.php';
        }

        if(isset($_POST['name']) && isset($_POST['password'])){
            
        }
    }
}