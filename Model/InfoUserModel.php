<?php
include_once './Model/InfoUser.php';
include_once './Model/Database.php';

class InfoUserModel extends Database {

    public function __construct() {
        $this->connect();
    }

    public function find($id) {
        $sql = "select * from info_users where id=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    
        $info_user = $stmt->fetch();
        return new InfoUser(
            $info_user['id'],
            $info_user[' name'],
            $info_user['phone'],
            $info_user['address'],
            $info_user['users_id']
        );
    }

    public function all() {
        $sql = "select * from info_users";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $info_users = array();

        foreach($query as $info_user){
            $info_users[] = new InfoUser(
                $info_user['id'],
                $info_user[' name'],
                $info_user['phone'],
                $info_user['address'],
                $info_user['users_id']
            );
        }

        return $info_user;
    }

    public function delete($id){
        $sql = "delete from info_users where id = " . $id;
        $this->pdo->exec($sql);
    }

    public function create($attr = array()) {
        $full_name = $attr['full_name'];
        $address = $attr['address'];
        $users_id = $attr['users_id'];

        $sql = "insert into info_users(full_name, address, users_id) values(:full_name, :address, :users_id)";        
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':users_id', $users_id);

        $stmt->execute();
    }

    public function update($attr = array()) {
        $full_name = $attr['full_name'];
        $phone = $attr['phone'];
        $address = $attr['address'];
        $sql ="UPDATE info_users set full_name= '$full_name', phone= '$phone', address='$address' where id=" . $attr['id'];
        var_dump($sql);
        
        $this->pdo->exec($sql);
    }

    public function findByUserId($users_id){
        $sql = "select * from info_users where users_id=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$users_id]);
    
        $info_user = $stmt->fetch();
        return new InfoUser(
            $info_user['id'],
            $info_user['full_name'],
            $info_user['phone'],
            $info_user['address'],
            $info_user['users_id']
        );
    }
    
}