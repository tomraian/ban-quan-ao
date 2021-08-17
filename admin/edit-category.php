<?php
    $title = 'Sửa danh mục';
    include './inc/header.php';
?>
<?php
    if(isset($_GET['editId'])){
        $categoryId = $_GET['editId'];
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
                <!-- sửa danh mục  -->
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
                            $query = "UPDATE tbl_category SET categoryName= '$categoryName', categoryLink = '$categoryLink' WHERE categoryId = '$categoryId'";
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
                                    $getCategory = "SELECT * FROM tbl_category WHERE categoryId = '$categoryId'";
                                    $resultCategory = mysqli_query($connect, $getCategory);
                                    if(mysqli_num_rows($resultCategory) > 0){
                                        while($category = mysqli_fetch_array($resultCategory)){
                                ?>
                                <div class="form-group">
                                    <label for="categoryName">Nhập tên danh mục</label>
                                    <input type="text" name="categoryName" id="categoryName"
                                        value="<?php echo $category['categoryName'] ?>" placeholder="Nhập tên danh mục">
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