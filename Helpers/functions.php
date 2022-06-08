<?php
function url_pattern($controller, $page, $id = NULL){
    if($id == NULL)  
        return sprintf("index.php?controller=%s&page=%s", $controller, $page); 
    return sprintf("index.php?controller=%s&page=%s&id=%s", $controller, $page, $id); 
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
function calc_product_price($product) {
    $sum = $product['quantity'] * $product['price'];
    return number_format($sum);
}

/**
 * Admin
 */
function increment(&$i = 1) {
    $i++;
    return $i;
}

function admin_url_pattern($controller, $page, $id = NULL){
    if($id == NULL)  
        return sprintf("admin.php?controller=%s&page=%s", $controller, $page); 
    return sprintf("admin.php?controller=%s&page=%s&id=%s", $controller, $page, $id); 
}

function redirect($url) {
    header("Location: $url");
    die();
}

function orderStyle($status){
    if($status == 'pending'){
        return "order-pending";
    }
    
    return "order-finished";
}
