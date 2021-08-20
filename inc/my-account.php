<?php
if(!isset($_SESSION['dangnhap'])){
    echo '<script>window.location = "index.php" </script>';
}
if(isset($_SESSION['dangnhap'])){
    $userId = $_SESSION['dangnhap'];
    if(isset($_POST['edit-address'])){
        $userAddress = $_POST['userAddress'];
        $query = "UPDATE tbl_user SET userAddress = '$userAddress' WHERE userId = '$userId'";
        $result = mysqli_query($connect,$query);
    }
    else if(isset($_POST['edit-info'])){
        $userGender = $_POST['userGender'];
        $userName = $_POST['userName'];
        $userPhone = $_POST['userPhone'];
        $userBirthday = $_POST['userBirthday'];
        $query = "UPDATE tbl_user SET userGender = $userGender,userName = '$userName',userPhone = '$userPhone',userBirthday = '$userBirthday' WHERE userId = '$userId'";
        $result = mysqli_query($connect,$query);
        if(isset($result)){
            echo '<p class="success-message">Thay đổi thông tin thành công</p>';
        }
    }
    else if(isset($_POST['edit-password'])){
        $userPassword = $_POST['userPassword'];
        $userPasswordAgain = $_POST['userPasswordAgain'];
        if($userPassword == ""){
            echo '<p class="error-message">Mật khẩu không được để trống</p>';
        }
        else if(strlen($userPassword) <= 3){
            echo '<p class="error-message">Mật khẩu phải lớn hơn 3 ký tự</p>';
        }
        else if($userPassword != $userPasswordAgain){
            echo '<p class="error-message">Mật khẩu nhập lại không trùng khớp</p>';
        }
        else{
            $userPasswordEncode = md5($userPassword);
            $query = "UPDATE tbl_user SET userPassword = '$userPasswordEncode'  WHERE userId = '$userId'";
            $result = mysqli_query($connect,$query);
            if(isset($result)){
                session_destroy();
                echo "<script>window.location = '?tai-khoan' </script>";
                echo '<p class="success-message">Vui lòng đăng nhập lại</p>';
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

<!-- Start Maincontent  -->
<section class="main_content_area">
    <div class="account_dashboard">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Tổng quát</a></li>
                        <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn hàng</a>
                        </li>
                        <li><a href="#address" data-toggle="tab" class="nav-link">Địa chỉ</a>
                        </li>
                        <li><a href="#account-details" data-toggle="tab" class="nav-link">Thông tin tài khoản</a></li>
                        <li><a href="#account-password" data-toggle="tab" class="nav-link">Thay đổi mật khẩu</a></li>
                        <li><a href="?dang-xuat" class="nav-link">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content">
                    <?php
                        $query = "SELECT * FROM tbl_user WHERE userId = '$userId' LIMIT 1";
                        $result = mysqli_query($connect,$query);
                        if($result){
                            while($user = mysqli_fetch_array($result)){
                    ?>
                    <div class="tab-pane fade show active" id="dashboard">
                        <h3>Trang chủ </h3>
                        <p>Từ trang tổng quan tài khoản của bạn. Bạn có thể dễ dàng kiểm tra
                            &amp; xem <a href="#">đơn đặt hàng
                                gần đây</a>, quản lý <a href="">địa chỉ giao hàng của bạn</a> and <a href="#">Chỉnh sửa
                                mật
                                khẩu và chi tiết tài khoản của bạn
                                .</a></p>
                    </div>
                    <div class="tab-pane fade" id="address">
                        <p>Các địa chỉ sau sẽ được sử dụng trên trang thanh toán theo mặc định.
                        </p>
                        <h4 class="billing-address">Địa chỉ thanh toán </h4>
                        <form action="" method="POST">
                            <label>Địa chỉ</label>
                            <input type="text" name="userAddress" value="<?php echo $user['userAddress']?>">
                            <button type="submit" class="action-btn" name="edit-address">Sửa</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-password">
                        <h4 class="billing-address">Thay đổi mật khẩu </h4>
                        <form action="" method="POST">
                            <label>Mật khẩu</label>
                            <input type="password" name="userPassword" required>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" name="userPasswordAgain" required>
                            <button type="submit" class="action-btn" name="edit-password">Đổi mật khẩu</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-details">
                        <h3>Thông tin cá nhân</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="" method="POST">
                                        <div class="input-radio">
                                            <span class="custom-radio">
                                                <input type="radio" value="0" name="userGender"
                                                    <?php if($user['userGender'] == 0) echo 'checked' ?>>
                                                Nam
                                                <input type="radio" value="1" name="userGender"
                                                    <?php if($user['userGender'] == 1) echo 'checked' ?>>
                                                Nữ</span>
                                        </div> <br>
                                        <label>Họ và tên</label>
                                        <input type="text" name="userName" value="<?php echo $user['userName'] ?>"
                                            required>
                                        <label>Email</label>
                                        <input type="text" name="userEmail" value="<?php echo $user['userEmail'] ?>"
                                            readonly>
                                        <label>Số điện thoại</label>
                                        <input type="number" class="no-arrow" min="1" maxlength="10" name="userPhone"
                                            required value="<?php echo $user['userPhone'] ?>">
                                        <label>Ngày sinh</label>
                                        <input type="date" placeholder="MM/DD/YYYY" name="userBirthday" required
                                            value="<?php echo $user['userBirthday'] ?>">
                                        <button type="submit" class="action-btn" name="edit-info">Sửa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                      }
                    }
                    ?>
                    <div class="tab-pane fade" id="orders">
                        <h3>Đơn hàng</h3>
                        <div class="coron_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT DISTINCT  orderCode,orderTime,orderStatus FROM tbl_order WHERE userId = '$userId' ORDER BY orderTime DESC";
                                        $result = mysqli_query($connect,$query);
                                        if($result){
                                            while($order = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $order['orderCode'] ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($order['orderTime'])) ?></td>
                                        <td>
                                            <?php
                                                if($order['orderStatus'] == 'received')
                                                {
                                                    echo 'Đã xác nhận đơn';
                                                }
                                                else if($order['orderStatus'] == 'shipped')
                                                {
                                                    echo 'Đang giao hàng';
                                                }
                                                else if($order['orderStatus'] == 'delivered')
                                                {
                                                    echo 'Giao hàng thành công';
                                                }
                                                else if($order['orderStatus'] == 'hide')
                                                {
                                                    echo 'Giao hàng thành công';
                                                }
                                                else if($order['orderStatus'] == 'cancel')
                                                {
                                                    echo 'Đơn hàng bị hủy';
                                                }
                                            ?>
                                        </td>
                                        <td><a href="?kiem-tra-don-hang&don-hang=<?php echo $order['orderCode'] ?>"
                                                class="view">Xem chi tiết</a></td>
                                    </tr>
                                    <?php 
                                          }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Maincontent  -->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->