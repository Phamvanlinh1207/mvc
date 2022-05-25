<?php
include_once './Model/Product.php';
include_once './Model/Database.php';

class ProductModel extends Database {

    public function __construct() {
        $this->connect();
    }

    public function find($id){
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
    function getOrdersBySession() {
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }else{
            $cart = array();
        }
        return $cart;
    }
    function create_order($productId, $name, $image, $price, $quantity) {
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
        }else{
            $cart = array();  
        }
    
        $productExists = false;
    
        foreach($cart as $key => $value){
            if($productId == $value['productId']){
                $value['quantity'] = $value['quantity'] + $quantity;
                $cart[$key] = $value;
                $productExists = true;
                break;
            }
        }
    
        if(!$productExists) {
            $product = array(
                'productId' => $productId,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'quantity' => $quantity,
            );
        
            $cart[] = $product;
        }
       
        $_SESSION['cart'] = $cart;
    }

}