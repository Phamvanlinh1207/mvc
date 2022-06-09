<?php
require_once './Model/OrderModel.php';

class StatisticController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
    }

    public function invoke() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            switch($_GET['page']){
                case 'today':
                    $this->todayPage();
                    break;
                case 'thisWeek':
                    $this->thisWeekPage();
                    break;
                case 'lastMonth':
                    $this->lastMonthPage();
                    break;
            }
        }
    }

    private function todayPage(){
        $timeEnd = date("Y/m/d");
        $datetime = new DateTime('yesterday');
        $timeBegin = $datetime->format('Y-m-d');
        $pendingOrders = $this->orderModel->findOrdersByTime('pending', $timeBegin, $timeEnd);
        $finishedOrders = $this->orderModel->findOrdersByTime('finished', $timeBegin, $timeEnd);

        require_once './View/Admin/statistic/index.php';
    }

    private function thisWeekPage(){
        $day = date('w');
        $timeBegin = date('m-d-Y', strtotime('-'.$day.' days'));
        $timeEnd = date("Y/m/d");;
        $pendingOrders = $this->orderModel->findOrdersByTime('pending', $timeBegin, $timeEnd);
        $finishedOrders = $this->orderModel->findOrdersByTime('finished', $timeBegin, $timeEnd);

        require_once './View/Admin/statistic/index.php';
    }

    private function lastMonthPage(){
        $timeBegin = date("Y-n-j", strtotime("first day of previous month"));
        $timeEnd = date("Y-n-j", strtotime("last day of previous month"));
        $pendingOrders = $this->orderModel->findOrdersByTime('pending', $timeBegin, $timeEnd);
        $finishedOrders = $this->orderModel->findOrdersByTime('finished', $timeBegin, $timeEnd);

        require_once './View/Admin/statistic/index.php';
    }

}