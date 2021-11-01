<?php
    if(isset($_POST['dang-nhap']) && $_SERVER["REQUEST_METHOD"] === 'POST')
    {
        $userEmail = $_POST['userEmail'];
        $userPassword = md5($_POST['userPassword']);
    
        if(!$userEmail){
            $error = '<p class="error-message">Tài khoản không được để trống</p>';
        }
        else if(!$userPassword){
            $error = '<p class="error-message">Mật khẩu không được để trống</p>';
        }
        else{
            $query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail' AND userPassword = '$userPassword'";
            $result = mysqli_query($connect, $query);
            $row_dangnhap = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) > 0){
                $_SESSION['dangnhap'] = $row_dangnhap['userId'];
                $_SESSION['userName'] = $row_dangnhap['userName'];
                $_SESSION['userEmail'] = $row_dangnhap['userEmail'];
                $_SESSION['userAddress'] = $row_dangnhap['userAddress'];
                $_SESSION['userPhone'] = $row_dangnhap['userPhone'];
                echo '<script>window.location = "index.php" </script>';
            }
            else{
                $error = '<p class="error-message">Tài khoản hoặc mật khẩu sai</p>';
            }
        }
    }
?>
<?php 
    if(isset($_SESSION['dangnhap'])){
        echo '<script>window.location = "index.php" </script>';
    }
?>
<!--breadcrumbs area start-->
<?php 
    include 'breadcrumbs.php';
?>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login">
    <div class="row">
        <!--login area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form">
                <h2>Đăng nhập</h2>

                <form action="" method="POST">
                    <?php 
                    if(isset($error))
                    {
                        echo $error;
                    }
                ?>
                    <p>
                        <label>Địa chỉ email<span>*</span></label>
                        <input type="text" name="userEmail">
                    </p>
                    <p>
                        <label>Mật khẩu <span>*</span></label>
                        <input type="password" name="userPassword">
                    </p>
                    <div class="login_submit">
                        <button type="submit" name="dang-nhap">Đăng nhập</button>
                        <!-- <label for="remember">
                                            <input id="remember" type="checkbox">
                                            Remember me
                                        </label> -->
                        <!-- <a href="#">Lost your password?</a> -->
                    </div>

                </form>
            </div>
        </div>
        <!--login area start-->

        <!--register area start-->
        <div class="col-lg-6 col-md-6">
            <div class="account_form register">
                <h2>Đăng ký</h2>
                <form action="#" method="POST">
                    <?php
                        if(isset($_POST['userRegister'])){
                            $userEmail = $_POST['userEmail'];
                            $userName = $_POST['userName'];
                            $userPassword = $_POST['userPassword'];
                            $userPasswordAgain = $_POST['userPasswordAgain'];
                            if($userEmail == ""){
                                $message = '<p class="error-message">Email không được để trống</p>';
                            }
                            else if($userName == ""){
                                $message = '<p class="error-message">Tên không được để trống</p>';
                            }
                            else if($userPassword == ""){
                                $message = '<p class="error-message">Mật khẩu không được để trống</p>';
                            }
                            else if($userPasswordAgain != $userPassword){
                                $message = '<p class="error-message">Mật khẩu nhập lại không đúng</p>';
                            }
                            else{
                                $userPasswordInput = md5($userPassword);
                                $query = "INSERT INTO tbl_user (userName,userEmail,userPassword) VALUES ('$userName','$userEmail','$userPasswordInput')";
                                $result = mysqli_query($connect, $query);
                                if($result){
                                    $message = '<p class="success-message">Tạo tài khoản thành công</p>';
                                }
                            }                            
                        }
                    ?>
                    <?php 
                    if(isset($message))
                    {
                        echo $message;
                    }
                ?>
                    <p>
                        <label>Địa chỉ email<span>*</span></label>
                        <input type="text" name="userEmail">
                    </p>
                    <p>
                        <label>Họ và tên<span>*</span></label>
                        <input type="text" name="userName">
                    </p>
                    <p>
                        <label>Mật khẩu <span>*</span></label>
                        <input type="password" name="userPassword">
                    </p>
                    <p>
                        <label>Nhập lại mật khẩu <span>*</span></label>
                        <input type="password" name="userPasswordAgain">
                    </p>
                    <div class="login_submit">
                        <button type="submit" name="userRegister">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
        <!--register area end-->
    </div>
</div>
<!-- customer login end -->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->