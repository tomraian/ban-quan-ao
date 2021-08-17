<?php
    // session_start();
    include_once './database/connect.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coron - Fashion eCommerce Bootstrap4 Template</title>
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
                                        <li><a href="contact.html" title="Contact">Liên hệ</a></li>
                                        <li><a href="my-account.html" title="My account">Tài khoản</a></li>
                                        <li><a href="?giohang" title="My cart">Giỏ hàng</a></li>
                                        <li><a href="login.html" title="Login">Đăng nhập</a></li>
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
                                    <a href="index.php"><img src="assets\img\logo\logo.jpg.png" alt=""></a>
                                </div>
                            </div>
                            <!--logo end-->
                            <div class="col-lg-9 col-md-9">
                                <div class="header_right_info">
                                    <div class="search_bar">
                                        <form action="#">
                                            <input placeholder="Search..." type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="shopping_cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> 2Items - $209.44 <i
                                                class="fa fa-angle-down"></i></a>

                                        <!--mini cart-->
                                        <div class="mini_cart">
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="assets\img\cart\cart.jpg" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">lorem ipsum dolor</a>
                                                    <span class="cart_price">$115.00</span>
                                                    <span class="quantity">Qty: 1</span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a title="Remove this item" href="#"><i
                                                            class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="assets\img\cart\cart2.jpg" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">Quisque ornare dui</a>
                                                    <span class="cart_price">$105.00</span>
                                                    <span class="quantity">Qty: 1</span>
                                                </div>
                                                <div class="cart_remove">
                                                    <a title="Remove this item" href="#"><i
                                                            class="fa fa-times-circle"></i></a>
                                                </div>
                                            </div>
                                            <div class="shipping_price">
                                                <span> Shipping </span>
                                                <span> $7.00 </span>
                                            </div>
                                            <div class="total_price">
                                                <span> total </span>
                                                <span class="prices"> $227.00 </span>
                                            </div>
                                            <div class="cart_button">
                                                <a href="checkout.html"> Check out</a>
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
                                                <li><a href="contact.html">liên hệ</a></li>

                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>
                                            <ul>
                                                <li><a href="index.html">Home</a>
                                                    <div>
                                                        <div>
                                                            <ul>
                                                                <li><a href="index.html">Home 1</a></li>
                                                                <li><a href="index-2.html">Home 2</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="shop.html">shop</a>
                                                    <div>
                                                        <div>
                                                            <ul>
                                                                <li><a href="shop-list.html">shop list</a></li>
                                                                <li><a href="shop-fullwidth.html">shop Full Width
                                                                        Grid</a></li>
                                                                <li><a href="shop-fullwidth-list.html">shop Full Width
                                                                        list</a></li>
                                                                <li><a href="shop-sidebar.html">shop Right Sidebar</a>
                                                                </li>
                                                                <li><a href="shop-sidebar-list.html">shop list Right
                                                                        Sidebar</a></li>
                                                                <li><a href="single-product.html">Product Details</a>
                                                                </li>
                                                                <li><a href="single-product-sidebar.html">Product
                                                                        sidebar</a></li>
                                                                <li><a href="single-product-video.html">Product Details
                                                                        video</a></li>
                                                                <li><a href="single-product-gallery.html">Product
                                                                        Details Gallery</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="#">women</a>
                                                    <div>
                                                        <div>
                                                            <div>
                                                                <h3><a href="#">Accessories</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Cocktai</a></li>
                                                                    <li><a href="#">day</a></li>
                                                                    <li><a href="#">Evening</a></li>
                                                                    <li><a href="#">Sundresses</a></li>
                                                                    <li><a href="#">Belts</a></li>
                                                                    <li><a href="#">Sweets</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">HandBags</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Accessories</a></li>
                                                                    <li><a href="#">Hats and Gloves</a></li>
                                                                    <li><a href="#">Lifestyle</a></li>
                                                                    <li><a href="#">Bras</a></li>
                                                                    <li><a href="#">Scarves</a></li>
                                                                    <li><a href="#">Small Leathers</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Tops</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Evening</a></li>
                                                                    <li><a href="#">Long Sleeved</a></li>
                                                                    <li><a href="#">Shrot Sleeved</a></li>
                                                                    <li><a href="#">Tanks and Camis</a></li>
                                                                    <li><a href="#">Sleeveless</a></li>
                                                                    <li><a href="#">Sleeveless</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <a href="#"><img src="assets\img\banner\banner1.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                            <div>
                                                                <a href="#"><img src="assets\img\banner\banner2.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="#">men</a>
                                                    <div>
                                                        <div>
                                                            <div>
                                                                <h3><a href="#">Rings</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Platinum Rings</a></li>
                                                                    <li><a href="#">Gold Ring</a></li>
                                                                    <li><a href="#">Silver Ring</a></li>
                                                                    <li><a href="#">Tungsten Ring</a></li>
                                                                    <li><a href="#">Sweets</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Bands</a></h3>
                                                                <ul>
                                                                    <li><a href="#">Platinum Bands</a></li>
                                                                    <li><a href="#">Gold Bands</a></li>
                                                                    <li><a href="#">Silver Bands</a></li>
                                                                    <li><a href="#">Silver Bands</a></li>
                                                                    <li><a href="#">Sweets</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <a href="#"><img src="assets\img\banner\banner3.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </li>
                                                <li><a href="#">pages</a>
                                                    <div>
                                                        <div>
                                                            <div>
                                                                <h3><a href="#">Column1</a></h3>
                                                                <ul>
                                                                    <li><a href="portfolio.html">Portfolio</a></li>
                                                                    <li><a href="portfolio-details.html">single
                                                                            portfolio </a></li>
                                                                    <li><a href="about.html">About Us </a></li>
                                                                    <li><a href="about-2.html">About Us 2</a></li>
                                                                    <li><a href="services.html">Service </a></li>
                                                                    <li><a href="my-account.html">my account </a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Column2</a></h3>
                                                                <ul>
                                                                    <li><a href="blog.html">Blog </a></li>
                                                                    <li><a href="blog-details.html">Blog Details </a>
                                                                    </li>
                                                                    <li><a href="blog-fullwidth.html">Blog FullWidth</a>
                                                                    </li>
                                                                    <li><a href="blog-sidebar.html">Blog Sidebar</a>
                                                                    </li>
                                                                    <li><a href="faq.html">Frequently Questions</a></li>
                                                                    <li><a href="404.html">404</a></li>
                                                                </ul>
                                                            </div>
                                                            <div>
                                                                <h3><a href="#">Column3</a></h3>
                                                                <ul>
                                                                    <li><a href="contact.html">Contact</a></li>
                                                                    <li><a href="cart.html">cart</a></li>
                                                                    <li><a href="checkout.html">Checkout </a></li>
                                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                                    <li><a href="login.html">Login</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li><a href="blog.html">blog</a>
                                                    <div>
                                                        <div>
                                                            <ul>
                                                                <li><a href="blog-details.html">blog details</a></li>
                                                                <li><a href="blog-fullwidth.html">blog fullwidth</a>
                                                                </li>
                                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li><a href="contact.html">contact us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>