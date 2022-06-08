<?php
class OrderDetail {
    public $id;
    public $orders_id;
    public $products_id;
    public $quantity;
   
 

    public function __construct($id, $orders_id, $products_id, $quantity) {
        $this->id = $id;
        $this->orders_id = $orders_id;
        $this->products_id = $products_id;
        $this->quantity = $quantity;
       
    }
}