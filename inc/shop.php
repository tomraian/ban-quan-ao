<?php
    if(isset($_GET['danhmuc'])){
        $danhmuc = $_GET['danhmuc'];
    }
?>
<?php 
    $page = 1;
    // pagination
    // đặt 1 biến page = 1 
    // lấy giá trị trang bằng $get sau đó gán lại cho biến page 
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    // số sản phẩm 1 trang 
    $productPerPage = 12;
    // lấy giá trị limit bằng lấy trang hiện tại - 1 * số sản phẩm 
    $from = ($page - 1) * $productPerPage;
    $limit = "LIMIT $from , $productPerPage";
    // lấy ra tổng số sản phẩm 
    $totalProduct = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM tbl_category,tbl_product WHERE tbl_category.categoryId = tbl_product.categoryId AND tbl_category.categoryId ='$danhmuc'"));
    // lấy ra tổng số trang làm tròn bằng cách lấy tổng sản phẩm / tổng sản phẩm 1 trang 
    $totalPage = ceil($totalProduct / 12);
?>
<!--breadcrumbs area start-->
<?php 
    include 'breadcrumbs.php';
?>
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
                                $query = "SELECT * FROM tbl_category,tbl_product WHERE tbl_category.categoryId = tbl_product.categoryId AND tbl_category.categoryId ='$danhmuc' ORDER BY productId DESC $limit";
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
                                else{
                                    echo '<div class="col-xl-12 text-center">Chưa có sản phẩm</div>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        <?php
                            $query = "SELECT * FROM tbl_category,tbl_product WHERE tbl_category.categoryId = tbl_product.categoryId AND tbl_category.categoryId ='$danhmuc' ORDER BY productId DESC $limit";
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
                            else{
                                echo '<div class="col-xl-12 text-center">Chưa có sản phẩm</div>';
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
                        <li class="">
                            <?php   
                                if(isset($_GET['page']) && $_GET['page'] > 1){
                                    $prevPage = $_GET['page'] - 1;
                                    echo "<a href='?danhmuc=$danhmuc&page=$prevPage'>«</a>";
                                }
                                else{
                                    echo '«';
                                }
                            ?>
                        </li>
                        <?php
                            // chạy vòng lặp biến cho biến $i nhỏ hơn tổng trang 
                            for($i = 1 ; $i <= $totalPage; $i++){
                                if($page == $i){
                                    $current_number = 'current_number';
                                    echo "<li class= '$current_number' > <a href='?danhmuc=$danhmuc&page=$i'>$i</a> </li>";
                                }
                                else{
                                    echo "<li class= '' > <a href='?danhmuc=$danhmuc&page=$i'>$i</a> </li>";
                                }
                            }
                        ?>
                        <li class="">
                            <?php   
                                if(isset($_GET['page']) && $_GET['page'] < $totalPage){
                                    $nextPage = $_GET['page'] + 1;
                                    echo "<a href='?danhmuc=$danhmuc&page=$nextPage'>»</a>";
                                }
                                else{
                                    echo '»';
                                }
                            ?>
                        </li>
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