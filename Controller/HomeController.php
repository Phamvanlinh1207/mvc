
<?php

class HomeController
{
    public function __construct()
    {
    }

    public function invoke()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {
                case 'home':
                    $this->homePage();
                    break;
                case 'single':
                    $this->singlePage();
                    break;
                case 'product':
                    $this->productPage();
                    break;
                case 'cart':
                    $this->cartPage();
                    break;
                case 'contact':
                    $this->contactPage();
                    break;
                case 'introduce':
                    $this->introducePage();
                    break;
                case 'registration':
                    $this->registrationPage();
                    break;
                case 'login':
                    $this->loginPage();
                    break;
            }
        }
    }

    private function homePage()
    {
        require_once './View/home.php';
    }
    private function productPage()
    {
        require_once './Model/ProductModel.php';
        $productModel = new ProductModel();
        $productList = $productModel->all();

        require_once './View/product.php';
    }

    private function singlePage()
    {
        require_once './Model/ProductModel.php';
        $productModel = new ProductModel();
        $product = $productModel->find($_GET['id']);

        require_once './View/single.php';
    }
    private function cartPage()
    {
        require_once './Model/ProductModel.php';
        $productModel = new ProductModel();
        $cartList = $productModel->getOrdersBySession();

        require_once './View/cart.php';
    }
    private function contactPage()
    {
        require_once './View/contact.php';
    }
    private function introducePage()
    {
        require_once './View/introduce.php';
    }
    private function registrationPage()
    {
        require_once './View/registration.php';
    }
    private function loginPage()
    {
        require_once './View/login.php';
    }
}
