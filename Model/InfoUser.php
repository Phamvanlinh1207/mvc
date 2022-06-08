<?php
class InfoUser {
    public $id;
    public $full_name;
    public $phone;
    public $address;

    public function __construct($id,  $full_name, $phone , $address) {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->phone = $phone;
        $this->address = $address;
    }
}