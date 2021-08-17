<?php
    $title = 'Danh sách sản phẩm bị ẩn';
    include './inc/header.php';
?>
<?php
// xóa sản phẩm 
if(isset($_GET['delId'])){
    $productId = $_GET['delId'];
    $queryDel = "DELETE FROM `tbl_product` WHERE productId = '$productId'";
    $resultDel = mysqli_query($connect, $queryDel);
    if($resultDel){
        $message = '<p class="success-message">Xóa thành công</p>';
    }
}
// ẩn sản phẩm 
if(isset($_GET['unhideId'])){
    $productId = $_GET['unhideId'];
    $queryDel = "UPDATE tbl_product SET productStatus= 1 WHERE productId = '$productId'";
    $resultDel = mysqli_query($connect, $queryDel);
    if($resultDel){
        $message = '<p class="success-message">Hiện sản phẩm thành công</p>';
    }
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            if(isset($message)){
                                echo $message;
                            }
                            ?>
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá tiền</th>
                                        <th>Giá khuyến mãi</th>
                                        <th>Kho hàng</th>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Nổi bật</th>
                                        <th>Ẩn</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $query = "SELECT * FROM tbl_product WHERE productStatus = 0 ORDER BY productId DESC";
                                        $result = mysqli_query($connect, $query);
                                        
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            $stt = 0;
                                            while($product = mysqli_fetch_array($result))
                                            {
                                                $stt++;
                                    ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td> <a href="edit-product.php?editId=<?php echo $product["productId"]?>"
                                                title="<?php echo $product["productDesc"] ?>"><?php echo $product["productName"] ?></a>
                                        </td>
                                        <td><?php echo number_format($product["productPrice"], 0, '', ',')." VNĐ"?>
                                        </td>
                                        <td> <?php echo number_format($product["productDiscount"], 0, '', ',')." VNĐ"?>
                                        </td>
                                        <td> <?php echo $product["productAmount"]?>
                                        </td>
                                        <td>
                                            <img src="../uploads/<?php echo $product["productImage"] ?>" alt=""
                                                width="150px">
                                        </td>
                                        <td> <?php if($product["productFeatured"] == 0){
                                            echo 'Không';
                                        }
                                        else{
                                            echo 'Có';
                                        }
                                        ?>
                                        </td>
                                        <td><a href="?unhideId=<?php echo $product["productId"]?>"
                                                class="action-btn hide"><i class="far fa-eye"></i> Hiện</a></td>
                                        <td><a href="edit-product.php?editId=<?php echo $product["productId"]?>"
                                                class="action-btn edit"><i class="far fa-edit"></i> Sửa</a></td>
                                        <td><a href="?delId=<?php echo $product["productId"]?>"
                                                class=" action-btn remove">
                                                <i class="far fa-trash-alt"></i> Xóa
                                            </a></td>
                                    </tr>
                                    <?php
                                          }
                                        }
                                    ?>
                                </tbody>
                            </table>
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