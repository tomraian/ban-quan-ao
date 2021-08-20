<!--breadcrumbs area end-->
<!--about section area -->
<div class="about_section">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
            <div class="about_thumb">
                <img src="assets\img\ship\about1.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="about_content">
                <h1>WE CREATE <br>WORDPRESS THEMES</h1>
                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                    dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit
                    praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum
                    soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim
                    assum. Typi non habent claritatem insitam, est usus legentis in iis qui facit eorum claritatem. </p>
                <div class="view__work">
                    <a href="#">view work </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--about section end-->


<!--counterup area -->
<div class="counterup_section">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single_counterup">
                <div class="counter_img">
                    <img src="assets\img\cart\count.png" alt="">
                </div>
                <div class="counter_info">
                    <h2 class="counter_number"><?php echo rand(10,50)?></h2>
                    <p>Đang truy cập</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single_counterup count-two">
                <div class="counter_img">
                    <img src="assets\img\cart\count2.png" alt="">
                </div>
                <div class="counter_info">
                    <h2 class="counter_number">
                        <?php echo mysqli_num_rows(mysqli_query($connect,"SELECT * FROM tbl_product")); ?>
                    </h2>
                    <p>Sản phẩm đã nhập</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single_counterup">
                <div class="counter_img">
                    <img src="assets\img\cart\count3.png" alt="">
                </div>
                <div class="counter_info">
                    <h2 class="counter_number"> 5 </h2>
                    <p>Năm hoạt động</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single_counterup count-two">
                <div class="counter_img">
                    <img src="assets\img\cart\cart5.png" alt="">
                </div>
                <div class="counter_info">
                    <h2 class="counter_number">
                        <?php echo mysqli_num_rows(mysqli_query($connect,"SELECT DISTINCT
                            tbl_order.orderCode,
                            orderTime,
                            orderStatus,
                            tbl_customer.*
                            FROM
                            tbl_order
                            INNER JOIN tbl_customer ON tbl_customer.customerId = tbl_order.customerId ")) ?>
                    </h2>
                    <p>Đơn hàng đã hoàn thành</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--counterup end-->

<!--about progress bar -->
<div class="about_progressbar">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
            <div class="progressbar_inner">
                <h2>Các điểm ấn tượng tại POS CORON</h2>
                <div class="progress_skill">
                    <div class="progress">
                        <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                            data-wow-delay=".7s" role="progressbar" style="width: 99%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">

                            <span class="progress_persent">Chất lượng sản phẩm </span>
                        </div>

                    </div>
                    <span class="progress_discount">99%</span>
                </div>
                <div class="progress_skill">
                    <div class="progress">
                        <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                            data-wow-delay=".3s" role="progressbar" style="width: 90%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">
                            <span class="progress_persent">Đơn hàng đã hoàn thành</span>
                        </div>
                    </div>
                    <span class="progress_discount">90%</span>
                </div>
                <div class="progress_skill">
                    <div class="progress">
                        <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                            data-wow-delay=".5s" role="progressbar" style="width: 85%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">

                            <span class="progress_persent">khách hàng hài lòng </span>
                        </div>

                    </div>
                    <span class="progress_discount">85%</span>
                </div>

                <div class="progress_skill">
                    <div class="progress">
                        <div class="progress-bar about_prog wow fadeInLeft" data-wow-duration="0.8s"
                            data-wow-delay=".7s" role="progressbar" style="width: 80%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100">

                            <span class="progress_persent">Khách hàng mua nhiều hơn 2 lần </span>
                        </div>

                    </div>
                    <span class="progress_discount">80%</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="about__img">
                <img src="assets\img\ship\about3.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<!--about progress bar end -->