<?php
require_once './Model/PayModel.php';

class PayController {
    private $payModel;

    public function __construct() {
        $this->payModel = new PayModel();
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
            case 'pay':
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
        $payList = $this->payModel->all();
        require_once './View/Admin/pay/index.php';
    }

    private function createPage(){
        require_once './View/Admin/pay/create.php';
    }

    private function storePage(){
        $this->payModel->create(
            array(
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'note' => $_POST['note']
            )
        );

        redirect(admin_url_pattern('payController', 'index'));
    }

    private function editPage(){
        $pay = $this->payModel->find($_GET['id']);
        require_once './View/Admin/pay/edit.php';
    }

    private function updatePage(){
        $this->payModel->update(
            array(
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'note' => $_POST['note']
            )
        );

        redirect(admin_url_pattern('payController', 'index'));
    }

    private function deletePage(){
        if(!isset($_GET['id'])) die();
        $this->payModel->delete($_GET['id']);

        redirect(admin_url_pattern('payController', 'index'));
    }
    
}