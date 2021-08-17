<?php
    if(isset($_GET['thanhtoan']) && isset($_POST['productTotal']) && isset($_POST['maxTotal'])){
        $productTotal = $_POST['productTotal'];
        $maxTotal = $_POST['maxTotal'];
        $query = "SELECT  tbl_cart.*, tbl_product.* FROM tbl_product INNER JOIN tbl_cart ON tbl_product.productId = tbl_cart.productId WHERE cartStatus = 1";
        $result = mysqli_query($connect,$query);
    }
    else if(isset($_POST['thanhtoan'])){
        $customerName = $_POST['customerName'];
        $customerPhone = $_POST['customerPhone'];
        $customerEmail = $_POST['customerEmail'];
        $customerAddress = $_POST['customerAddress'];
        $customerNote = $_POST['customerNote'];
        $customerPayment = $_POST['customerPayment'];
        $query_customer = "INSERT INTO tbl_customer( customerName, customerPhone, customerAddress, customerEmail, customerNote, customerPayment) 
                VALUES ('$customerName','$customerPhone','$customerAddress','$customerEmail','$customerNote','$customerPayment')";
        $result_customer = mysqli_query($connect, $query_customer);
        if($result){
            $query_select = "SELECT * FROM tbl_customer ORDER BY customerId DESC LIMIT 1";
            $result_select = mysqli_query($connect,$query_select);
            $customerId = mysqli_fetch_array($result_select)['customerId'];
            $query_select = "SELECT  tbl_cart.*, tbl_product.* FROM tbl_product INNER JOIN tbl_cart ON tbl_product.productId = tbl_cart.productId WHERE cartStatus = 1";
            $result_select = mysqli_query($connect,$query_select);
            while($kq = mysqli_fetch_array($result_select)){
                $cartId[] = $kq['cartId'];
            }
            $orderCode = "DH".rand(10000000,99999999);
            // $getCartStatus = mysqli_query($connect,"SELECT cartId,cartStatus FROM tbl_cart WHERE cartStatus = 1");
            for($i = 0 ; $i < mysqli_num_rows($result_select) ; $i++){
                $kq = $cartId[$i];
                $query_order = "INSERT INTO tbl_order(cartId,orderCode,customerId,orderStatus) VALUES('$kq','$orderCode','$customerId','received')";
                $result_order = mysqli_query($connect, $query_order);
                $query_hide = "UPDATE tbl_cart SET cartStatus = 0 WHERE cartId = '$kq'";
                $result_hide = mysqli_query($connect,$query_hide);
                if(isset($result_order)){
                    $query = "SELECT * FROM tbl_order ORDER BY orderId DESC LIMIT 1";
                    $result = mysqli_query($connect,$query); 
                    $orderCode = mysqli_fetch_array($result)['orderCode'];
                   echo "<script>window.location = '?hoan-tat-thanh-toan&donhang=$orderCode'</script>";
                }
            }
        }
    }
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Thanh toán</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">
        <div class="col-12">
            <div class="user-actions mb-20">
                <h3>
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                    Đã có tài khoản?
                    <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login"
                        aria-expanded="true">Nhấn để đăng nhập</a>

                </h3>
                <div id="checkout_login" class="collapse" data-parent="#accordion">
                    <div class="checkout_info">
                        <p>Nếu bạn đã tạo tài khoản và mua sắn trước đó hãy đăng nhập để thanh đặt hàng
                            nhanh hơn</p>
                        <form action="#">
                            <div class="form_group mb-20">
                                <label>Email của bạn<span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group mb-25">
                                <label>Mật khẩu <span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="form_group group_3 ">
                                <input value="Login" type="submit">
                                <!-- <label for="remember_box">
                                                    <input id="remember_box" type="checkbox">
                                                    <span> Remember me </span>
                                                </label> -->
                            </div>
                            <a href="#">Lost your password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout_form">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3>Địa chỉ giao hàng</h3>
                    <div class="row">

                        <div class="col-lg-12 mb-30">
                            <label>Họ và tên<span>*</span></label>
                            <input type="text" name="customerName" placeholder="Tên của bạn" required>
                        </div>
                        <div class="col-12 mb-30">
                            <label>Địa chỉ email</label>
                            <input type="email" required
                                placeholder="Địa chỉ email để nhận email xác nhận thông tin đơn hàng"
                                name="customerEmail">
                        </div>
                        <div class="col-12 mb-30">
                            <label>Số điện thoại</label>
                            <input type="number" class="input-arrow-remove" placeholder="Số điện thoại liên hệ"
                                name="customerPhone" required>
                        </div>
                        <div class="col-12 mb-30">
                            <label>Địa chỉ giao hàng<span>*</span></label>
                            <input type="text" placeholder="Số nhà,quận/huyện,thành phố" name="customerAddress"
                                required>
                        </div>
                        <!-- <div class="col-12 mb-30">
                            <label class="righ_0" for="address" data-toggle="collapse" data-target="#collapsetwo"
                                aria-controls="collapseOne">Giao tới địa chỉ khác</label>

                            <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                <div class="row">
                                    <div class="col-lg-6 mb-30">
                                        <label>Họ và tên người nhận<span>*</span></label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Địa chỉ người nhận</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Số điện thoại người nhận</label>
                                        <input type="text">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Email người nhận</label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div> -->
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