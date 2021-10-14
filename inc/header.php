<?php
    session_start();
    include_once './database/connect.php';
    $UrlRequest = $_SERVER['QUERY_STRING'];
    $getUrl = explode('&', $UrlRequest) ;
    $url = reset($getUrl);
    if(isset($_SERVER["HTTP_REFERER"])){
    $beforeUrl = $_SERVER["HTTP_REFERER"];
    }
?>

<?php
if(isset($_GET['dang-xuat'])){
    session_start();
    unset($_SESSION['dangnhap']);
    session_destroy();
    header('Location: index.php');
}
else if(isset($_GET['xoa'])){
    $cartId = $_GET['xoa'];
    $query = "DELETE FROM `tbl_cart` WHERE cartId = '$cartId'";
    $result = mysqli_query($connect, $query);
    if(isset($result)){
            echo "<script>window.location = '?$url' </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        <?php 
        if(isset($title))
        {
            echo $title;
        }
        else{
            echo "Coron";
        } 
        ?>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
    <!-- all css here -->
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\plugin.css">
    <link rel="stylesheet" href="assets\css\bundle.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="assets\css\responsive.css">
    <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>

</head>

<body>
    <!-- Add your site or application content here -->
    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--header area -->
                <div class="header_area">
                    <!--header top-->
                    <div class="header_top">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="header_links">
                                    <ul>
                                        <li><a href="?lien-he" title="Contact">Liên hệ</a></li>
                                        <li><a href="?cai-dat-tai-khoan" title="My account">Cài đặt tài khoản</a></li>
                                        <li><a href="?giohang" title="My cart">Giỏ hàng</a></li>
                                        <li><a href="?kiem-tra-don-hang" title="My cart">Kiểm tra đơn hàng</a></li>
                                        <?php 
                                        if(isset($_SESSION['userName']))
                                        {
                                            echo '<li><a href="?cai-dat-tai-khoan">'.$_SESSION['userName'].'</a></li>';
                                        }
                                        ?>
                                        <?php
                                        if(isset($_SESSION['dangnhap'])){
                                            echo '<li><a href="?dang-xuat" title="Login">Đăng xuất</a></li>';
                                        }
                                        else{
                                            echo '<li><a href="?tai-khoan" title="Login">Đăng nhập/Đăng ký</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header top end-->

                    <!--header middel-->
                    <div class="header_middel">
                        <div class="row align-items-center">
                            <!--logo start-->
                            <div class="col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.php"><img src="assets\img\logo\logo.png" alt=""></a>
                                </div>
                            </div>
                            <!--logo end-->
                            <div class="col-lg-9 col-md-9">
                                <div class="header_right_info">
                                    <div class="search_bar">
                                        <form action="" method="GET">
                                            <input placeholder="Tìm kiếm sản phẩm" type="text" name="tim-kiem">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="shopping_cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i>
                                            <?php echo mysqli_num_rows(mysqli_query($connect,"SELECT * FROM tbl_cart WHERE cartStatus = 1")) ;
                                            ?> sản phẩm chờ thanh toán
                                            <i class="fa fa-angle-down"></i></a>
                                        <!--mini cart-->
                                        <div class="mini_cart">
                                            <?php
                                    $query = "SELECT
                                        tbl_cart.*,
                                        tbl_product.*
                                    FROM
                                        tbl_product
                                    INNER JOIN tbl_cart ON tbl_product.productId = tbl_cart.productId WHERE  cartStatus = 1 ORDER BY cartId DESC";
                                    $result = mysqli_query($connect,$query);
                                    if($result){
                                        $total = 0;
                                        while($cart = mysqli_fetch_array($result)){
                                            $old_price = number_format($cart['productPrice'], 0, "", ",")." VNĐ";
                                            $new_price = number_format($cart['productDiscount'], 0, "", ",")." VNĐ";
                                            $old_price_total = number_format($cart['productPrice'] * $cart['cartOrderAmount'], 0, "", ",")." VNĐ";
                                            $new_price_total = number_format($cart['productDiscount']* $cart['cartOrderAmount'], 0, "", ",")." VNĐ";
                                            if($cart["productDiscount"] < 1000){
                                                $total += $cart['productPrice'] * $cart['cartOrderAmount'];
                                            }
                                            else{
                                                $total += $cart['productDiscount']* $cart['cartOrderAmount'];
                                            }
                                    ?>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="./uploads/<?php echo $cart['productImage']?>"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a class="cart_info_name"
                                                        href="?sanpham=<?php echo $cart['productId']?>/<?php echo $cart['productLink']?>"><?php echo $cart['productName'] ?></a>
                                                    <span class="cart_price">
                                                        <?php
                                                        if($cart["productDiscount"] < 1000){
                                                            echo "<span class='product_price'>$old_price_total</span>";
                                                        }
                                                        else{
                                                            echo "<span class='product_price'>$new_price_total</span>";
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class="quantity">Số lượng:
                                                        <?php echo $cart['cartOrderAmount'] ?></span>
                                                    <span class="quantity">Phân loại:
                                                        <?php echo $cart['cartSize'] ?></span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a title="Remove this item"
                                                        href="?<?php echo $UrlRequest ?>&xoa=<?php echo $cart['cartId']?>"><i
                                                            class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                            <?php 
                                                }
                                            }
                                            ?>
                                            <div class="shipping_price">
                                                <span> Tiền hàng </span>
                                                <span> <?php 
                                        if($total <= 0 ){
                                            echo 'Giỏ hàng trống';
                                        }
                                        else{
                                            echo $productTotal = number_format($total, 0, "", ",")." VNĐ";
                                            echo "<input type='hidden' name='productTotal' value=\"$productTotal\">";
                                    }
                                    ?></span>
                                            </div>
                                            <div class="shipping_price">
                                                <span> Tiền vận chuyển </span>
                                                <span> 30,000 VNĐ </span>
                                            </div>
                                            <div class="total_price">
                                                <span> Tổng cộng </span>
                                                <span class="prices">
                                                    <?php 
                                                        if($total <= 0 ){
                                                            echo '----------';
                                                        }
                                                        else{
                                                            echo $maxTotal = number_format($total + 30000, 0, "", ",")." VNĐ" ;
                                                            echo "<input type='hidden' name='maxTotal' value=\"$maxTotal\">";
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="cart_button">
                                                <a href="?giohang"> Xem chi tiết</a>
                                            </div>
                                        </div>
                                        <!--mini cart end-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header middel end-->
                    <div class="header_bottom">
                        <div class="row">
                            <div class="col-12">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="index.php">trang chủ</a>
                                                </li>
                                                <li><a href="#">sản phẩm</a>
                                                    <div class="mega_menu jewelry">
                                                        <div class="mega_items jewelry">
                                                            <ul>
                                                                <li>
                                                                    <a href="?tat-ca-san-pham">Tất cả sản phẩm</a>
                                                                </li>
                                                                <?php
                                                                    $query = "SELECT * FROM tbl_category ORDER BY categoryId DESC";
                                                                    $result = mysqli_query($connect, $query);
                                                                    if(mysqli_num_rows($result) > 0)
                                                                    {
                                                                        while($category = mysqli_fetch_array($result)){
                                                                ?>
                                                                <li><a
                                                                        href="?danhmuc=<?php echo $category['categoryId']?>/<?php  echo $category['categoryLink'] ?>"><?php echo $category['categoryName'] ?></a>
                                                                </li>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="?he-thong-cua-hang">hệ thống cửa hàng</a>
                                                    <div class="mega_menu jewelry">
                                                        <div class="mega_items jewelry">
                                                            <ul>
                                                                <?php
                                                                    $query = "SELECT * FROM tbl_store ORDER BY storeId DESC";
                                                                    $result = mysqli_query($connect, $query);
                                                                    if(mysqli_num_rows($result) > 0)
                                                                    {
                                                                        while($store = mysqli_fetch_array($result)){
                                                                ?>
                                                                <li><a
                                                                        href="?he-thong-cua-hang"><?php echo $store['storeName']?></a>
                                                                </li>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="?lien-he">liên hệ</a></li>
                                                <li><a href="?gioi-thieu">Giới thiệu</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="index.php">trang chủ</a>
                                                </li>
                                                <li><a href="#">sản phẩm</a>
                                                    <div class="mega_menu jewelry">
                                                        <div class="mega_items jewelry">
                                                            <ul>
                                                                <li>
                                                                    <a href="?tat-ca-san-pham">Tất cả sản phẩm</a>
                                                                </li>
                                                                <?php
                                                                    $query = "SELECT * FROM tbl_category ORDER BY categoryId DESC";
                                                                    $result = mysqli_query($connect, $query);
                                                                    if(mysqli_num_rows($result) > 0)
                                                                    {
                                                                        while($category = mysqli_fetch_array($result)){
                                                                ?>
                                                                <li><a
                                                                        href="?danhmuc=<?php echo $category['categoryId']?>/<?php  echo $category['categoryLink'] ?>"><?php echo $category['categoryName'] ?></a>
                                                                </li>
                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="contact.php">liên hệ</a></li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>