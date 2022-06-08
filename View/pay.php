<!doctype html>
<html lang="en">

<head>
    <title>Thanh toán</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .content .thongtin h4 {
            color: rgb(50, 162, 248);
        }

        .content .donhang .thongtin1 input {
            padding: 5px;
            width: 250px;
            margin-top: 9px;
        }

        .content .donhang .quayve a {
            text-decoration: none;
        }

        .content .vanchuyen {
            margin-top: 40px;
        }
    </style>
        <link rel="stylesheet" href="./public/css/pay.css">

</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-8 left">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 thongtin">
                            <h4>Big Shoe</h4>
                            <h5>Thông tin nhận hàng</h5>
                            <form id="form" method="POST">
                                <input name="email" type="email" placeholder="Email" /><br>
                                <input name="name" type="text" placeholder="Họ và tên" /><br>
                                <input name="tel" type="tel" placeholder="Số điện thoại (tuỳ chọn)" /><br>
                                <input name="email" type="email" placeholder="Địa chỉ (tuỳ chọn)" /><br>
                                <textarea class="noidung" placeholder="Ghi chú (tuỳ chọn)"></textarea> <br>
                            </form>
                        </div>
                        <div class="col-md-6 vanchuyen">
                            <h5>Vận chuyển</h5>
                            <p class="mt-4">Vui lòng nhập thông tin giao hàng</p>
                            <h5>Thanh toán</h5>
                            <div class="cart">
                                <input type="checkbox" name="vehicle1" value="Xe đạp"> Thanh toán khi giao hàng<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 donhang">
                <h4>Đơn hàng</h4>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="https://bizweb.dktcdn.net/thumb/thumb/100/091/132/products/14-min.jpg?v=1468198130777" alt="" width="50px" height="50px">
                        </div>
                        <div class="col-md-7">
                            <p>Converse Star Eyerow Cut Out</p>
                        </div>
                        <div class="col-md-3">
                            <small>1.000.000đ</small>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-8 thongtin1">
                            <input name="ma" type="text" placeholder="Mã giảm giá" />
                        </div>
                        <div class="col-md-4">
                            <div class="btn-group mt-2">
                                <a href="#" class="btn btn-primary active" aria-current="page">ÁP DỤNG</a>
                            </div>
                        </div>
                        <hr class="mt-4">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            Tạm tính
                        </div>
                        <div class="col-md-4">
                            <p>1.000.000đ</p>
                        </div>
                        <div class="col-md-8">
                            Phí vận chuyển
                        </div>
                        <div class="col-md-4">
                            <p>---</p>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p>Tổng cộng</p>
                        </div>
                        <div class="col-md-4">
                            <p>1.000.000đ</p>
                        </div>
                        <div class="col-md-7 quayve mt-1">
                            <a href="<?php echo url_pattern('homeController', 'cart') ?>">
                                < Quay về trang chủ</a>
                        </div>
                        <div class="col-md-5 btn-group">
                            <a href="#" class="btn btn-primary active" aria-current="page">ĐẶT HÀNG</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>