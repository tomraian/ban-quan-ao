<div class="col-lg-12 col-md-12">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>Thông tin đặt hàng</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center " id="dataTable" width="100%" cellspacing="0">
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
                                if(isset($_GET['don-hang']))
                                {
                                    $orderCode = $_GET['don-hang'];
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
                            <td> <img src="./uploads/<?php echo $product["productImage"]?>" alt="" width="150px">
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
                            <td colspan="100">Phí vận chuyển: 30,000 VNĐ </td>
                        </tr>
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