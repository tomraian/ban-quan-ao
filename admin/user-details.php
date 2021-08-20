<?php
    $title = 'Danh sách người dùng';
    include './inc/header.php';
?>
<?php
if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
    $query = "SELECT * FROM tbl_user WHERE userId = '$userId'";
    $result = mysqli_query($connect, $query);
}
if(!isset($_GET['userId'])){
    echo '<script>window.location = "list-user.php" </script>';
}
// xóa người dùng
else if(isset($_GET['delId'])){
    $userId = $_GET['delId'];
    $queryDel = "DELETE FROM tbl_user WHERE userId = '$userId'";
    $resultDel = mysqli_query($connect, $queryDel);
    if($resultDel){
        echo '<script>window.location = "list-user.php" </script>';
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
                        <div class="table-responsive">
                            <?php
                            if(isset($message)){
                                echo $message;
                            }
                            ?>
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($user = mysqli_fetch_array($result))
                                            {
                                    ?>
                                    <tr>
                                        <td><?php echo $user['userName']; ?></td>
                                        <td><?php echo $user['userEmail']; ?></td>
                                        <td><?php echo $user['userPhone']; ?></td>
                                        <td><?php echo $user['userAddress']; ?></td>
                                        <td><?php echo $user['userBirthday']; ?></td>
                                        <td>
                                            <?php 
                                                if($user['userGender'] == 0){
                                                    echo 'Nam';
                                                }
                                                else{
                                                    echo 'Nữ';
                                                }
                                            ?>
                                        </td>
                                        <td><a href="?delId=<?php echo $user["userId"]?>" class=" action-btn remove">
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

                <!-- thông tin đơn hàng đã đặt -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            if(isset($message)){
                                echo $message;
                            }
                            ?>
                            <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Trạng thái</th>
                                        <th>Xem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT DISTINCT  orderCode,orderTime,orderStatus FROM tbl_order WHERE userId = '$userId' ORDER BY orderTime DESC";
                                        $result = mysqli_query($connect,$query);
                                        if($result){
                                            while($order = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $order['orderCode'] ?></td>
                                        <td><?php echo date("d/m/Y H:i:s", strtotime($order['orderTime'])) ?></td>
                                        <td>
                                            <?php
                                                if($order['orderStatus'] == 'received')
                                                {
                                                    echo 'Đã xác nhận đơn';
                                                }
                                                else if($order['orderStatus'] == 'shipped')
                                                {
                                                    echo 'Đang giao hàng';
                                                }
                                                else if($order['orderStatus'] == 'delivered')
                                                {
                                                    echo 'Giao hàng thành công';
                                                }
                                                else if($order['orderStatus'] == 'hide')
                                                {
                                                    echo 'Giao hàng thành công';
                                                }
                                                else if($order['orderStatus'] == 'cancel')
                                                {
                                                    echo 'Đơn hàng bị hủy';
                                                }
                                            ?>
                                        </td>
                                        <td><a href="order-details.php?code=<?php echo $order['orderCode'] ?>"
                                                class="view">Xem chi tiết</a></td>
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