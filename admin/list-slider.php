<?php
    $title = 'Danh sách thương hiệu';
    include './inc/header.php';
?>
<!-- xóa sản phẩm  -->
<?php
if(isset($_GET['delId'])){
    $sliderId = $_GET['delId'];
    $queryDel = "DELETE FROM `tbl_slider` WHERE sliderId = '$sliderId'";
    $resultDel = mysqli_query($connect, $queryDel);
    if($resultDel){
        $message = '<p class="success-message">Xóa thành công</p>';
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>STT</th>
                                        <th>Tên slider</th>
                                        <th>Mô tả slider</th>
                                        <th>Hình ảnh slider</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $query = "SELECT * FROM tbl_slider ORDER BY sliderId DESC";
                                        $result = mysqli_query($connect, $query);
                                        
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            $stt = 0;
                                            while($slider = mysqli_fetch_array($result))
                                            {
                                                $stt++;
                                    ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td><?php echo $slider["sliderName"] ?></td>
                                        <td><?php echo $slider["sliderDesc"] ?></td>
                                        <td><img src="../uploads/<?php echo $slider["sliderImage"] ?>" alt=""
                                                width="250px"></td>
                                        <td><a href="edit-slider.php?editId=<?php echo $slider["sliderId"]?>"
                                                class="action-btn edit"><i class="far fa-edit"></i> Sửa</a></td>
                                        <td><a href="?delId=<?php echo $slider["sliderId"]?>"
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