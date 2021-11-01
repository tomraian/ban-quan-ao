<?php
    if(isset($_GET['sanpham'])){
        $Id = $_GET['sanpham'];
    }
?>
<!--breadcrumbs area start-->
<?php 
    include 'breadcrumbs.php';
?>
<!--breadcrumbs area end-->


<!--product wrapper start-->
<div class="product_details sidebar">
    <div class="row">
        <?php
            include './inc/sidebar.php';
        ?>
        <div class="col-lg-9 col-md-12">
            <div class="row">
                <?php
                    $query = "SELECT * FROM tbl_product WHERE productId = '$Id'";
                    $result = mysqli_query($connect, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($product = mysqli_fetch_array($result))
                        {
                            $categoryId = $product['categoryId'];
                            // echo $product['productName'];
                            $old_price = number_format($product['productPrice'], 0, "", ",")." VNĐ";
                            $new_price = number_format($product['productDiscount'], 0, "", ",")." VNĐ";
                ?>
                <!-- ảnh  -->
                <div class="col-lg-6 col-md-6">
                    <div class="product_tab sidebar fix">
                        <div class="tab-content produc_tab_c">
                            <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                                <div class="modal_img">
                                    <a href="#"><img src="./uploads/<?php echo $product['productImage'] ?>" alt=""></a>
                                    <div class="view_img">
                                        <a class="large_view" href="./uploads/<?php echo $product['productImage'] ?>"><i
                                                class="fa fa-search-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_tab_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1"
                                        aria-selected="false"><img
                                            src="./uploads/<?php echo $product['productImage'] ?>" alt=""></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- thông tin sản phẩm  -->
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <h1><?php echo $product['productName'] ?></h1>
                        <div class="product_desc">
                            <p><?php echo $product['productDesc'] ?></p>
                        </div>

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
                        <div class="box_quantity mb-20">
                            <form action="?giohang" method="POST">
                                <div class="form-group">
                                    <label>Số lương</label>
                                    <input min="1" max="<?php echo $product['productAmount'] ?>" value="1" type="number"
                                        name="cartOrderAmount" required>
                                </div>
                                <div class="form-group product_d_size ">
                                    <label for="">size</label>
                                    <select name="cartSize" id="">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                    </select>
                                    <input type="hidden" name="productId" value="<?php echo $product['productId'] ?>">
                                    <?php 
                                        if($product['productAmount'] > 0) {
                                            echo '<button type="submit" name="add"><i class="fa fa-shopping-cart"></i> Mua ngay</button>';
                                        }
                                    ?>
                                </div>

                            </form>
                        </div>

                        <div class="product_stock mb-20">
                            <p>Số lượng còn: <?php echo $product['productAmount'] ?></p>
                            <span>
                                <?php 
                                if($product['productAmount'] == 0) {
                                    echo 'Hết hàng';
                                }
                                else{
                                    echo 'Còn hàng';
                                }
                            ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                <!--product info start-->
            </div>
            <!--product info end-->
            <!--Related Products area start-->
            <div class="new_product_area">
                <div class="block_title">
                    <h3>Sản phẩm liên quan</h3>
                </div>
                <div class="row">
                    <div class="product_active owl-carousel mtb-10">
                        <?php
                    $query = "SELECT * FROM tbl_product WHERE categoryId = '$categoryId'  EXCEPT(SELECT * FROM tbl_product WHERE productId = '$Id' ) ORDER BY productId  DESC LIMIT 5";
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
                                    <div class="product_action">
                                        <a href="?giohang"> <i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
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
            <!--Related Products area end-->

        </div>

    </div>

</div>
<!--product details end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

<!--footer area start-->