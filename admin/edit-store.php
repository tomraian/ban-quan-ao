<?php
    $title = 'Sửa cửa hàng';
    include './inc/header.php';
?>
<?php
    if(isset($_GET['editId'])){
        $storeId = $_GET['editId'];
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
                        $storeName = $_POST['storeName'];
                        $storeAddress = $_POST['storeAddress'];
                        if(empty($storeName)){
                            $message = '<p class="error-message">Vui lòng nhập tên cửa hàng</p>';
                        }
                        else if(strlen($storeName) < 3){
                            $message = '<p class="error-message">Tên cửa hàng phải từ 2 ký tự trở lên</p>';
                        }
                        if(empty($storeAddress)){
                            $message = '<p class="error-message">Vui lòng nhập địa chỉ cửa hàng</p>';
                        }
                        else if(strlen($storeAddress) < 3){
                            $message = '<p class="error-message">Địa chỉ cửa hàng phải từ 2 ký tự trở lên</p>';
                        }
                        else{
                            $query = "UPDATE tbl_store SET storeName= '$storeName' , storeAddress = '$storeAddress' WHERE storeId = '$storeId'";
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
                                    $getBrand = "SELECT * FROM tbl_store WHERE storeId = '$storeId'";
                                    $resultBrand = mysqli_query($connect, $getBrand);
                                    if(mysqli_num_rows($resultBrand) > 0){
                                        while($store = mysqli_fetch_array($resultBrand)){
                                ?>
                                <div class="form-group">
                                    <label for="storeName">Nhập tên cửa hàng</label>
                                    <input type="text" name="storeName" id="storeName"
                                        value="<?php echo $store['storeName'] ?>" placeholder="Nhập tên cửa hàng">
                                </div>
                                <div class="form-group">
                                    <label for="storeAddress">Nhập địa chỉ cửa hàng</label>
                                    <textarea type="text" name="storeAddress" id="storeAddress"
                                        placeholder="Nhập địa chỉ cửa hàng"><?php echo $store['storeAddress']?></textarea>
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