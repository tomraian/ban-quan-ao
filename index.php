<!--header start -->
<?php
    include './inc/header.php';
?>
<!--pos home section-->
<?php
    if(isset($_GET['tat-ca-san-pham'])){
        include './inc/all-shop.php';
    }
    else if(isset($_GET['danhmuc'])){
        include './inc/shop.php';
    }
    else if(isset($_GET['sanpham'])){
        include './inc/product.php';
    }
    else if(isset($_GET['giohang'])){
        include './inc/cart.php';
    }
    else if(isset($_GET['thanhtoan'])){
        include './inc/checkout.php';
    }
    else if(isset($_GET['hoan-tat-thanh-toan'])){
        include './inc/order-ok.php';
    }
    else{
        include './inc/home.php';
    }
?>
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

<!--footer area start-->
<?php
    include './inc/footer.php';
?>
<!--footer area end-->