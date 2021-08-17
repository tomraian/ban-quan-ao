<?php
    $title = 'Danh sách đơn hàng chưa xử lý';
    include './inc/header.php';
?>
<?php
// xóa sản phẩm 
// if(isset($_GET['delId'])){
//     $productId = $_GET['delId'];
//     $queryDel = "DELETE FROM `tbl_product` WHERE productId = '$productId'";
//     $resultDel = mysqli_query($connect, $queryDel);
//     if($resultDel){
//         $message = '<p class="success-message">Xóa thành công</p>';
//     }
// }
// ẩn sản phẩm 
// if(isset($_GET['hideId'])){
//     $productId = $_GET['hideId'];
//     $queryDel = "UPDATE tbl_product SET productStatus=0 WHERE productId = '$productId'";
//     $resultDel = mysqli_query($connect, $queryDel);
//     if($resultDel){
//         $message = '<p class="success-message">Ẩn sản phẩm thành công</p>';
//     }
// }
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
                                        tbl_order.orderCode,orderTime,orderStatus,
                                        tbl_customer.*
                                        FROM
                                        tbl_order
                                        INNER JOIN tbl_customer ON tbl_customer.customerId = tbl_order.customerId";
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
                                        <td><?php echo $order['customerName']; ?></td>
                                        <td><?php echo $order['orderCode'];; ?></td>
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
                                        <td>
                                            <a href="" class="action-btn edit mb-10">
                                                <?php
                                                if($order['orderStatus'] == 'received')
                                                {
                                                    echo "Tiếp nhận";
                                                }
                                                ?>
                                            </a>
                                            <a href="" class="action-btn remove">Hủy đơn</a>
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