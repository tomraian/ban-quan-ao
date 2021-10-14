<!--header start -->
<?php
    if(isset($_GET['tat-ca-san-pham'])){
        $title = "Tất cả sản phẩm";
    }
    else if(isset($_GET['danhmuc'])){
        $title = "Danh mục";
    }
    else if(isset($_GET['sanpham'])){
        $title = "Sản phẩm";
    }
    else if(isset($_GET['giohang'])){
        $title = "Giỏ hàng";
    }
    else if(isset($_GET['thanhtoan'])){
        $title = "Thanh toán";
    }
    else if(isset($_GET['hoan-tat-thanh-toan'])){
        $title = "Hoàn tất thanh toán";
    }
    else if(isset($_GET['tai-khoan'])){
        $title = "Đăng nhập/Đăng ký";
    }
    else if(isset($_GET['cai-dat-tai-khoan'])){
        $title = "Cài đặt tài khoản";
    }
    else if(isset($_GET['kiem-tra-don-hang'])){
        $title = "Kiểm tra đơn hàng";
    }
    else if(isset($_GET['lien-he'])){
        $title = "Liên hệ";
    }
    else if(isset($_GET['he-thong-cua-hang'])){
        $title = "Hệ thống cửa hàng";
    }
    else if(isset($_GET['gioi-thieu'])){
        $title = "Giới thiệu";
    }
    else if(isset($_GET['tim-kiem'])){
        $title = "Tìm kiếm";
    }
    else{
        $title = "Trang chủ";
    }
?>
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
    else if(isset($_GET['tai-khoan'])){
        include './inc/login.php';
    }
    else if(isset($_GET['cai-dat-tai-khoan'])){
        include './inc/my-account.php';
    }
    else if(isset($_GET['kiem-tra-don-hang'])){
        include './inc/check-order.php';
    }
    else if(isset($_GET['lien-he'])){
        include './inc/contact.php';
    }
    else if(isset($_GET['he-thong-cua-hang'])){
        include './inc/store.php';
    }
    else if(isset($_GET['gioi-thieu'])){
        include './inc/about.php';
    }
    else if(isset($_GET['tim-kiem'])){
        include './inc/search.php';
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