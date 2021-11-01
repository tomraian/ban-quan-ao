<?php
    $title = 'Thêm cửa hàng';
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
                        $storeName = $_POST['storeName'];
                        $storeAddress = $_POST['storeAddress'];
                        if(empty($storeName)){
                            $message = '<p class="error-message">Vui lòng nhập tên địa chỉ cửa hàng</p>';
                        }
                        else if(strlen($storeName) < 3){
                            $message = '<p class="error-message">Tên địa chỉ cửa hàng phải từ 2 ký tự trở lên</p>';
                        }
                        else if(empty($storeAddress)){
                            $message = '<p class="error-message">Vui lòng nhập địa chỉ cửa hàng</p>';
                        }
                        else if(strlen($storeAddress) < 3){
                            $message = '<p class="error-message">Địa chỉ cửa hàng phải từ 2 ký tự trở lên</p>';
                        }
                        else{
                            $query = "INSERT INTO tbl_store (storeName,storeAddress) VALUES ('$storeName','$storeAddress')";
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
                                    <label for="storeName">Nhập tên địa chỉ cửa hàng</label>
                                    <input type="text" name="storeName" id="storeName"
                                        placeholder="Nhập tên địa chỉ cửa hàng">
                                </div>
                                <div class="form-group">
                                    <label for="storeAddress">Nhúng địa chỉ cửa hàng(<a target="_blank"
                                            href="https://www.google.com/maps/">Map</a>)</label>

                                    <input type="text" name="storeAddress" id="storeAddress"
                                        placeholder="Nhập tên địa chỉ cửa hàng">
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