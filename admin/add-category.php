<?php
    $title = 'Thêm danh mục';
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
                        $categoryName = $_POST['categoryName'];
                        $categoryLink = convert_link($_POST['categoryName']);
                        if(empty($categoryName)){
                            $message = '<p class="error-message">Vui lòng nhập tên danh mục</p>';
                        }
                        else if(strlen($categoryName) > 31){
                            $message = '<p class="error-message">Tên danh mục phải ít hơn 30 ký tự</p>';
                        }
                        else{
                            $query = "INSERT INTO tbl_category (categoryName,categoryLink) VALUES ('$categoryName','$categoryLink')";
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
                                    <label for="categoryName">Nhập tên danh mục</label>
                                    <input type="text" name="categoryName" id="categoryName"
                                        placeholder="Nhập tên danh mục">
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