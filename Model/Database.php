<?php
class Database {
    private $servername = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'database';

    protected $pdo;

    protected function connect() {
        try{
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", $this->servername, $this->database);
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(pdo::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo  "Success";
        }catch(PDOException $e){
            echo 'Connect failed ' . $e->getMessage();
        }
    }

    protected function close() {
        $this->pdo->close();
    }
}