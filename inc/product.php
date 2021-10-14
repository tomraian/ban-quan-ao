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
                <div class="product_d_info sidebar">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                            aria-selected="false">More info</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                            aria-selected="false">Data sheet</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                            aria-selected="false">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>Fashion has been creating well-designed collections since
                                            2010. The brand offers feminine designs delivering stylish
                                            separates and statement dresses which have since evolved
                                            into a full ready-to-wear collection in which every item is
                                            a vital part of a woman's wardrobe. The result? Cool, easy,
                                            chic looks with youthful elegance and unmistakable signature
                                            style. All the beautiful pieces are made in Italy and
                                            manufactured with the greatest attention. Now Fashion
                                            extends to a range of accessories including shoes, hats,
                                            belts and more!</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="sheet" role="tabpanel">
                                    <div class="product_d_table">
                                        <form action="#">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="first_child">Compositions</td>
                                                        <td>Polyester</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Styles</td>
                                                        <td>Girly</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="first_child">Properties</td>
                                                        <td>Short Dress</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="product_info_content">
                                        <p>Fashion has been creating well-designed collections since
                                            2010. The brand offers feminine designs delivering stylish
                                            separates and statement dresses which have since evolved
                                            into a full ready-to-wear collection in which every item is
                                            a vital part of a woman's wardrobe. The result? Cool, easy,
                                            chic looks with youthful elegance and unmistakable signature
                                            style. All the beautiful pieces are made in Italy and
                                            manufactured with the greatest attention. Now Fashion
                                            extends to a range of accessories including shoes, hats,
                                            belts and more!</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="product_info_content">
                                        <p>Fashion has been creating well-designed collections since
                                            2010. The brand offers feminine designs delivering stylish
                                            separates and statement dresses which have since evolved
                                            into a full ready-to-wear collection in which every item is
                                            a vital part of a woman's wardrobe. The result? Cool, easy,
                                            chic looks with youthful elegance and unmistakable signature
                                            style. All the beautiful pieces are made in Italy and
                                            manufactured with the greatest attention. Now Fashion
                                            extends to a range of accessories including shoes, hats,
                                            belts and more!</p>
                                    </div>
                                    <div class="product_info_inner">
                                        <div class="product_ratting mb-10">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                            <strong>Posthemes</strong>
                                            <p>09/07/2018</p>
                                        </div>
                                        <div class="product_demo">
                                            <strong>demo</strong>
                                            <p>That's OK!</p>
                                        </div>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <h2>Add a review </h2>
                                            <p>Your email address will not be published. Required fields
                                                are marked </p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author" type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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