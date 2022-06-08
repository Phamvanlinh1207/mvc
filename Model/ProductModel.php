<?php
include_once './Model/Product.php';
include_once './Model/Database.php';

class ProductModel extends Database {

    public function __construct() {
        $this->connect();
    }

    public function find($id) {
        $sql = "select * from products where id=? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    
        $product = $stmt->fetch();
        return new Product(
            $product['id'],
            $product['name'],
            $product['price'],
            $product['quantity'],
            $product['image']
        );
    }

    public function all() {
        $sql = "select * from products";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $products = array();

        foreach($query as $product){
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['quantity'],
                $product['image']
            );
        }

        return $products;
    }
    public function delete($id){
        $sql = "delete from products where id = " . $id;
        $this->pdo->exec($sql);
    }

    public function create($attr = array()) {
        $name = $attr['name'];
        $price = $attr['price'];
        $quantity = $attr['quantity'];
        $image = $attr['image'];
        $sql = "insert into products(name, price, quantity, image) values('$name','$price','$quantity','$image')";

        $this->pdo->exec($sql);
    }

    public function update($attr = array()) {
        $name = $attr['name'];
        $price = $attr['price'];
        $quantity = $attr['quantity'];
        $image = $attr['image'];
        $sql ="UPDATE products set name= '$name', price= '$price', quantity= '$quantity', image='$image'  where id=" . $attr['id'];
        var_dump($sql);
        
        $this->pdo->exec($sql);
    }
    public function findByName($name){
        $sql = "select * from products where name like '%$name%'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
    
        $products = array();
    
        foreach($query as $product){
            $products[] = new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['quantity'],
                $product['image']
            );
        }
    
        return $products;
    }
    
    
}