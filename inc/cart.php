<?php
    if(isset($_POST['add'])){
        $productId = $_POST['productId'];
        $cartOrderAmount = $_POST['cartOrderAmount'];
        $cartSize = $_POST['cartSize'];
        // kiểm tra số dòng của Id sản phẩm
        $query_count = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND cartSize = '$cartSize'";
        $result_count = mysqli_query($connect,$query_count);
        $count = mysqli_num_rows($result_count);
        if($count > 0 ){
            $product = mysqli_fetch_array($result_count);
            $cartOrderAmountUpdate = $product['cartOrderAmount'] + $cartOrderAmount;
            $query = "UPDATE tbl_cart SET cartOrderAmount= '$cartOrderAmountUpdate' WHERE (productId = '$productId' AND cartSize = '$cartSize')";
        }
        else{
            $cartOrderAmount = $cartOrderAmount;
            $query = "INSERT INTO tbl_cart(productId,cartOrderAmount,cartSize, cartStatus) VALUES('$productId','$cartOrderAmount','$cartSize','1')";
        }
        $result = mysqli_query($connect, $query);
        if($result){
            echo '<p class="success-message">Thêm thành công</p>';
        }
    }
    else if(isset($_POST['update'])){
        for($i = 0 ; $i < count($_POST['productId']); $i++){
            $productId = $_POST['productId'][$i];
            $cartOrderAmount = $_POST['cartOrderAmount'][$i];
            $query = "UPDATE tbl_cart SET cartOrderAmount = '$cartOrderAmount' WHERE productId = '$productId'";
            $result = mysqli_query($connect,$query);
        }
        if($result){
            echo '<p class="success-message">Cập nhật giỏ hàng thành công</p>';
        }
        else{
            echo "error";
        }
    }
    else if(isset($_GET['xoa'])){
        $cartId = $_GET['xoa'];
        $query = "DELETE FROM `tbl_cart` WHERE cartId = '$cartId'";
        $result = mysqli_query($connect, $query);
        if($result){
            echo '<p class="success-message">Xóa thành công</p>';
        }
    }
    else if(isset($_GET['xoa-gio-hang'])){
        $query = "DELETE FROM tbl_cart WHERE cartStatus = '1'";
        $result = mysqli_query($connect, $query);
        if($result){
            echo '<script>window.location = "?giohang" </script>';
        }
    }
    else if(isset($_GET['Id'])){
        $productId = $_GET['Id'];
        $cartOrderAmount = '1';
        // kiểm tra số dòng của Id sản phẩm
        $query_count = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND cartStatus = 1";
        $result_count = mysqli_query($connect,$query_count);
        $count = mysqli_num_rows($result_count);
        if($count > 0 ){
            $product = mysqli_fetch_array($result_count);
            $cartOrderAmountUpdate = $product['cartOrderAmount'] + $cartOrderAmount;
            $query = "UPDATE tbl_cart SET cartOrderAmount= '$cartOrderAmountUpdate' WHERE (productId = '$productId')";
        }
        else{
            $cartOrderAmount = $cartOrderAmount;
            $query = "INSERT INTO tbl_cart(productId,cartOrderAmount,cartSize,cartStatus) VALUES('$productId','$cartOrderAmount','M', '1')";
        }
        $result = mysqli_query($connect, $query);
        if($result){
            echo '<script>alert("Thêm vào giỏ hàng thành công")</script>';
            echo "<script>window.location = '$beforeUrl' </script>";
        }
    }
?>

<!--breadcrumbs area start-->
<?php 
    include 'breadcrumbs.php';
?>
<!--breadcrumbs area end-->
<!--shopping cart area start -->
<div class="shopping_cart_area">
    <div class="row">
        <div class="col-12">
            <div class="table_desc">
                <form action="" method="POST">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_thumb">Ảnh</th>
                                    <th class="product_name">Tên sản phẩm</th>
                                    <th class="product_size">Size</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product_quantity">Số lượng</th>
                                    <th class="product_total">Tổng tiền</th>
                                    <th class="product_remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td class="product_thumb"><a
                                            href="?sanpham=<?php echo $cart['productId']?>/<?php echo $cart['productLink']?>"><img
                                                src="./uploads/<?php echo $cart['productImage']?>" alt="" width="150px"
                                                height="150px"></a></td>
                                    <td class="product_name">
                                        <a
                                            href="?sanpham=<?php echo $cart['productId']?>/<?php echo $cart['productLink']?>"><?php echo $cart['productName'] ?></a>
                                    </td>
                                    <td class="product_size">
                                        <?php echo $cart['cartSize'] ?>
                                    </td>
                                    <td class="product-price">
                                        <?php
                                            if($cart["productDiscount"] < 1000){
                                                echo "<span class='product_price'>$old_price</span>";
                                            }
                                            else{
                                                echo "<span class='product_price'>$new_price</span>";
                                            }
                                            ?>
                                    </td>
                                    <td class="product_amount">
                                        <input min="1" max="<?php echo $cart['productAmount'] ?>"
                                            value="<?php echo $cart['cartOrderAmount'] ?>" type="number" required
                                            name="cartOrderAmount[]" class="text-center">
                                        <input value="<?php echo $cart['productId'] ?>" type="hidden"
                                            name="productId[]">
                                    </td>
                                    <td class="product_total">
                                        <?php
                                            if($cart["productDiscount"] < 1000){
                                                echo "<span class='product_price'>$old_price_total</span>";
                                            }
                                            else{
                                                echo "<span class='product_price'>$new_price_total</span>";
                                            }
                                            ?>
                                    </td>
                                    <td class="product_remove"><a href="?giohang&xoa=<?php echo $cart['cartId']?>"><i
                                                class="fa fa-trash-o"></i></a></td>
                                </tr>
                                <?php 
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        if($total == 0){
                            echo '<center><h4>Giỏ hàng trống</h4></center>';
                        }
                        else{
                            echo '<div class="cart_submit">
                            <button type="submit" name="update">Cập nhật giỏ hàng</button>
                            <a href="?giohang&xoa-gio-hang" class="btn btn-danger delete">Xóa hết giỏ hàng</a>
                        </div>';
                        }
                    ?>

                </form>
            </div>
        </div>
    </div>
    <!--coupon code area start-->
    <form action="?thanhtoan" method="POST">
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="coupon_code">
                        <h3>Tổng sản phẩm</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Tổng tiền hàng</p>
                                <p class="cart_amount">
                                    <?php 
                                        if($total <= 0 ){
                                            echo 'Giỏ hàng trống';
                                        }
                                        else{
                                            echo $productTotal = number_format($total, 0, "", ",")." VNĐ";
                                            echo "<input type='hidden' name='productTotal' value=\"$productTotal\">";
                                    }
                                    ?>

                                </p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Tổng tiền vận chuyển</p>
                                <p class="cart_amount">
                                    30,000 VNĐ
                                </p>
                            </div>

                            <div class="cart_subtotal">
                                <p>Tổng số tiền thanh toán</p>
                                <p class="cart_amount">
                                    <?php 
                                        if($total <= 0 ){
                                            echo '----------';
                                        }
                                        else{
                                            echo $maxTotal = number_format($total + 30000, 0, "", ",")." VNĐ" ;
                                            echo "<input type='hidden' name='maxTotal' value=\"$maxTotal\">";
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="checkout_btn">
                                <?php 
                                    if($total <= 0 ){
                                        echo '<a href="index.php">Mua hàng ngay</a>';
                                    }
                                    else{
                                        echo '<button type="submit">Đặt hàng ngay</button>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area end-->
    </form>
</div>
<!--shopping cart area end -->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->