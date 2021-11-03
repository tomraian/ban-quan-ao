<?php
    if(isset($_POST['thanhtoan'])){
        $customerName = $_POST['customerName'];
        $customerEmail = $_POST['customerEmail'];
        $customerPhone = $_POST['customerPhone'];
        $customerAddress = $_POST['customerAddress'];
        $customerNote = $_POST['customerNote'];
        $customerPayment = @$_POST['customerPayment'];
        if(!$customerName){
            $error = '<p class="error-message">Họ tên không được để trống</p>';
        }
        else if(!$customerEmail){
            $error = '<p class="error-message">Email không được để trống</p>';
        }
        else if(!$customerPhone){
            $error = '<p class="error-message">Số điện thoại không được để trống</p>';
        }
        else if(!$customerAddress){
            $error = '<p class="error-message">Địa chỉ giao hàng không được để trống</p>';
        }
        else if(!$customerPayment){
            $error = '<p class="error-message">Phương thức thanh toán không được để trống</p>';
        }
        else{
            $query_customer = "INSERT INTO tbl_customer( customerName, customerPhone, customerAddress, customerEmail, customerNote, customerPayment) 
            VALUES ('$customerName','$customerPhone','$customerAddress','$customerEmail','$customerNote','$customerPayment')";
            echo $query_customer;
            $result_customer = mysqli_query($connect, $query_customer);
            if($result_customer){
                $query_select = "SELECT * FROM tbl_customer ORDER BY customerId DESC LIMIT 1";
                $result_select = mysqli_query($connect,$query_select);
                $customerId = mysqli_fetch_array($result_select)['customerId'];
                $query_select = "SELECT  tbl_cart.*, tbl_product.* FROM tbl_product INNER JOIN tbl_cart ON tbl_product.productId = tbl_cart.productId WHERE cartStatus = 1";
                $result_select = mysqli_query($connect,$query_select);
                while($kq = mysqli_fetch_array($result_select)){
                    $cartId[] = $kq['cartId'];
                }
                $orderCode = "DH".rand(10000000,99999999);
                if(isset($_SESSION['dangnhap'])){
                    $userId = $_SESSION['dangnhap'];
                }
                else{
                    $userId = 0;
                }
                // $getCartStatus = mysqli_query($connect,"SELECT cartId,cartStatus FROM tbl_cart WHERE cartStatus = 1");
                for($i = 0 ; $i < mysqli_num_rows($result_select) ; $i++){
                    $kq = $cartId[$i];
                    $query_order = "INSERT INTO tbl_order(cartId,orderCode,customerId,orderStatus,userId) VALUES('$kq','$orderCode','$customerId','received','$userId')";
                    $result_order = mysqli_query($connect, $query_order);
                    $query_hide = "UPDATE tbl_cart SET cartStatus = 0 WHERE cartId = '$kq'";
                    $result_hide = mysqli_query($connect,$query_hide);
                    if(isset($result_order)){
                        $query = "SELECT * FROM tbl_order ORDER BY orderId DESC LIMIT 1";
                        $result = mysqli_query($connect,$query); 
                        $orderCode = mysqli_fetch_array($result)['orderCode'];
                       echo "<script>window.location = '?hoan-tat-thanh-toan&don-hang=$orderCode'</script>";
                    }
                }
            }
        }
        
    }
?>
<!--breadcrumbs area start-->
<?php 
    include 'breadcrumbs.php';
?>
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <?php
                    if(!isset($_SESSION['dangnhap'])){
                        echo '
                        <div class="col-12">
            <div class="user-actions mb-20">
                <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Đã có tài khoản?
                    <a class="" href="?tai-khoan" >Nhấn để đăng nhập</a>

                </h3>
            </div>
        </div>';
                    }
            ?>

    </div>
    <div class="checkout_form">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Địa chỉ giao hàng</h3>
                    <div class="row">
                        <div class="col-lg-12 mb-30">
                            <?php 
                    if(isset($error))
                    {
                        echo $error;
                    }
                ?>
                            <label>Họ và tên<span>*</span></label>
                            <input type="text" name="customerName" placeholder="Tên của bạn" value="<?php
                                    if(isset($_SESSION['dangnhap'])){
                                        echo $_SESSION['userName'];
                                    }
                                ?>">
                        </div>
                        <div class="col-12 mb-30">
                            <label>Địa chỉ email</label>
                            <input type="email" placeholder="Địa chỉ email để nhận email xác nhận thông tin đơn hàng"
                                name="customerEmail" value="<?php
                                    if(isset($_SESSION['dangnhap'])){
                                        echo $_SESSION['userEmail'];
                                    }
                                ?>">
                        </div>
                        <div class="col-12 mb-30">
                            <label>Số điện thoại</label>
                            <input type="number" class="input-arrow-remove" placeholder="Số điện thoại liên hệ"
                                name="customerPhone" value="<?php
                                    if(isset($_SESSION['dangnhap'])){
                                        echo $_SESSION['userPhone'];
                                    }
                                ?>">
                        </div>
                        <div class="col-12 mb-30">
                            <label>Địa chỉ giao hàng<span>*</span></label>
                            <input type="text" placeholder="Số nhà,quận/huyện,thành phố" name="customerAddress" value="<?php
                                    if(isset($_SESSION['dangnhap'])){
                                        echo $_SESSION['userAddress'];
                                    }
                                ?>">
                        </div>
                        <div class="col-12">
                            <div class="order-notes">
                                <label for="order_note">Ghi chú</label>
                                <textarea id="order_note" rows="4" name="customerNote"
                                    placeholder="Lưu ý về đơn hàng của bạn hoặc về giao hàng"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="order_table table-responsive mb-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Phân loại size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_GET['thanhtoan']) && isset($_POST['productTotal']) && isset($_POST['maxTotal'])){
                                    $productTotal = $_POST['productTotal'];
                                    $maxTotal = $_POST['maxTotal'];
                                    $query = "SELECT  tbl_cart.*, tbl_product.* FROM tbl_product INNER JOIN tbl_cart ON tbl_product.productId = tbl_cart.productId WHERE cartStatus = 1";
                                    $result = mysqli_query($connect,$query);
                                }
                                    if($result){
                                        while($cart = mysqli_fetch_array($result)){
                                ?>
                                <tr>
                                    <td> <?php echo $cart['productName'] ?><strong> ×
                                            <?php echo $cart['cartOrderAmount'] ?></strong></td>
                                    <td> <?php echo $cart['cartSize'] ?><strong>
                                        </strong></td>

                                </tr>
                                <?php 
                                        }
                                    }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tổng tiền hàng</th>
                                    <td>
                                        <strong>
                                            <?php if(isset($productTotal)){
                                        echo $productTotal;
                                    } ?>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền vận chuyển</th>
                                    <td><strong>30,000 VNĐ</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Tổng số tiền thanh toán</th>
                                    <td><strong><?php if(isset($maxTotal)){
                                        echo $maxTotal;
                                    } ?></strong></td>
                                </tr>
                                <?php 
                                    if(isset($maxTotal) == 0){
                                        echo '<script>window.location = "index.php?giohang"</script>';
                                    }
                                ?>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default">
                            <input id="payment" name="customerPayment" type="radio" data-target="createp_account"
                                value="cod">
                            <label for="payment" data-toggle="collapse" data-target="#method"
                                aria-controls="method">Thanh
                                toán COD</label>
                            <div id="method" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                    <p>Thanh toán khi nhận hàng</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-default">
                            <input id="payment_defult" name="customerPayment" type="radio" data-target="createp_account"
                                value="atm">
                            <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult"
                                aria-controls="collapsedefult">Thanh toán chuyển khoản</label>

                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                    <p>
                                        Nếu bạn thanh toán bằng chuyển khoản qua ngân hàng thì:
                                    <ul>
                                        <li>
                                            TÀI KHOẢN CỦA SHOP: 123123123
                                        </li>
                                        <li>
                                            Chủ tài khoản: Đinh Hoàng Duy
                                        </li>
                                        <li>
                                            Ngân hàng: vietinbank
                                        </li>
                                        <li>
                                            Nội dung chuyển khoản bạn vui lòng điền theo CÚ PHÁP như sau: MÃ ĐƠN HÀNG +
                                            SĐT + TÊN
                                        </li>
                                        <p>Cảm ơn bạn.</p>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="order_button">
                            <button type="submit" name="thanhtoan">Tiến hành thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Checkout page section end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->