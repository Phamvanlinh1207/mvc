<?php
require_once './Model/OrderModel.php';

class DashboardController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
    }

    public function invoke() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            switch($_GET['page']){
                case 'index':
                    $this->indexPage();
                    break;
            }
        }        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    }

    private function indexPage(){
        $pendingOrders = $this->orderModel->findByStatus('pending');
        $finishedOrders = $this->orderModel->findByStatus('finished');

        require_once './View/Admin/dashboard.php';
    }
}