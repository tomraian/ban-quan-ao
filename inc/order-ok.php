<!--Checkout page section-->
<div class="Checkout_section">
    <center>
        <h1>Cảm ơn bạn đã đặt hàng</h1>
        <h2>Sẽ có nhân viên gọi đến và xác nhận đơn hàng trong vòng 24h</h2>
        <h4>Mã đơn hàng của bạn là
            <?php
                if(!isset($_GET['don-hang']) || $_GET['don-hang'] == "" ){
                    echo '<script>window.location = "index.php"</script>';
                }
                else{
                    $orderCode = $_GET['don-hang'];
                    $query = "SELECT * FROM tbl_order WHERE orderCode = '$orderCode' ORDER BY orderId DESC LIMIT 1";
                    $result = mysqli_query($connect,$query); 
                    if(mysqli_num_rows($result) < 0){
                        echo '<script>window.location = "index.php"</script>';
                    }
                }
            if(isset($result)){
                while($order = mysqli_fetch_array($result)){
                    $orderCode = $order['orderCode'];
                    echo "$orderCode";
                    echo '</h4>';
                    echo "<h4><a style='color: red;' href='?kiem-tra-don-hang&don-hang=$orderCode' title='Kiểm tra đơn hàng'>Kiểm tra đơn hàng</a></h4>";
                }
            }
        ?>
            <img src="./assets/img/c4420de3869ddd2d21ac8dd7265d211c.gif" alt="">
    </center>
</div>
<!--Checkout page section end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->