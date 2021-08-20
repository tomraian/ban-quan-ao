<?php
    $title = 'Thêm quản trị viên';
    include './inc/header.php';
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
                <?php
                    if(isset($_POST['add'])){
                        $adminName = $_POST['adminName'];
                        $adminEmail = $_POST['adminEmail'];
                        $adminPassword = $_POST['adminPassword'];
                        $adminPasswordAgain = $_POST['adminPasswordAgain'];
                        if(empty($adminName)){
                            $message = '<p class="error-message">Vui lòng nhập tên quản trị viên</p>';
                        }
                        else if(strlen($adminName) < 3){
                            $message = '<p class="error-message">Tên quản trị viên phải từ 2 ký tự trở lên</p>';
                        }
                        else if(strlen($adminName) > 26){
                            $message = '<p class="error-message">Tên quản trị viên phải ít hơn 25 ký tự</p>';
                        }
                        else if(empty($adminEmail)){
                            $message = '<p class="error-message">Vui lòng nhập email</p>';
                        }
                        else if(empty($adminPassword)){
                            $message = '<p class="error-message">Vui lòng nhập mật khẩu</p>';
                        }
                        else if($adminPassword != $adminPasswordAgain){
                            $message = '<p class="error-message">Mật khẩu nhập lại không đúng</p>';
                        }
                        else{
                            $adminPasswordEncode = md5($adminPassword);
                            $query = "INSERT INTO tbl_admin (adminName,adminEmail,adminPassword) VALUES ('$adminName','$adminEmail','$adminPasswordEncode')";
                            $result = mysqli_query($connect, $query);
                            if($result){
                                $message = '<p class="success-message">Thêm thành công</p>';
                            }
                        }
                    }
                    
                ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            if(isset($message)){
                                echo $message;
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="adminName">Nhập tên quản trị viên</label>
                                    <input type="text" name="adminName" id="adminName" placeholder="V.d: Admin">
                                </div>
                                <div class="form-group">
                                    <label for="adminEmail">Nhập email quản trị viên</label>
                                    <input type="email" name="adminEmail" id="adminEmail"
                                        placeholder="V.d: abc@gmail.com">
                                </div>
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
                                    <input type="submit" name="add" class="btn" value="Thêm">
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