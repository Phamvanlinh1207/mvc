<?php
include_once './Model/Order.php';
include_once './Model/Database.php';

class OrderModel extends Database {


    public function __construct() {
        $this->connect();

    }

    public function find($id) {
        $sql = "select * from orders where id=:id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        $order = $stmt->fetch();
        return new Order(
            $order['id'],
            $order['code'],
            $order['description'],
            $order['status'],
            $order['users_id'],
            $order['created_at']
             
        );
    }

    public function all() {
        $sql = "select * from orders";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $orders = array();

        foreach($query as $order){
            $orders[] = new Order(
                $order['id'],
                $order['code'],
                $order['description'],
                $order['status'],
                $order['users_id'],
                $order['created_at']
                 
            );
            
        }

        return $orders;
    }
    public function delete($id){
        $sql = "delete from orders where id=:id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function create($attr = array()) {
        $code = $attr['code'];
        $description = $attr['description'];
        $users_id = $attr['users_id'];
  
        $sql = "insert into orders(code, description, users_id) values(:code, :description, :users_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":code", $code);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":users_id", $users_id);
        $stmt->execute();
    }

    public function update($attr = array()) {
        $code = $attr['code'];
        $description = $attr['description'];
        $users_id = $attr['users_id'];
        $id = $attr['id'];
  
        $sql = "update orders set code=:code, description=:description, users_id=:users_id where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":code", $code);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":users_id", $users_id);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } 
    
    public function findOrdersByTime($begin, $end){
        $sql = "select * from orders where created_at >= :begin and created_at <= :end";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":begin", $begin);
        $stmt->bindParam(":end", $end);
        $stmt->execute();

        $query = $stmt->fetchAll();

        $orders = array();

        foreach($query as $order){
            $orders[] = new Order(
                $order['id'],
                $order['code'],
                $order['description'],
                $order['status'],
                $order['users_id'],
                $order['created_at']
                 
            );
            
        }

        return $orders;
    }
}