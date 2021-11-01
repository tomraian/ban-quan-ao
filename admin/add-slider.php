<?php
    $title = 'Thêm slider';
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
                        $sliderName = $_POST['sliderName'];
                        $sliderDesc = $_POST['sliderDesc'];
                        $permitted = array('jpg', 'jpeg', 'png' , 'gif');
                        $file_name = $_FILES['sliderImage'] ['name'];
                        // dùng để lấy ra tên file upload 
                        // $file_size = $_FILES['sliderImage'] ['size'];
                        $file_temp = $_FILES['sliderImage'] ['tmp_name'];
                        // đùng để lấy ra đường dẫn file tạm .tmp 
                        $div = explode('.', $file_name);
                         // hàm explode dùng để tách chuỗi ở vị trí dấu "."
                        // ví dụ upload file info.png 
                        // ===> tách ra info và png 
                        $file_ext = strtolower(end($div));
                        // hàm strtolower dùng để chuyển sang chữ thường 
                        $unique_image = md5(time()).".".$file_ext;
                        // lấy thời gian + mã hóa md5 + tên đuôi file
                        $uploaded_image = "../uploads/".$unique_image;
                        if(empty($sliderName)){
                            $message = '<p class="error-message">Vui lòng nhập tên slider</p>';
                        }
                        else if(strlen($sliderName) < 3){
                            $message = '<p class="error-message">Tên slider phải từ 2 ký tự trở lên</p>';
                        }
                        else if(empty($sliderDesc)){
                            $message = '<p class="error-message">Vui lòng nhập mô tả slider</p>';
                        }
                        else if(empty($file_name)){
                            $message = '<p class="error-message">Vui lòng chọn hình ảnh</p>';
                        }
                        else if(in_array($file_ext, $permitted) === false)
                        {
                            $message  = '<p class="error-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</p>";
                        }
                        else{
                            $query = "INSERT INTO tbl_slider(sliderName, sliderImage, sliderDesc) VALUES ('$sliderName','$unique_image','$sliderDesc')";
                            $result = mysqli_query($connect, $query);
                            // move_uploaded_file($sliderImage,$path);
                            move_uploaded_file($file_temp,$uploaded_image);
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="sliderName">Nhập tên slider</label>
                                    <input type="text" name="sliderName" id="sliderName" placeholder="Nhập tên slider">
                                </div>
                                <div class="form-group">
                                    <label for="sliderDesc">Nhập mô tả slider</label>
                                    <textarea name="sliderDesc" id="sliderDesc" cols="30" rows="10"
                                        placeholder="Nhập mô tả slider"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sliderImage">Chọn hình ảnh</label>
                                    <input type="file" name="sliderImage" id="sliderImage" placeholder="Chọn hình ảnh"
                                        accept=".jpg, .jpeg, .png .gif">
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