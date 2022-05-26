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
                            <div class="search">
                                <a href="#">Xu hướng tìm kiếm</a>
                                <a href="#">Giày da</a>
                                <a href="#">Giày thể thao nam</a>
                                <a href="#">Giày nữ</a>

                                <input type="text" name="" class="timkiem" placeholder="Tìm kiếm ..."
                                    class="search__input">
                                <button type="" class="search__button" tabIndex="-1">Tìm kiếm</button>
                            </div>
                            <!-- script tìm kiếm -->

                        </div>
                    </div>
                    <!-- giohang -->
                    <div class="logo col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                        <div class="people">
                            <i class="logo fa fa-users" aria-hidden="true"></i><br>
                            <a href="<?php echo url('login')?>">Đăng nhập</a> / <a href="<?php echo url('registration')?>"> Đăng Ký</a>
                        </div>

                    </div>
                    <div class="logo col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-1">
                        <div class="people">
                            <i class="giohang fa fa-shopping-cart" aria-hidden="true"></i><br>
                            <a href="<?php echo url('cart')?>">Giỏ hàng</a>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- menu -->
        <div class="menu">
            <ul>
                <li><a href="<?php echo url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a></li>
                <li><a href="<?php echo url('introduce')?>">Về chúng tôi</a></li>
                <li><a href="<?php echo url('product')?>">Sản phẩm</a></li>
                <li><a href="<?php echo url('product')?>">Tin tức</a></li>
                <li><a href="<?php echo url('product')?>">Liên hệ</a></li>
            </ul>

        </div>

    </header>