<style>
    .dangxuat {
        margin-left: 30px;
    }
    .search-wrapper{
        margin-left: 42px;
    }
</style>
<header>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="logo col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <p>Chào mừng bạn đã đến với Big Shoe !</p>
                </div>
                <div class="logo col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="text-align:right ;">
                    <p>Liên hệ: 0987208055 / Email: phamvanlinh@gmail.com</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="logo col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <img src="./public/images/logo.png" alt="">
                </div>
                <!-- timkiem -->
                <div class="logo col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="search-wrapper">
                        <form class="search" method="GET">
                            <input type="hidden" name="controller" value="homeController">
                            <input type="hidden" name="page" value="search">
                            <a href="#">Xu hướng tìm kiếm</a>
                            <a href="#">Giày da</a>
                            <a href="#">Giày thể thao nam</a>
                            <a href="#">Giày nữ</a>
                            <input type="text" name="q" class="timkiem" placeholder="Tìm kiếm ..." class="search__input">
                        </form>
                        <!-- script tìm kiếm -->

                    </div>
                </div>
                <!-- giohang -->
                <div class="logo col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                    <div class="people">
                        <i class="logo fa fa-users" aria-hidden="true"></i><br>
                        <?php if ($this->auth->user()) { ?>
                            <a class="btn hover-white dangxuat" href="<?php echo url_pattern('authController', 'logout'); ?>" role="button">Đăng xuất</a>
                        <?php } else { ?>
                            <a href="<?php echo url_pattern('homeController', 'login'); ?>">Đăng nhập</a> / <a href="<?php echo url_pattern('authController', 'register'); ?>"> Đăng Ký</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="logo col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-1">
                    <div class="people">
                        <i class="giohang fa fa-shopping-cart" aria-hidden="true"></i><br>
                        <a href="<?php echo url_pattern('homeController', 'cart'); ?>">Giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu -->
    <div class="menu">
        <ul>
            <li><a href="<?php echo url_pattern('homeController', 'home'); ?>"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
            <li><a href="<?php echo url_pattern('homeController', 'introduce'); ?>">Về chúng tôi</a></li>
            <li><a href="<?php echo url_pattern('homeController', 'product'); ?>">Sản phẩm</a></li>
            <li><a href="<?php echo url_pattern('homeController', 'news'); ?>">Tin tức</a></li>
            <li><a href="<?php echo url_pattern('homeController', 'contact'); ?>">Liên hệ</a></li>
        </ul>
    </div>

</header>