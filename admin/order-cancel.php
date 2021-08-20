<?php
    $title = 'Danh sách đơn hàng đã hủy';
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
                                        <th>Tên Khách hàng</th>
                                        <th>Mã đơn</th>
                                        <th>Số điện thoại </th>
                                        <th>Email</th>
                                        <th>Thời gian đặt hàng</th>
                                        <th>Thanh toán</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT DISTINCT
                                        tbl_order.orderCode,
                                        orderTime,
                                        orderStatus,
                                        tbl_customer.*
                                        FROM
                                        tbl_order
                                        INNER JOIN tbl_customer ON tbl_customer.customerId = tbl_order.customerId WHERE orderStatus = 'cancel'";
                                        $result = mysqli_query($connect, $query);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            $stt = 0;
                                            while($order = mysqli_fetch_array($result))
                                            {
                                                $stt++;
                                    ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td> <?php echo $order['customerName']; ?></td>
                                        <td> <a href="order-details.php?code=<?php echo $order['orderCode'] ?>">
                                                <?php echo $order['orderCode']; ?></a>
                                        </td>
                                        <td><?php echo $order['customerPhone']; ?></td>
                                        <td><?php echo $order['customerEmail']; ?></td>
                                        <td>
                                            <?php
                                            echo date("d/m/Y H:i:s", strtotime($order['orderTime']))
                                        ?>
                                        </td>
                                        <td class="text-uppercase"><?php echo $order['customerPayment']; ?></td>
                                        <td>
                                            <a href="order-details.php?code=<?php echo $order['orderCode'] ?>"
                                                class="action-btn hide">Chi tiết đơn</a>
                                        </td>
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