<?php 
    include 'breadcrumbs.php';
?>
<!--breadcrumbs area end-->
<!--faq area start-->
<div class="faq_content_area">
    <div class="row">
        <div class="col-12">
            <div class="faq_content_wrapper">
                <h4>Danh sách những hệ thống cửa hàng POS CORON</h4>
                <p>Nếu có những sự cố về sản phẩm khách hàng có thể đến trực tiếp những địa chỉ sau đây để được hỗ trợ
                    nhanh nhất</p>

            </div>
        </div>
    </div>
</div>


<!--Accordion area-->
<div class="accordion_area">
    <div class="row">
        <div class="col-12">
            <div id="accordion" class="card__accordion">
                <?php
                $query = "SELECT * FROM tbl_store ORDER BY storeId DESC";
                $result = mysqli_query($connect, $query);
                $i = 0;
                if(mysqli_num_rows($result) > 0)
                {   
                    while($store = mysqli_fetch_array($result)){
                        $i++;
            ?>
                <div class="card card_dipult">
                    <div class="card-header card_accor" id="<?php echo $i ?>">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>"
                            aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                            <?php echo $store['storeName']?>
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus"></i>

                        </button>
                    </div>
                    <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="<?php echo $i ?>"
                        data-parent="#accordion">
                        <div class="card-body">
                            <p> <?php echo $store['storeAddress']?>
                            </p>

                        </div>
                    </div>

                </div>
                <?php 
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
</div>
<!--Accordion area end-->
<!--faq area end-->
</div>
<!--pos page inner end-->
</div>
</div>