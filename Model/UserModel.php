<?php
include_once './Model/User.php';
include_once './Model/Database.php';

class UserModel extends Database {

    public function __construct() {
        $this->connect();
    }

    public function find($id) {
        $sql = "select * from users where id=:id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        $user = $stmt->fetch();

        return new User(
            $user['id'],
            $user['phone'],
            $user['password'],
            $user['role']
        );
    }

    public function all() {
        $sql = "select * from users";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $users = array();

        foreach($query as $user){
            $users[] = new User(
                $user['id'],
                $user['phone'],
                $user['password'],
                $user['role']
            );
        }

        return $users;
    }

    public function delete($id){
        $sql = "delete from users where id=:id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function create($attr = array()) {
        $phone = $attr['phone'];
        $password = $attr['password'];
        $role = $attr['role'];
        $sql = "insert into users(phone, password, role) values(:phone, :password, :role)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
    }

    public function update($attr = array()) {
        $phone = $attr['phone'];
        $password = $attr['password'];
        $role = $attr['role'];
        $id = $attr['id'];

        $sql = "UPDATE users set phone=:phone, password=:password, role=:role where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }
    
}