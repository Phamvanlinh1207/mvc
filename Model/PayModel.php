<?php
include_once './Model/Pay.php';
include_once './Model/Database.php';

class PayModel extends Database {

    public function __construct() {
        $this->connect();
    }

    public function find($id) {
        $sql = "select * from pay where id=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    
        $pay = $stmt->fetch();
        return new Pay(
            $pay['id'],
            $pay['name'],
            $pay['phone'],
            $pay['address'],
            $pay['note']
        );
    }

    public function all() {
        $sql = "select * from pay";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $payList = array();

        foreach($query as $pay){
            $payList[] = new Pay(
                $pay['id'],
                $pay['name'],
                $pay['phone'],
                $pay['address'],
                $pay['note']
            );
        }

        return $payList;
    }
    public function delete($id){
        $sql = "delete from pay where id = " . $id;
        $this->pdo->exec($sql);
    }

    public function create($attr = array()) {
        $name = $attr['name'];
        $phone = $attr['phone'];
        $address = $attr['address'];
        $note = $attr['note'];
        $sql = "insert into pay(name, phone, address, note) values('$name','$phone','$address','$note')";

        $this->pdo->exec($sql);
    }

    public function update($attr = array()) {
        $name = $attr['name'];
        $phone = $attr['phone'];
        $address = $attr['address'];
        $note = $attr['note'];
        $sql ="UPDATE pay set name= '$name', phone= '$phone', address= '$address', note='$note'  where id=" . $attr['id'];
        var_dump($sql);
        
        $this->pdo->exec($sql);
    }
    
    
}