<?php
class Product {
    public $id;
    public $name;
    public $price;
    public $quantity;
    public $image;

    public function __construct($id, $name, $price, $quantity, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }
}