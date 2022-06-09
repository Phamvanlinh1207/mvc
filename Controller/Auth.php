<?php
include_once './Model/Database.php';
include_once './Model/User.php';

class Auth extends Database{

    public function __construct()
    {
        $this->connect();
    }

    public function user(){
        if(isset($_SESSION['user']))
            return $_SESSION['user'];
        return NULL;
    }

    public function login($phone, $password){
        $sql = "select * from users where phone=:phone and password=:password LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        $user = $stmt->fetch();
        if($user) {       
            unset($_SESSION['user']);
            $_SESSION['user'] = $user;

            
            if($user['role'] == 'admin') redirect(admin_url_pattern('categoryController', 'index'));     
        }else{
            redirect(url_pattern('authController', 'login'));
        }
    }

    public function register($attr = array()){
        //check name is exist
        $name = $attr['name'];
        $phone = $attr['phone'];
        $password = $attr['password'];
        $address = $attr['address'];

        if($this->validating($phone)){
            $sql = "select * from users where phone=:phone LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();   
            $user = $stmt->fetch();
           
            if($user){
                //user name existed
                $_SESSION['errors'] = 'This account has already existed. Please choose another account name.';
                redirect(url_pattern('authController', 'login')); die();
            }else {
            //Them moi user
                $sql = "insert into users(name, phone, password, address, role) values(:name, :phone, :password, :address, :role)";
                $stmt = $this->pdo->prepare($sql);

                $role = 'user';
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":phone", $phone);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":address", $address);
                $stmt->bindParam(":role", $role);

                $stmt->execute();

                //Lay thong tin user vua insert vao database
                $sql = "select * from users where phone=:phone LIMIT 1";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":phone", $phone);
                $stmt->execute();
                $user = $stmt->fetch();

            }      
        
        } 
       
    }

    public function validating($phone){
        if(preg_match('/^(0|\\+84)(\\s|\\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\\d)(\\s|\\.)?(\\d{3})(\\s|\\.)?(\\d{3})$/', $phone)) {
            return true;
        } else {
            return false;
        }
    }
    
   
}