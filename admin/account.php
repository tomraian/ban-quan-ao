<?php
    $title = 'Thông tin quản trị viên';
    include './inc/header.php';
?>
<?php 
    if(isset($_SESSION['dangnhap'])){
        $adminId = $_SESSION['dangnhap'];
        $query = "SELECT * FROM tbl_admin WHERE adminId = '$adminId'";
        $show = mysqli_query($connect,$query);
    }
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include './inc/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include './inc/navbar.php';
                ?>
                <!-- DataTales Example -->

                <div class="card shadow mb-4">
                    <?php
                        if(isset($_POST['edit-info'])){
                            $adminName = $_POST['adminName'];
                            if(empty($adminName)){
                                $message = '<p class="error-message">Vui lòng nhập tên quản trị viên</p>';
                            }
                            else if(strlen($adminName) < 3){
                                $message = '<p class="error-message">Tên quản trị viên phải từ 2 ký tự trở lên</p>';
                            }
                            else if(strlen($adminName) > 26){
                                $message = '<p class="error-message">Tên quản trị viên phải ít hơn 25 ký tự</p>';
                            }
                            else{
                                    $query = "UPDATE tbl_admin SET  adminName = '$adminName' WHERE adminId = '$adminId'";
                                    $result = mysqli_query($connect, $query);
                                    if($result){
                                        echo "<script>window.location = 'account.php' </script>";
                                    }
                                }
                        }
                    ?>
                    <?php 
                        if(isset($_POST['edit-pass'])){
                            $adminPassword = $_POST['adminPassword'];
                            $adminPasswordAgain = $_POST['adminPasswordAgain'];
                            if(empty($adminPassword)){
                                $message = '<p class="error-message">Vui lòng nhập mật khẩu</p>';
                            }
                            if(empty($adminPasswordAgain)){
                                $message = '<p class="error-message">Mật khẩu nhập lại không được để trống</p>';
                            }
                            else if($adminPassword != $adminPasswordAgain){
                                $message = '<p class="error-message">Mật khẩu nhập lại không đúng</p>';
                            }
                            else{
                                $adminPasswordEncode = md5($adminPassword);
                                $query = "UPDATE tbl_admin SET  adminPassword = '$adminPasswordEncode' WHERE adminId = '$adminId'";
                                $result = mysqli_query($connect, $query);
                                if($result){
                                    session_destroy();
                                    echo "<script>window.location = 'index.php' </script>";
                                }
                            }
                        }
                    ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            if(isset($message)){
                                echo $message;
                            }
                            ?>
                            <form action="" method="POST">
                                <?php 
                                    if(isset($show)){
                                        while($admin = mysqli_fetch_array($show)){
                                ?>
                                <div class="form-group">
                                    <label for="adminName">Nhập tên quản trị viên</label>
                                    <input type="text" name="adminName" id="adminName" placeholder="V.d: Admin"
                                        value="<?php echo $admin['adminName'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="adminEmail">Nhập email quản trị viên</label>
                                    <input type="email" name="adminEmail" id="adminEmail" readonly
                                        placeholder="V.d: abc@gmail.com" value="<?php echo $admin['adminEmail'] ?>">
                                </div>
                                <?php
                                        }
                                    }
                                ?>
                                <div class="form-group">
                                    <input type="submit" name="edit-info" class="btn" value="Sửa thông tin">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>

                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="adminPassword">Nhập mật khẩu</label>
                                    <input type="password" name="adminPassword" id="adminPassword"
                                        placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label for="adminPasswordAgain">Nhập lại mật khẩu</label>
                                    <input type="password" name="adminPasswordAgain" id="adminPasswordAgain"
                                        placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="edit-pass" class="btn" value="Sửa mật khẩu">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php
    include './inc/footer.php';
    ?>
        <!-- footer  -->