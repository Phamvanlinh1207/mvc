<?php
class User {
    public $id;
    public $info_users_name;
    public $password;
    public $role;

    public function __construct($id,  $info_users_name, $password , $role) {
        $this->id = $id;
        $this->info_users_name = $info_users_name;
        $this->password = $password;
        $this->role = $role;
    }
}