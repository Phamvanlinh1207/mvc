<?php
require_once './Model/OrderModel.php';

class StatisticController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
    }

    public function invoke() {
        if(!isset($_GET['page'])) die();

        switch($_GET['page']){
            case 'index':
                $this->orderThisMonth();
                break;
        }
    }

    public function orderThisMonth(){
         $year = date("Y");
         $month = date("M");
         $day = date("D");
         $begin = sprintf("%s-%s-01", $year, $month);
         $end = sprintf("%s-%s-%s", $year, $month, $day);

         $orders = $this->orderModel->findOrdersByTime('2022-05-31','2022-06-07');
         echo json_encode($orders);
         die();
    }

    public function orderToday(){
        $begin = 
        $end = date("Y-m-d H:i:s");
    }

    public function orderLastWeek(){

    }
}