<?php
    $title = 'Trang chủ';
    include './inc/header.php';
?>
<?php 
    if(!isset($_SESSION['dangnhap'])){
        header('Location: login.php');
    }
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
            include './inc/sidebar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include './inc/navbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <!-- Content Row -->
                <div class="row">

                    <!-- order total Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Tổng số đơn hàng</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo mysqli_num_rows(mysqli_query($connect,"SELECT DISTINCT
                                        tbl_order.orderCode,
                                        orderTime,
                                        orderStatus,
                                        tbl_customer.*
                                        FROM
                                        tbl_order
                                        INNER JOIN tbl_customer ON tbl_customer.customerId = tbl_order.customerId ")) ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- product Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Tổng số sản phẩm </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo mysqli_num_rows(mysqli_query($connect,"SELECT * FROM tbl_product")); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Tổng số tài khoản người dùng </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo mysqli_num_rows(mysqli_query($connect,"SELECT * FROM tbl_user")); ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Số đơn hàng chưa xử lý Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Số đơn hàng chưa xử lý</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php echo mysqli_num_rows(mysqli_query($connect, "SELECT DISTINCT
                                            tbl_order.orderCode,
                                            orderTime,
                                            orderStatus,
                                            tbl_customer.*
                                            FROM
                                                tbl_order
                                            INNER JOIN tbl_customer ON tbl_customer.customerId = tbl_order.customerId
                                            WHERE
                                                orderStatus = 'received' 
                                            ORDER BY
                                                orderTime
                                            DESC")) ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Page Wrapper -->
            <!-- footer  -->
            <?php
    include './inc/footer.php';
?>