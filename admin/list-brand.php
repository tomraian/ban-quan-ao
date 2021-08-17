<?php
    $title = 'Danh sách thương hiệu';
    include './inc/header.php';
?>
<!-- xóa sản phẩm  -->
<?php
if(isset($_GET['delId'])){
    $brandId = $_GET['delId'];
    $queryDel = "DELETE FROM `tbl_brand` WHERE brandId = '$brandId'";
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
                                        <th>Tên thương hiệu</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
                                        $result = mysqli_query($connect, $query);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            $stt = 0;
                                            while($brand = mysqli_fetch_array($result))
                                            {
                                                $stt++;
                                    ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td><?php echo $brand["brandName"] ?></td>
                                        <td><a href="edit-brand.php?editId=<?php echo $brand["brandId"]?>"
                                                class="action-btn edit"><i class="far fa-edit"></i> Sửa</a></td>
                                        <td><a href="?delId=<?php echo $brand["brandId"]?>" class=" action-btn remove">
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