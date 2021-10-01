 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-store d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-store-icon rotate-n-15">
         </div>
         <div class="sidebar-store-text mx-3">
             <img src=".././admin/img/logo.png" alt="" style="margin-top: 20px;">
         </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Trang chủ</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Sản phẩm
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Cửa hàng</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="./list-store.php">Danh sách cửa hàng</a>
                 <a class="collapse-item" href="./add-store.php">Thêm cửa hàng</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
             aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Danh mục</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="./list-category.php">Danh sách danh mục</a>
                 <a class="collapse-item" href="./add-category.php">Thêm danh mục</a>
             </div>
         </div>
     </li>

     <!-- demo  -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slider" aria-expanded="true"
             aria-controls="slider">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Slider</span>
         </a>
         <div id="slider" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="./list-slider.php">Danh sách slider</a>
                 <a class="collapse-item" href="./add-slider.php">Thêm slider</a>
             </div>
         </div>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
             aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Sản phẩm</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="./list-product.php">Danh sách sản phẩm</a>
                 <a class="collapse-item" href="./list-hideproduct.php">Sản phẩm bị ẩn</a>
                 <a class="collapse-item" href="./add-product.php">Thêm sản phẩm</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order" aria-expanded="true"
             aria-controls="order">
             <i class="fas fa-fw fa-folder"></i>
             <span>Đơn hàng</span>
         </a>
         <div id="order" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="./order-unprocessed.php">Đơn hàng chưa xử lý</a>
                 <a class="collapse-item" href="./order-processed.php">Đơn hàng đã xử lý</a>
                 <a class="collapse-item" href="./order-cancel.php">Đơn hàng đã hủy</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="true"
             aria-controls="user">
             <i class="fas fa-fw fa-folder"></i>
             <span>Tài khoản</span>
         </a>
         <div id="user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="./list-user.php">Danh sách người dùng</a>
                 <a class="collapse-item" href="./list-admin.php">Danh sách quản trị viên</a>
                 <a class="collapse-item" href="./add-admin.php">Thêm quản trị viên</a>
             </div>
         </div>
     </li>

     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contact" aria-expanded="true"
             aria-controls="contact">
             <i class="fas fa-fw fa-folder"></i>
             <span>Liên hệ</span>
         </a>
         <div id="contact" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item" href="./list-contact.php">Danh sách liên hệ</a>
                 <a class="collapse-item" href="./hide-contact.php">Liên hệ đã ẩn</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Charts -->
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->