<?php 
    if(isset($_POST['send'])){
        $contactName = $_POST['contactName'];
        $contactEmail = $_POST['contactEmail'];
        $contactHeading = $_POST['contactHeading'];
        $contactPhone = $_POST['contactPhone'];
        $contactMessage = $_POST['contactMessage'];
        if($contactName == ""){
            echo '<p class="error-message">Tên không được để trống</p>';
        }
        else if($contactEmail == ""){
            echo '<p class="error-message">Email không được để trống</p>';
        }
        else if($contactHeading == ""){
            echo '<p class="error-message">Tên vấn đề không được để trống</p>';
        }
        else if($contactPhone == ""){
            echo '<p class="error-message">Số điện thoại không được để trống</p>';
        }
        else if(is_numeric($contactPhone) == false){
            echo '<p class="error-message">Số điện thoại sai định dạng</p>';
        }
        else if($contactMessage == ""){
            echo '<p class="error-message">Nội dung không được để trống</p>';
        }
        else {
            $query = "INSERT INTO tbl_contact (contactName,contactEmail,contactHeading,contactPhone,contactMessage) VALUES('$contactName','$contactEmail','$contactHeading','$contactPhone','$contactMessage')";
            $result = mysqli_query($connect,$query);
            if($result){
                echo '<p class="success-message">Thêm thành công</p>';
            }
        }
        
    }
?>
<!--breadcrumbs area start-->
<?php 
    include 'breadcrumbs.php';
?>
<!--breadcrumbs area end-->

<!--contact area start-->
<div class="contact_area">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="contact_message">
                <h3>Kể cho chúng tôi về trải nghiệm của bạn</h3>
                <form id="contact-form" method="POST" action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <input name="contactName" placeholder="Tên *" type="text">
                        </div>
                        <div class="col-lg-6">
                            <input name="contactEmail" placeholder="Email *" type="email">
                        </div>
                        <div class="col-lg-6">
                            <input name="contactHeading" placeholder="Vấn đề *" type="text">
                        </div>
                        <div class="col-lg-6">
                            <input name="contactPhone" placeholder="Số điện thoại *" type="text">
                        </div>

                        <div class="col-12">
                            <div class="contact_textarea">
                                <textarea placeholder="Nội dung *" name="contactMessage"
                                    class="form-control2"></textarea>
                            </div>
                            <button type="submit" name="send">Gửi tin nhắn</button>
                        </div>
                        <div class="col-12">
                            <p class="form-messege">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="contact_message contact_info">
                <h3>Thông tin chi tiết</h3>
                <p>Poscoron luôn cần những người bạn đồng hành và hỗ trợ, nếu bạn quan tâm hãy liên hệ ngay.</p>
                <ul>
                    <li><i class="fa fa-fax"></i> Đường Lê Lợi, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh
                    </li>
                    <li><i class="fa fa-phone"></i> <a href="#">0394448743</a></li>
                    <li><i class="fa fa-envelope-o"></i>poscoron@gmail.com</li>
                    <li><i class="fa fa-envelope-o"></i>duyhoangdinh281@gmail.com</li>
                </ul>
                <h3><strong>Thời gian mở cửa</strong></h3>
                <p><strong>Thứ 2 – Chủ Nhật</strong>: 08AM – 22PM</p>
            </div>
        </div>
    </div>
</div>

<!--contact area end-->

<!--contact map start-->
<div class="contact_map">
    <div class="row">
        <div class="col-12">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15678.044521750813!2d106.6982784!3d10.7721095!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8d6b2d79522c7f30!2zQ2jhu6MgQuG6v24gVGjDoG5o!5e0!3m2!1svi!2s!4v1629384352516!5m2!1svi!2s"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
<!--contact map end-->


</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->