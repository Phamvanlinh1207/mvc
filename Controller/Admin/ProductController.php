<?php
require_once './Model/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
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
        $productList = $this->productModel->all();
        require_once './View/Admin/products/index.php';
    }

    private function createPage(){
        require_once './View/Admin/products/create.php';
    }

    private function storePage(){
        $this->productModel->create(
            array(
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'images' => $_POST['images']
            )
        );

        redirect(admin_url_pattern('productController', 'index'));
    }

    private function editPage(){
        $category = $this->productModel->find($_GET['id']);
        require_once './View/Admin/products/edit.php';
    }

    private function updatePage(){
        $this->productModel->update(
            array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'images' => $_POST['images']
            )
        );

        redirect(admin_url_pattern('productController', 'index'));
    }

    private function deletePage(){
        if(!isset($_GET['id'])) die();
        $this->productModel->delete($_GET['id']);

        redirect(admin_url_pattern('productController', 'index'));
    }
}