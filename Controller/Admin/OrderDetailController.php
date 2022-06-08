<?php
require_once './Model/OrderDetailModel.php';

class OrderDetailController {
    private $orderDetailModel;

    public function __construct() {
        $this->orderDetailModel = new OrderDetailModel();
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
            case 'orderdetail':
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
        $orderdetailList = $this->orderDetailModel->all();
        $info_user = $_SESSION['infoUser'];
        $user = $_SESSION['user'];
        
        require_once './View/Admin/orders_details/index.php';
    }

    private function createPage(){
        require_once './View/Admin/orders_details/create.php';
    }

    private function storePage(){
        $this->orderDetailModel->create(
            array(
                'orders_code' => $_POST['orders_code'],
                'products_id' => $_POST['products_id'],
                'quantity' => $_POST['quantity'],
                 
            )
        );

        redirect(admin_url_pattern('orderdetailController', 'index'));
    }

    private function editPage(){
        $order = $this->orderDetailModel->find($_GET['id']);
        require_once './View/Admin/orders_details/edit.php';
    }

    private function updatePage(){
        $this->orderDetailModel->update(
            array(
                'orders_code' => $_POST['orders_code'],
                'products_id' => $_POST['products_id'],
                'quantity' => $_POST['quantity'],
                 
                 
            )
        );

        redirect(admin_url_pattern('orderdetailController', 'index'));
    }

    private function deletePage(){
        if(!isset($_GET['id'])) die();
        $this->orderDetailModel->delete($_GET['id']);

        redirect(admin_url_pattern('orderdetailController', 'index'));
    }
    
}