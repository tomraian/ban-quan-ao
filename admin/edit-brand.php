<?php
    $title = 'Sửa thương hiệu';
    include './inc/header.php';
?>
<?php
    if(isset($_GET['editId'])){
        $brandId = $_GET['editId'];
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
                <!-- sửa thương hiệu  -->
                <?php
                    if(isset($_POST['add'])){
                        $brandName = $_POST['brandName'];
                        if(empty($brandName)){
                            $message = '<p class="error-message">Vui lòng nhập tên thương hiệu</p>';
                        }
                        else if(strlen($brandName) < 3){
                            $message = '<p class="error-message">Tên thương hiệu phải từ 2 ký tự trở lên</p>';
                        }
                        else if(strlen($brandName) > 26){
                            $message = '<p class="error-message">Tên thương hiệu phải ít hơn 25 ký tự</p>';
                        }
                        else{
                            $query = "UPDATE tbl_brand SET brandName= '$brandName' WHERE brandId = '$brandId'";
                            $result = mysqli_query($connect, $query);
                            if($result){
                                $message = '<p class="success-message">Sửa thành công</p>';
                            }
                        }
                    }
                ?>
                <?php
                ?>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            if(isset($message)){
                                echo $message;
                            }
                            ?>
                            <form action="" method="POST" autocomplete="off">
                                <?php
                                    $getBrand = "SELECT * FROM tbl_brand WHERE brandId = '$brandId'";
                                    $resultBrand = mysqli_query($connect, $getBrand);
                                    if(mysqli_num_rows($resultBrand) > 0){
                                        while($brand = mysqli_fetch_array($resultBrand)){
                                ?>
                                <div class="form-group">
                                    <label for="brandName">Nhập tên thương hiệu</label>
                                    <input type="text" name="brandName" id="brandName"
                                        value="<?php echo $brand['brandName'] ?>" placeholder="Nhập tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="add" class="btn" value="Sửa">
                                </div>
                                <?php
                                        }
                                    }
                                ?>
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