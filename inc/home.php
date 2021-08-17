<?php 

?>

<div class="pos_home_section">
    <div class="row">
        <!--banner slider start-->
        <div class="col-12">
            <div class="banner_slider slider_two">
                <div class="slider_active owl-carousel">
                    <?php
                        $query = "SELECT * FROM tbl_slider ORDER BY sliderId Desc LIMIT 5";
                        $result = mysqli_query($connect, $query);
                        if(mysqli_num_rows($result) > 0){
                            while($slider = mysqli_fetch_array($result)){
                    ?>
                    <div class="single_slider"
                        style="background-image: url('uploads/<?php echo $slider['sliderImage'] ?>')">
                        <div class="slider_content">
                            <div class="slider_content_inner">
                                <h1><?php echo $slider['sliderName'] ?></h1>
                                <p><?php echo $slider['sliderDesc'] ?>.</p>
                                <a href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                          }
                        }
                    ?>
                </div>
            </div>
            <!--banner slider start-->
        </div>
    </div>
    <!--new product area start-->
    <div class="new_product_area product_two mtb-10">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3> Sản phẩm mới</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                <?php
                    $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 5";
                    $result = mysqli_query($connect, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $i = 0;
                        while($product = mysqli_fetch_array($result))
                        {
                            $old_price = number_format($product['productPrice'], 0, "", ",")." VNĐ";
                            $new_price = number_format($product['productDiscount'], 0, "", ",")." VNĐ";
                            $i++;
                ?>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a
                                href="?sanpham=<?php echo $product['productId'] ?>/<?php echo $product['productLink'] ?>"><img
                                    src="./uploads/<?php echo $product['productImage']?>" alt=""></a>
                            <div class="img_icone">
                                <img src="assets\img\cart\span-new.png" alt="">
                            </div>
                            <div class="product_action">
                                <?php
                                        $productId = $product['productId'];
                                        $productLink = $product['productLink'];
                                        if($product['productAmount'] > 0 ){
                                            echo "<a href='?giohang&Id=$productId/$productLink'>
                                            <i class='fa fa-shopping-cart'></i> Thêm vào giỏ hàng</a>";
                                        }
                                        else{
                                            echo '<a>Hết hàng</a>';
                                        }
                                    ?>
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
    </div>
    <!--new product area start-->

    <!--featured product area start-->
    <div class="new_product_area product_two mtb-10">
        <div class="row">
            <div class="col-12">
                <div class="block_title">
                    <h3> Sản phẩm nổi bật</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="single_p_active owl-carousel">
                <?php
                    $query = "SELECT * FROM tbl_product WHERE productFeatured = 1 ORDER BY productId DESC LIMIT 5";
                    $result = mysqli_query($connect, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        $i = 0;
                        while($productFeatured = mysqli_fetch_array($result))
                        {
                            $old_price = number_format($productFeatured['productPrice'], 0, "", ",")." VNĐ";
                            $new_price = number_format($productFeatured['productDiscount'], 0, "", ",")." VNĐ";
                            $i++;
                ?>
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a
                                href="?sanpham=<?php echo $productFeatured['productId'] ?>/<?php echo $productFeatured['productLink'] ?>"><img
                                    src="./uploads/<?php echo $productFeatured['productImage']?>" alt=""></a>
                            <div class="img_icone">
                                <img src="assets\img\cart\span-new.png" alt="">
                            </div>
                            <div class="product_action">
                                <?php
                                        $productId = $productFeatured['productId'];
                                        $productLink = $productFeatured['productLink'];
                                        if($productFeatured['productAmount'] > 0 ){
                                            echo "<a href='?giohang&Id=$productId/$productLink'>
                                            <i class='fa fa-shopping-cart'></i> Thêm vào giỏ hàng</a>";
                                        }
                                        else{
                                            echo '<a>Hết hàng</a>';
                                        }
                                    ?>
                            </div>
                        </div>
                        <div class="product_content text-center">
                            <div class="content_price">
                                <!-- giá mới  -->
                                <?php
                                    if($productFeatured['productDiscount'] < 1000){
                                        echo "<span>".$old_price."</span>";
                                    }
                                    else{
                                        echo "<span>".$new_price."</span>";
                                    }
                                ?>
                                <!-- giá cũ  -->
                                <span class="old-price">
                                    <?php
                                        if($productFeatured['productDiscount'] > 1000){
                                            echo $old_price;
                                        }
                                    ?>
                                </span>
                            </div>
                            <h3 class="product_title"><a
                                    href="?sanpham=<?php echo $productFeatured['productId'] ?>/<?php echo $productFeatured['productLink'] ?>"><?php echo $productFeatured['productName']?></a>
                            </h3>
                        </div>

                        <div class="product_info">
                            <ul>
                                <li><a href="?sanpham=<?php echo $productFeatured['productId'] ?>/<?php echo $productFeatured['productLink'] ?>"
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
    </div>
    <!--featured product area start-->

    <!--blog area start-->
    <div class="blog_area blog_two">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="blog-details.html"><img src="assets\img\blog\blog3.jpg" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    <a href="#">Tech</a>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                        <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively
                            pursue multidisciplinary human capital for interoperable.</p>
                        <div class="post_footer">
                            <div class="post_meta">
                                <ul>
                                    <li>Jun 20, 2018</li>
                                    <li>3 Comments</li>
                                </ul>
                            </div>
                            <div class="Read_more">
                                <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="blog-details.html"><img src="assets\img\blog\blog4.jpg" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    <a href="#">Men</a>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                        <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively
                            pursue multidisciplinary human capital for interoperable.</p>
                        <div class="post_footer">
                            <div class="post_meta">
                                <ul>
                                    <li>Jun 20, 2018</li>
                                    <li>3 Comments</li>
                                </ul>
                            </div>
                            <div class="Read_more">
                                <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_blog">
                    <div class="blog_thumb">
                        <a href="blog-details.html"><img src="assets\img\blog\blog1.jpg" alt=""></a>
                    </div>
                    <div class="blog_content">
                        <div class="blog_post">
                            <ul>
                                <li>
                                    <a href="#">Women</a>
                                </li>
                            </ul>
                        </div>
                        <h3><a href="blog-details.html">When an unknown took a galley of type.</a></h3>
                        <p>Distinctively simplify dynamic resources whereas prospective core competencies. Objectively
                            pursue multidisciplinary human capital for interoperable.</p>
                        <div class="post_footer">
                            <div class="post_meta">
                                <ul>
                                    <li>Jun 20, 2018</li>
                                    <li>3 Comments</li>
                                </ul>
                            </div>
                            <div class="Read_more">
                                <a href="blog-details.html">Read more <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--blog area end-->

    <!--brand logo strat-->
    <div class="brand_logo brand_two">
        <div class="block_title">
            <h3>Brands</h3>
        </div>
        <div class="row">
            <div class="brand_active owl-carousel">
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="#"><img src="assets\img\brand\brand1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="#"><img src="assets\img\brand\brand2.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="#"><img src="assets\img\brand\brand3.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="#"><img src="assets\img\brand\brand4.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="#"><img src="assets\img\brand\brand5.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="single_brand">
                        <a href="#"><img src="assets\img\brand\brand6.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand logo end-->
</div>