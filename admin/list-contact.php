<?php
    $title = 'Danh sách liên hệ';
    include './inc/header.php';
?>
<?php
// xóa liên hệ 
if(isset($_GET['delId'])){
    $contactId = $_GET['delId'];
    $queryDel = "DELETE FROM `tbl_contact` WHERE contactId = '$contactId'";
    $resultDel = mysqli_query($connect, $queryDel);
    if($resultDel){
        $message = '<p class="success-message">Xóa thành công</p>';
    }
}
// ẩn liên hệ
else if(isset($_GET['hideId'])){
    $contactId = $_GET['hideId'];
    $queryDel = "UPDATE tbl_contact SET contactStatus= 1 WHERE contactId = '$contactId'";
    $resultDel = mysqli_query($connect, $queryDel);
    if($resultDel){
        $message = '<p class="success-message">Ẩn liên hệ thành công</p>';
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

                                <?php
                                if(isset($_GET['name']) && isset($_GET['message'])){
                                    $name = $_GET['name'];
                                    $message = $_GET['message'];
                                }
                                ?>
                                <thead>
                                    <tr class="text-center">
                                        <th>STT</th>
                                        <th>Tên người liên hệ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Vấn đề</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
                                        <th>Xem</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $query = "SELECT * FROM tbl_contact WHERE contactStatus = 0 ORDER BY contactId DESC";
                                        $result = mysqli_query($connect, $query);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            $stt = 0;
                                            while($contact = mysqli_fetch_array($result))
                                            {
                                                $stt++;
                                    ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td> <?php echo $contact["contactName"]?> </td>
                                        <td> <?php echo $contact["contactPhone"]?> </td>
                                        <td> <?php echo $contact["contactEmail"]?> </td>
                                        <td> <?php echo $contact["contactHeading"]?> </td>
                                        <td> <?php echo $contact["contactMessage"]?> </td>
                                        <td> <?php
                                            echo date("d/m/Y H:i:s", strtotime($contact['contactTime']))
                                        ?> </td>
                                        <td><a href="?hideId=<?php echo $contact["contactId"]?>"
                                                class="action-btn hide"><i class="far fa-eye-slash"></i> Đã xem</a></td>
                                        <td><a href="?delId=<?php echo $contact["contactId"]?>"
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