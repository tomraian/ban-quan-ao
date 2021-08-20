<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <?php
                 $result = mysqli_query($connect, "SELECT DISTINCT
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
                 DESC");
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo mysqli_num_rows($result) ?></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Đơn hàng mới
                </h6>
                <?php 
                    if($result){
                        while($order = mysqli_fetch_array($result)){
                ?>
                <a class="dropdown-item d-flex align-items-center"
                    href="order-details.php?code=<?php echo $order['orderCode'] ?>">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">
                            <?php echo date("d/m/Y H:i:s", strtotime($order['orderTime'])) ?></div>
                        <span class="font-weight-bold">
                            <?php echo $order['orderCode']; ?>
                        </span>
                    </div>
                </a>
                <?php 
                    }
                }
                ?>
                <a class="dropdown-item text-center small text-gray-500" href="order-unprocessed.php">Xem toàn bộ
                    đơn
                    hàng</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <?php
                    $query = "SELECT * FROM tbl_contact WHERE contactStatus = 0 ORDER BY contactId DESC";
                    $result = mysqli_query($connect, $query);
                ?>
                <span class="badge badge-danger badge-counter"><?php echo mysqli_num_rows($result)?></span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Trung tâm tin nhắn
                </h6>
                <?php
                     if(mysqli_num_rows($result) > 0)
                     {
                         $stt = 0;
                         while($contact = mysqli_fetch_array($result))
                         {
                             $stt++;
                ?>
                <a class="dropdown-item d-flex align-items-center" href="list-contact.php">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate"><?php echo $contact['contactHeading'] ?></div>
                        <div class="small text-gray-500"><?php echo $contact['contactName'] ?> ·
                            <?php echo date("d/m/Y H:i:s", strtotime($contact['contactTime'])) ?></div>
                    </div>
                </a>
                <?php 
                        }
                    }
                    ?>
                <a class="dropdown-item text-center small text-gray-500" href="list-contact.php">Xem toàn bộ tin
                    nhắn
                </a>

            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['adminName'] ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="account.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Tài khoản
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?dangxuat">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo $title ?></h1>