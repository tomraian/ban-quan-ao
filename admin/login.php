<?php
    session_start();
    include_once '../database/connect.php';
?>
<?php 
    if(isset($_SESSION['dangnhap'])){
        header('Location: index.php');
    }
?>
<!-- kiểm tra đăng nhập -->
<?php
    if(isset($_POST['dangnhap']) && $_SERVER["REQUEST_METHOD"] === 'POST')
    {
        $adminEmail = $_POST['adminEmail'];
        $adminPassword = md5($_POST['adminPassword']);
    
        if(!$adminEmail){
            $error = '<p class="error-message">Tài khoản không được để trống</p>';
        }
        else if(!$adminPassword){
            $error = '<p class="error-message">Mật khẩu không được để trống</p>';
        }
        else{
            $query = "SELECT * FROM tbl_admin WHERE adminEmail = '$adminEmail' AND adminPassword = '$adminPassword'";
            $result = mysqli_query($connect, $query);
            $row_dangnhap = mysqli_fetch_array($result);
            if(mysqli_num_rows($result) > 0){
                $_SESSION['dangnhap'] = $row_dangnhap['adminId'];
                $_SESSION['adminName'] = $row_dangnhap['adminName'];
                header('Location: index.php');
            }
            else{
                $error = '<p class="error-message">Tài khoản hoặc mật khẩu sai</p>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập-Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Xin chào trở lại</h1>
                                        <?php 
                                            if(isset($error))
                                            {
                                                echo $error;
                                            }
                                            ?>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id=""
                                                aria-describedby="emailHelp" placeholder="Nhập địa chỉ Email"
                                                name="adminEmail">

                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id=""
                                                placeholder="Nhập mật khẩu" name="adminPassword">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <input type="submit" value="Đăng nhập" name="dangnhap"
                                            class="btn btn-primary btn-user btn-block">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>