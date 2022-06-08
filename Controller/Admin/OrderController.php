<?php
require_once './Model/OrderModel.php';

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel();
    }

    public function invoke() {
        if(!isset($_GET['page'])) die();

        switch($_GET['page']){
            case 'index':
                $this->indexPage();
                break;
            case 'create':
                $this->createPage();
                break;
            case 'edit':
                $this->editPage();
                break;
            case 'delete':
                $this->deletePage();
                break;
            case 'order':
                $this->storePage();
                break;
        }

        if(!isset($_POST['page'])) die();
        
        switch($_POST['page']){
            case 'store':
                $this->storePage();
                break;
            case 'update':
                $this->updatePage();
                break;
        }
    }

    private function indexPage(){
        $orderList = $this->orderModel->all();
        require_once './View/Admin/orders/index.php';
    }

    private function createPage(){
        require_once './View/Admin/orders/create.php';
    }

    private function storePage(){
        $this->orderModel->create(
            array(
                'code' => $_POST['code'],
                'description' => $_POST['description'],
                'users_id' => $_POST['users_id']
                
            )
        );

        redirect(admin_url_pattern('orderController', 'index'));
    }

    private function editPage(){
        $order = $this->orderModel->find($_GET['id']);
        require_once './View/Admin/orders/edit.php';
    }

    private function updatePage(){
        $this->orderModel->update(
            array(
                'code' => $_POST['code'],
                'description' => $_POST['description'],
                'users_id' => $_POST['users_id']
                 
            )
        );

        redirect(admin_url_pattern('orderController', 'index'));
    }

    private function deletePage(){
        if(!isset($_GET['id'])) die();
        $this->orderModel->delete($_GET['id']);

        redirect(admin_url_pattern('orderController', 'index'));
    }
    
}