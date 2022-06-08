<?php
include_once './Model/Database.php';
include_once './Model/User.php';
include_once './Model/InfoUserModel.php';

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

            //Set session infouser
            $infoUserModel = new InfoUserModel();
            $infoUser = $infoUserModel->findByUserId($user['id']);

            unset($_SESSION['infoUser']);
            $_SESSION['infoUser'] = array(
                'full_name' => $infoUser->full_name,
                'address' => $infoUser->address,
                'users_id' => $infoUser->users_id
            );

            if($user['role'] == 'admin') redirect(admin_url_pattern('categoryController', 'index'));     
        }else{
            redirect(url_pattern('authController', 'login'));
        }
    }

    public function register($attr = array()){
        //check name is exist
        $phone = $attr['phone'];
        $password = $attr['password'];
        $full_name = $attr['full_name'];
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
                $sql = "insert into users(phone, password, role) values(:phone, :password, :role)";
                $stmt = $this->pdo->prepare($sql);

                $role = 'user';
                $stmt->bindParam(":phone", $phone);
                $stmt->bindParam(":password", $password);
                $stmt->bindParam(":role", $role);

                $stmt->execute();

                //Lay thong tin user vua insert vao database
                $sql = "select * from users where phone=:phone LIMIT 1";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":phone", $phone);
                $stmt->execute();
                $user = $stmt->fetch();

                //Them thong tin infouser
                $infoUserModel = new InfoUserModel();
                $infoUserModel->create(
                    array(
                        'full_name' => $full_name,
                        'address' => $address,
                        'users_id' => $user['id']
                    )
                );
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