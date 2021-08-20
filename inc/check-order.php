<?php
    if(isset($_POST['kiem-tra'])){
        $orderCode = trim($_POST['orderCode']);
    echo "<script> window.location = \"?kiem-tra-don-hang&don-hang=$orderCode\";</script>";
    }
?>

<!--breadcrumbs area start-->
<?php 
    include 'breadcrumbs.php';
?>
<!--breadcrumbs area end-->
<!--blog area start-->
<div class="main_blog_area blog_details">
    <div class="row">
        <div class="col-lg-12 col-md-12 offset-md-12 offset-lg-12">
            <div class="blog_details_right">
                <div class="blog_widget search_widget mb-30">
                    <h3>Kiểm tra đơn hàng</h3>
                    <form action="" method="POST">
                        <input placeholder="Mã đơn hàng" type="text" name="orderCode" value="<?php
                            if(isset($_GET['don-hang'])){
                                echo $_GET['don-hang'];
                            }
                        ?>">
                        <button name="kiem-tra" type="submit"><i class="fa fa-search"></i> Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            if(isset($_GET['don-hang'])){
                include 'check-order-details.php';
            }
        ?>
    </div>
</div>
<!--blog area end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->