<?php
class Order {
    public $id;
    public $code;
    public $description;
    public $status;
    public $users_id;
    public $created_at;
  

    public function __construct($id, $code, $description, $status, $users_id, $created_at) {
        $this->id = $id;
        $this->code = $code;
        $this->description = $description;
        $this->status = $status;
        $this->users_id = $users_id;
        $this->created_at = $created_at;
      
    }
}