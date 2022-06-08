<?php
include_once './View/inc/header.php';
include_once './Model/Database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Trade</title>
    
	<link rel="stylesheet" href="./Public/css/style1.css">
        
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- Own Carousel -->
    <link rel="stylesheet" href="./Public/css/owl.carousel.css">
    <link rel="stylesheet" href="./Public/css/owl.theme.green.css">
     <!-- JQuery & Own Carousel -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./Public/js/owl.carousel.js"></script>
    <script src="./Public/js/web.js"></script>
</head>
    
    
    <div class="box mt-3 ">
        <div class="row " >
            <!--Vùng dữ liệu--> 
            <?php 
                foreach($productList as $product) { ?>
                    <div class="col-xs-2 col-2 col-lg-2 mb-4" >
                        <div class="card"  >
                            <img src="<?php echo $product->image;?>" width="100%" height="200px">
                            <div class="card-body">
                                <a href="single.php?id=<?php echo $product->id; ?>"><?php echo $product->name; ?></a>
                                <h6 class="card-text"><?php echo $product->price; ?>đ</h6>
                                
                                <a  class="btn btn-success" href="order.php?id=<?php echo $product->id; ?>">Thêm vào giỏ </a>
                            </div>
                        </div>
                    </div>                      
            <?php } ?>
        </div>
        <button type="button" class="btn btn-success mt-3" style="margin-left:720px; ">Xem thêm</button>  
    </div>
<?php include_once './View/inc/footer.php'; ?>