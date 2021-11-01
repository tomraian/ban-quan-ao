<?php
    $title = 'Sửa sản phẩm';
    include './inc/header.php';
?>
<?php
    if(isset($_GET['editId'])){
        $productId = $_GET['editId'];
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
                <?php
                    if(isset($_POST['add'])){
                        $productName = $_POST['productName'];
                        $productLink = convert_link($_POST['productName']);
                        $productPrice = $_POST['productPrice'];
                        $productDiscount = $_POST['productDiscount'];
                        $productDesc = $_POST['productDesc'];
                        $productAmount = $_POST['productAmount'];
                        $productFeatured = $_POST['productFeatured'];
                        $categoryId = $_POST['categoryId'];
                        
                        $permitted = array('jpg', 'jpeg', 'png' , 'gif');
                        $file_name = $_FILES['productImage'] ['name'];
                        // dùng để lấy ra tên file upload 
                        // $file_size = $_FILES['productImage'] ['size'];
                        $file_temp = $_FILES['productImage'] ['tmp_name'];
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
                        if(empty($productName)){
                            $message = '<p class="error-message">Vui lòng nhập tên sản phẩm</p>';
                        }
                        else if(strlen($productName) < 3){
                            $message = '<p class="error-message">Tên sản phẩm phải từ 2 ký tự trở lên</p>';
                        }
                        else if(strlen($productName) > 101){
                            $message = '<p class="error-message">Tên sản phẩm phải ít hơn 100 ký tự</p>';
                        }
                        else if(empty($productDesc)){
                            $message = '<p class="error-message">Vui lòng nhập mô tả sản phẩm</p>';
                        }
                        else if(empty($productPrice)){
                            $message = '<p class="error-message">Vui lòng nhập giá sản phẩm</p>';
                        }
                        else{
                            if((empty($file_name))){
                                $query = "UPDATE tbl_product SET productName='$productName',productPrice='$productPrice',productDiscount='$productDiscount',productDesc='$productDesc',productAmount='$productAmount',productFeatured=$productFeatured,categoryId='$categoryId',productLink = '$productLink' WHERE productId = '$productId'";
                            }
                            else{
                                if(in_array($file_ext, $permitted) === false)
                                {
                                    $message  = '<p class="error-message">Ảnh chỉ được có định dạng file là '.implode(',',$permitted)."</p>";
                                }
                                else{
                                $query = "UPDATE tbl_product SET productName='$productName',productPrice='$productPrice',productDiscount='$productDiscount',productDesc='$productDesc',productAmount='$productAmount',productFeatured=$productFeatured,categoryId='$categoryId',productImage = '$unique_image',productLink = '$productLink' WHERE productId = '$productId'";
                                }
                            }
                            $result = mysqli_query($connect, $query);
                            move_uploaded_file($file_temp,$uploaded_image);
                            if($result){
                                $message = '<p class="success-message">Sửa thành công</p>';
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
                                <?php
                                    $getProduct = "SELECT * FROM tbl_product WHERE productId = '$productId'";
                                    $resultProduct = mysqli_query($connect, $getProduct);
                                    if(mysqli_num_rows($resultProduct) > 0){
                                        while($product = mysqli_fetch_array($resultProduct)){
                                ?>
                                <div class="form-group">
                                    <label>Xem sản phẩm</label>
                                    <a
                                        href="http://localhost/banquanao/?sanpham=<?php echo $productId?>/<?php echo $product['productLink'] ?>">http://localhost/banquanao/?sanpham=<?php echo $productId?>/<?php echo $product['productLink'] ?></a>
                                </div>
                                <div class="form-group">
                                    <label for="productFeatured">----------Sản phẩm nổi bật----------</label>
                                    <select name="productFeatured" id="productFeatured">
                                        <option value="0" <?php if($product['productFeatured'] == 0){
                                                echo 'selected';
                                            }?>>Không nổi bật</option>
                                        <option value="1" <?php if($product['productFeatured'] == 1){
                                                echo 'selected';
                                            }?>>Nổi bật</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoryName">----------Chọn danh mục----------</label>
                                    <select name="categoryId" id="categoryName">
                                        <?php
                                        $query = "SELECT * FROM tbl_category ORDER BY categoryName ASC";
                                        $result = mysqli_query($connect, $query);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($category = mysqli_fetch_array($result))
                                            {
                                        ?>
                                        <option value="<?php echo $category['categoryId'] ?>" <?php
                                         if($product['categoryId'] == $category['categoryId']) {
                                            echo 'selected';
                                         }
                                         ?>>
                                            <?php echo $category['categoryName'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="productName">Nhập tên sản phẩm</label>
                                    <input type="text" name="productName" id="productName" required
                                        value="<?php echo $product['productName'] ?>" placeholder="Nhập tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="productDesc">Nhập mô tả sản phẩm</label>
                                    <textarea name="productDesc" id="productDesc" cols="30" rows="10" required
                                        placeholder="Nhập mô tả sản phẩm"><?php echo $product['productDesc'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Nhập giá sản phẩm</label>
                                    <input type="number" name="productPrice" id="productPrice" min="1000" required
                                        value="<?php echo $product['productPrice'] ?>" placeholder="Giá sản phẩm VNĐ">
                                </div>
                                <div class="form-group">
                                    <label for="productDiscount">Nhập giá khuyến mãi sản phẩm</label>
                                    <input type="number" name="productDiscount" id="productDiscount" min="1000" value="<?php if($product['productDiscount'] >= 1000){
                                            echo $product['productDiscount'] ;
                                        }?>" placeholder="Giá khuyến mãi sản phẩm VNĐ">
                                </div>
                                <div class="form-group">
                                    <label for="productAmount">Nhập số lượng kho</label>
                                    <input type="number" name="productAmount" id="productAmount"
                                        value="<?php echo $product['productAmount'] ?>" placeholder="Số lương sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="productImage">Chọn hình ảnh</label>
                                    <img src="../uploads/<?php echo $product['productImage'] ?>" alt="" width="230px">
                                    <input type="file" name="productImage" id="productImage" placeholder="Chọn hình ảnh"
                                        accept=".jpg, .jpeg, .png .gif">
                                </div>
                                <?php
                                        }
                                    }
                                ?>
                                <div class="form-group">
                                    <input type="submit" name="add" class="btn" value="Sửa">
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