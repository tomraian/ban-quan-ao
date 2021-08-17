<?php
    if(isset($_GET['danhmuc'])){
        $danhmuc = $_GET['danhmuc'];
    }
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--pos home section-->
<div class=" pos_home_section">
    <div class="row pos_home">
        <?php 
            include './inc/sidebar.php';
        ?>
        <div class="col-lg-9 col-md-12">
            <!--shop toolbar start-->
            <div class="shop_toolbar mb-35">

                <div class="list_button">
                    <ul class="nav" role="tablist">
                        <li>
                            <a class="active" data-toggle="tab" href="#large" role="tab" aria-controls="large"
                                aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><i
                                    class="fa fa-th-list"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--shop toolbar end-->

            <!--shop tab product-->
            <div class="shop_tab_product">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="large" role="tabpanel">
                        <div class="row">
                            <?php
                                $query = "SELECT * FROM tbl_category,tbl_product WHERE tbl_category.categoryId = tbl_product.categoryId AND tbl_category.categoryId ='$danhmuc' ORDER BY productId DESC";
                                $result = mysqli_query($connect, $query);
                                
                                if(mysqli_num_rows($result) > 0)
                                {
                                    while($product = mysqli_fetch_array($result)){
                                    $old_price = number_format($product['productPrice'], 0, "", ",")." VNĐ";
                                    $new_price = number_format($product['productDiscount'], 0, "", ",")." VNĐ";
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a
                                            href="?sanpham=<?php echo $product['productId'] ?>/<?php echo $product['productLink'] ?>"><img
                                                src="./uploads/<?php echo $product['productImage']?>" alt=""></a>
                                        <div class="img_icone">
                                            <img src="assets\img\cart\span-new.png" alt="">
                                        </div>
                                        <div class="product_action">
                                            <a
                                                href="?giohang&Id=<?php echo $product['productId'] ?>/<?php echo $product['productLink']?>">
                                                <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="product_content text-center">
                                        <div class="content_price">
                                            <!-- giá mới  -->
                                            <?php
                                                if($product['productDiscount'] < 1000){
                                                   echo "<span>".$old_price."</span>";
                                                }
                                                else{
                                                   echo "<span>".$new_price."</span>";
                                                }
                                            ?>
                                            <!-- giá cũ  -->
                                            <span class="old-price">
                                                <?php
                                                    if($product['productDiscount'] > 1000){
                                                        echo $old_price;
                                                    }
                                                ?>
                                            </span>
                                        </div>
                                        <h3 class="product_title"><a
                                                href="?sanpham=<?php echo $product['productId'] ?>/<?php echo $product['productLink'] ?>"><?php echo $product['productName']?></a>
                                        </h3>
                                    </div>

                                    <div class="product_info">
                                        <ul>
                                            <li><a href="?sanpham=<?php echo $product['productId'] ?>/<?php echo $product['productLink'] ?>"
                                                    modal" data-target="#modal_box" title="Quick view">Xem chi tiết</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        <?php
                            $query = "SELECT * FROM tbl_category,tbl_product WHERE tbl_category.categoryId = tbl_product.categoryId AND tbl_category.categoryId ='$danhmuc' ORDER BY productId DESC";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($product = mysqli_fetch_array($result)){
                                $old_price = number_format($product['productPrice'], 0, "", ",")." VNĐ";
                                $new_price = number_format($product['productDiscount'], 0, "", ",")." VNĐ";
                        ?>
                        <div class="product_list_item mb-35">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_thumb">
                                        <a
                                            href="?sanpham=<?php echo $product['productId'] ?>/<?php echo $product['productLink'] ?>"><img
                                                src="./uploads/<?php echo $product['productImage'] ?>" alt=""></a>
                                        <div class="hot_img">
                                            <img src="assets\img\cart\span-hot.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-6">
                                    <div class="list_product_content">
                                        <div class="list_title">
                                            <h3><a
                                                    href="?sanpham=<?php echo $product['productId'] ?>/<?php echo $product['productLink'] ?>"><?php echo $product['productName'] ?></a>
                                            </h3>
                                        </div>
                                        <p class="design"> <?php echo $product['productDesc'] ?></p>
                                        <div class="content_price">
                                            <!-- giá mới  -->
                                            <?php
                                                if($product['productDiscount'] < 1000){
                                                   echo "<span>".$old_price."</span>";
                                                }
                                                else{
                                                   echo "<span>".$new_price."</span>";
                                                }
                                            ?>
                                            <!-- giá cũ  -->
                                            <span class="old-price">
                                                <?php
                                                    if($product['productDiscount'] > 1000){
                                                        echo $old_price;
                                                    }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="add_links">
                                            <ul>
                                                <li>
                                                    <a href="#" title="add to cart">
                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                        <span>Thêm vào giỏ hàng</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>

                </div>
            </div>
            <!--shop tab product end-->

            <!--pagination style start-->
            <div class="pagination_style">
                <div class="page_number">
                    <span>Trang: </span>
                    <ul>
                        <li>«</li>
                        <li class="current_number">1</li>
                        <li><a href="#">2</a></li>
                        <li>»</li>
                    </ul>
                </div>
            </div>
            <!--pagination style end-->
        </div>
    </div>
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

<!--footer area start-->