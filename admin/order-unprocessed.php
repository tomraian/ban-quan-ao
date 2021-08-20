<?php
    $title = 'Danh sách đơn hàng chưa xử lý';
    include './inc/header.php';
?>
<?php
if(isset($_GET['shipped'])){
    $orderCode = $_GET['shipped'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'shipped' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
        echo '<script>window.location = "order-unprocessed.php" </script>';
    }
}
else if(isset($_GET['delivered'])){
    $orderCode = $_GET['delivered'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'delivered' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
        echo '<script>window.location = "order-unprocessed.php" </script>';
    }
}
else if(isset($_GET['hide'])){
    $orderCode = $_GET['hide'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'hide' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
        echo '<script>window.location = "order-unprocessed.php" </script>';
    }
}
else if(isset($_GET['cancel'])){
    $orderCode = $_GET['cancel'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'cancel' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
        echo '<script>window.location = "order-unprocessed.php"</script>';
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
                                        <th>Tên Khách hàng</th>
                                        <th>Mã đơn</th>
                                        <th>Số điện thoại </th>
                                        <th>Email</th>
                                        <th>Thời gian đặt hàng</th>
                                        <th>Thanh toán</th>
                                        <th>Chi tiết</th>
                                        <th>Xử lý đơn</th>
                                        <!-- <th>Hủy đơn</th> -->
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
                                        INNER JOIN tbl_customer ON tbl_customer.customerId = tbl_order.customerId WHERE orderStatus = 'delivered' OR orderStatus = 'received' OR orderStatus = 'shipped' ORDER BY orderTime DESC";
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
                                                class="action-btn hide">Xem</a>
                                        </td>
                                        <td>

                                            <?php
                                                $orderCode = $order['orderCode'];
                                                if($order['orderStatus'] == 'received')
                                                {
                                                    echo "<a href='?shipped=$orderCode' class='action-btn warn mb-10' title='Nhấn để thay đổi trạng thái đơn hàng'>Tiếp nhận</a>";
                                                }
                                                else if($order['orderStatus'] == 'shipped'){
                                                    echo "<a href='?delivered=$orderCode' class='action-btn edit mb-10' title='Nhấn để thay đổi trạng thái đơn hàng' >Đang giao</a>";
                                                }
                                                else if($order['orderStatus'] == 'delivered'){
                                                    echo "<a href='?hide=$orderCode' class='action-btn hide mb-10' title='Nhấn để ẩn đơn hàng đã hoàn thành'>Đã giao</a>";
                                                }
                                                ?>
                                            <a href="?cancel=<?php echo $orderCode?>" class="action-btn remove">Hủy
                                                đơn</a>
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