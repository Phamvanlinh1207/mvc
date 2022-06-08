<?php
require_once './Model/CategoryModel.php';
class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
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
        $categoryList = $this->categoryModel->all();
        require_once './View/Admin/categories/index.php';
    }

    private function createPage(){
        require_once './View/Admin/categories/create.php';
    }

    private function storePage(){
        $this->categoryModel->create(
            array(
                'name' => $_POST['name'],
                'description' => $_POST['description']
            )
        );

        redirect(admin_url_pattern('categoryController', 'index'));
    }

    private function editPage(){
        $category = $this->categoryModel->find($_GET['id']);
        require_once './View/Admin/categories/edit.php';
    }

    private function updatePage(){
        $this->categoryModel->update(
            array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'description' => $_POST['description']
            )
        );

        redirect(admin_url_pattern('categoryController', 'index'));
    }

    private function deletePage(){
        if(!isset($_GET['id'])) die();
        $this->categoryModel->delete($_GET['id']);

        redirect(admin_url_pattern('categoryController', 'index'));
    }
}