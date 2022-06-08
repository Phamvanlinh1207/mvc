<?php
class Pay {
    public $id;
    public $name;
    public $phone;
    public $address;
    public $note;

    public function __construct($id, $name, $phone, $address, $note) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
        $this->note = $note;
    }
}