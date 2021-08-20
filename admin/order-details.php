<?php
    $title = 'Chi tiết đơn hàng';
    include './inc/header.php';
?>
<?php
if(isset($_GET['shipped'])){
    $orderCode = $_GET['shipped'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'shipped' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
        echo "<script>window.location = 'order-details.php?code=$orderCode'</script>";
    }
}
else if(isset($_GET['delivered'])){
    $orderCode = $_GET['delivered'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'delivered' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
                echo "<script>window.location = 'order-details.php?code=$orderCode'</script>";

    }
}
else if(isset($_GET['hide'])){
    $orderCode = $_GET['hide'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'hide' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
            echo "<script>window.location = 'order-processed.php'</script>";
    }
}
else if(isset($_GET['cancel'])){
    $orderCode = $_GET['cancel'];
    $result = mysqli_query($connect,"UPDATE tbl_order SET orderStatus = 'cancel' WHERE orderCode = '$orderCode' ");
    if(isset($result)){
        echo "<script>window.location = 'order-cancel.php'</script>";
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
                <!-- thông tin khách hàng  -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5>Thông tin khách hàng</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Tên</th>
                                        <th>Mã đơn</th>
                                        <th>Số điện thoại </th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Thời gian đặt</th>
                                        <th>Thanh toán</th>
                                        <th>Lưu ý</th>
                                        <th>Xử lý đơn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['code']))
                                        {
                                            $orderCode = $_GET['code'];
                                            $query = "SELECT DISTINCT
                                            tbl_order.orderCode,
                                            orderTime,
                                            orderStatus,
                                            tbl_customer.*
                                        FROM
                                            tbl_order
                                        INNER JOIN tbl_customer ON tbl_customer.customerId = tbl_order.customerId WHERE orderCode = '$orderCode'";
                                            $result = mysqli_query($connect, $query);
                                            if(mysqli_num_rows($result) > 0)
                                            {
                                            while($order = mysqli_fetch_array($result))
                                            {
                                    ?>
                                    <tr>
                                        <td><?php echo $order['customerName']; ?></td>
                                        <td><?php echo $order['orderCode']; ?></td>
                                        <td><?php echo $order['customerPhone']; ?></td>
                                        <td><?php echo $order['customerEmail']; ?></td>
                                        <td><?php echo $order['customerAddress']; ?></td>
                                        <td><?php echo date("d/m/Y H:i:s", strtotime($order['orderTime'])) ?></td>
                                        <td class="text-uppercase"><?php echo $order['customerPayment'];; ?></td>
                                        <td>
                                            <?php echo $order['customerNote'];; ?>
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
                                            <?php 
                                                    if($order['orderStatus'] != 'hide'){
                                                        echo "<a href='?cancel=$orderCode' class='action-btn remove'>Hủy đơn</a>";
                                            }
                                            ?>
                                        </td>
                                        <?php
                                          }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- thông tin đơn hàng -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5>Thông tin đặt hàng</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Size</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['code']))
                                        {
                                            $orderCode = $_GET['code'];
                                        $query = "SELECT 
                                        tbl_order.*,
                                        tbl_cart.*,
                                        tbl_product.*
                                        FROM
                                            tbl_cart
                                        INNER JOIN tbl_order ON tbl_order.cartId = tbl_cart.cartId
                                        INNER JOIN tbl_product ON tbl_product.productId = tbl_cart.productId
                                        WHERE orderCode = '$orderCode'";
                                        $result = mysqli_query($connect, $query);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            $total = 0;
                                            while($product = mysqli_fetch_array($result))
                                            {
                                                $old_price_total = number_format($product['productPrice'] * $product['cartOrderAmount'], 0, "", ",")." VNĐ";
                                                $new_price_total = number_format($product['productDiscount']* $product['cartOrderAmount'], 0, "", ",")." VNĐ";
                                                if($product["productDiscount"] < 1000){
                                                    $total += $product['productPrice'] * $product['cartOrderAmount'];
                                                }
                                                else{
                                                    $total += $product['productDiscount']* $product['cartOrderAmount'];
                                                }
                                    ?>
                                    <tr>
                                        <td> <?php echo $product["productName"]?>
                                        </td>
                                        <td> <img src="../uploads/<?php echo $product["productImage"]?>" alt=""
                                                width="150px">
                                        </td>
                                        <td> <?php echo $product["cartSize"]?>
                                        </td>
                                        <td> <?php echo $product["cartOrderAmount"]?>
                                        </td>
                                        <td>
                                            <?php
                                            if($product['productDiscount'] < 1000){
                                                echo $old_price_total;
                                            }
                                            else{
                                                echo $new_price_total;
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php
                                          }
                                        }
                                        else{
                                            $total = -30000;
                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="100">Tổng thu:
                                            <?php  
                                                    $maxTotal = number_format($total + 30000, 0, "", ",")." VNĐ" ;
                                                    echo $maxTotal;
                                            ?> </td>
                                    </tr>
                                </tfoot>
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