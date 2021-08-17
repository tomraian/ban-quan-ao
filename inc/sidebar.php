<div class="col-lg-3 col-md-12">
    <!--layere categorie"-->
    <div class="sidebar_widget shop_c">
        <div class="categorie__titile">
            <h4>Danh mục</h4>
        </div>
        <div class="layere_categorie">
            <ul>
                <li><a href="?tat-ca-san-pham"><label for=""> <i class="fa fa-chevron-right"></i>
                            Tất cả sản phẩm</label></a>
                </li>
                <?php
                            $query = "SELECT * FROM tbl_category ORDER BY categoryId DESC";
                            $result = mysqli_query($connect, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($category = mysqli_fetch_array($result)){
                        ?>
                <li><a href="?danhmuc=<?php echo $category['categoryId'] ?>/<?php echo $category['categoryLink']?>"><label
                            for=""> <i class="fa fa-chevron-right"></i>
                            <?php echo $category['categoryName'] ?></label></a>
                </li>
                <?php
                                }
                            }
                        ?>
            </ul>
        </div>
    </div>

    <!--newsletter block start-->
    <div class="sidebar_widget newsletter mb-30">
        <div class="block_title">
            <h3>Đăng ký nhận tin</h3>
        </div>
        <form action="#">
            <p>Đăng ký để nhận khuyến mãi mới nhất</p>
            <input placeholder="Địa chỉ email của bạn" type="email">
            <button type="submit">Đăng ký</button>
        </form>
    </div>
    <!--newsletter block end-->

    <!--special product start-->
    <div class="sidebar_widget special">
        <div class="block_title">
            <h3>Sản phẩm nổi bật</h3>
        </div>
        <?php
                    $query = "SELECT * FROM tbl_product WHERE productFeatured = 1 ORDER BY productId DESC LIMIT 5";
                    $result = mysqli_query($connect, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($productFeatured = mysqli_fetch_array($result))
                        {
                            $old_price = number_format($productFeatured['productPrice'], 0, "", ",")." VNĐ";
                            $new_price = number_format($productFeatured['productDiscount'], 0, "", ",")." VNĐ";
                ?>
        <div class="special_product_inner mb-20">
            <div class="special_p_thumb">
                <a href="single-product.html"><img src="./uploads/<?php echo $productFeatured['productImage'] ?>"
                        alt=""></a>
            </div>
            <div class="small_p_desc">
                <h3><a href="single-product.html"><?php echo $productFeatured['productName'] ?></a></h3>
                <div class="special_product_proce">
                    <?php
                            if($productFeatured["productDiscount"] < 1000){
                                echo "<span class='product_price'>$old_price</span>";
                            }
                            else{
                                echo "<span class='product_price'>$new_price</span>";
                            }
                            ?>
                </div>
            </div>
        </div>
        <?php 
                        }
                    }
                ?>
    </div>
    <!--special product end-->


</div>