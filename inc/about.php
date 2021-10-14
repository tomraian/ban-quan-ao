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
<<<<<<< HEAD
                <h1>WE CREATE <br>TRENDING</h1>
                <p>Cái tên Poscoron được tạo ra rất ngẫu hứng, xuất phát từ “Chuỗi ngày u buồn về sự nghiệp, tương lai trong quá khứ của chính mình” – theo lời chia sẻ của Poscoron’s founder. Là một local brand mang khuynh hướng Á Đông, kết hợp giữa hai yếu tố truyền thống và hiện đại, Poscoron luôn cố gắng mang đến những thông điệp văn hoá ý nghĩa qua từng đường nét thiết kế. Tiếp theo đó sự sang trọng, thanh lịch cũng là những yếu tố tạo nên một Poscoron đầy sức hút, sự lựa chọn hoàn hảo dành cho các bạn trẻ yêu thích phong cách hoài cổ nhưng vẫn muốn thoát xác trong những bộ cánh mới mẻ hơn.

        Thành lập từ năm 2016 và được nhiều bạn trẻ biết đến qua những mẫu áo truyền thông, Poscoron hiện đang từng bước khẳng định vị trí của mình trong bản đồ streetwear Việt Nam. 

        Hiện nay, Poscoron vẫn đang tiếp tục hoàn thiện và phát triển về sản phẩm cũng như mở rộng nhiều phong cách thời trang.

        Poscoron xin gửi lời cảm ơn đến tất cả những khách hàng đã, đang và sẽ ủng hộ Poscoron cũng như team thời gian qua và sắp tới. Cảm ơn rất nhiều !</p>
               
=======
                <h1>Chúng tôi <br> tạo nên xu hướng</h1>
                <p>Cái tên Pos Coron được tạo ra rất ngẫu hứng, xuất phát từ “Chuỗi ngày u buồn về sự nghiệp, tương lai
                    trong quá khứ của chính mình” – theo lời chia sẻ của Pos Coron’s founder. Là một local brand mang
                    khuynh hướng Á Đông, kết hợp giữa hai yếu tố truyền thống và hiện đại, Pos Coron luôn cố gắng mang
                    đến
                    những thông điệp văn hoá ý nghĩa qua từng đường nét thiết kế. Tiếp theo đó sự sang trọng, thanh lịch
                    cũng là những yếu tố tạo nên một Pos Coron đầy sức hút, sự lựa chọn hoàn hảo dành cho các bạn trẻ
                    yêu
                    thích phong cách hoài cổ nhưng vẫn muốn thoát xác trong những bộ cánh mới mẻ hơn.
                </p>
                <div class="view__work">
                    <a href="?lien-he">Liên hệ với chúng tôi</a>
                </div>
>>>>>>> fc6abb1a6cac42f89a876bf04e961f6ed80bdbaa
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

<!--about progress bar -->
<div class="about_progressbar">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <p><strong>HƯỚNG DẪN MUA HÀNG VÀ THANH TOÁN TẠI Poscoron</strong></p><p><strong>I –&nbsp;MUA HÀNG OFFLINE – PHƯƠNG THỨC GIAO HÀNG – TRẢ TIỀN MẶT</strong></p><p>– Phương thức Giao hàng – Trả tiền mặt chỉ áp dụng đối với những khu vực <strong>Poscoron&nbsp;</strong>hỗ trợ giao nhận&nbsp;hoặc trả tiền mua hàng trực tiếp tại cửa hàng&nbsp;<strong>Poscoron</strong></p><p>&nbsp;– Với phương thức thanh toán trực tiếp Quý khách có thể đặt hàng trên Website <a href="https://Poscoron.vn">Poscoron.VN</a>&nbsp;.</p><p>Nhân viên chúng tôi sẽ tiến hành gọi xác nhận đơn hàng,&nbsp;xuất hàng cho Quý khách và xác nhận ngày giờ giao hàng với Quý khách sau khi xuất hàng.</p><p>&nbsp;– Quý khách có trách nhiệm thanh toán đầy đủ toàn bộ giá trị đơn hàng cho Nhân viên giao nhận hoặc Nhân viên bán hàng và chăm sóc khách hàng của&nbsp;<strong>Poscoron</strong>&nbsp;ngay khi hoàn tất kiểm tra hàng hóa và nhận Phiếu giao hàng kiêm phiếu xuất kho.Hoặc có thể thanh toán quẹt thẻ&nbsp;<strong>ATM, VISA, ví MOMO</strong>&nbsp;trực tiếp tại cửa hàng&nbsp;<strong>Poscoron</strong>. Quý khách thanh toán đúng số tiền trên Phiếu đã ghi, nếu có bất cứ thắc mắc nào Quý khách gọi lại cho&nbsp;<strong>Poscoron</strong>&nbsp;để được thông tin cụ thể hơn.</p><p> </p><p><strong>II – MUA HÀNG ONLINE – PHƯƠNG THỨC THANH TOÁN TRƯỚC</strong></p><p>&nbsp;<strong>Khách hàng mua hàng online có thể lựa chọn các hình thức như sau:</strong></p><p>&nbsp;– Gọi điện để được tư vấn và đặt hàng online trực tiếp với bộ phận chăm sóc khách hàng của&nbsp;<strong>Poscoron</strong>&nbsp;qua số&nbsp;<strong><a href="tel:0394448743">0394448743</a></strong></p><p>&nbsp;– Khách hàng truy cập website:&nbsp;<strong>Poscoron.VN</strong>&nbsp;để mua hàng và hoàn thành thông tin đơn hàng.</p><p>&nbsp;Chuyển tiền, chuyển khoản, thanh toán trực tiếp bằng tiền mặt hoặc qua thẻ tại các hệ thống ngân hàng hoặc trung tâm giao dịch của&nbsp;<strong>Poscoron</strong></p><p><strong>2.1 Chuyển tiền/chuyển khoản:&nbsp;<em>(thông tin tài khoản xem cuối bài viết)</em></strong></p><p>&nbsp;-Áp dụng cho khách hàng ngoài khu vực nội thành (phạm vi giao hàng từ 10km đến 100km tính từ các trung tâm của <strong>Poscoron&nbsp;</strong>và khách hàng ở tỉnh thành khác có nhu cầu sử dụng phương thức thanh toán này. Các bước tiến hành như sau:</p><p>&nbsp;1. Đến Ngân hàng gần nơi ở của Quý khách nhất để chuyển tiền/chuyển khoản theo thông tin chi tiết&nbsp;<strong>Poscoron</strong>&nbsp;cung cấp: Số tiền, Tên đơn vị, số tài khoản, Ngân hàng mở tài khoản, nội dụng chuyển tiền/chuyển khoản (Mã đơn hàng).</p><p>2. Thông báo cho&nbsp;<strong>Poscoron</strong>&nbsp;(bằng điện thoại, email, SMS, fax, …) khi Quý khách đã thực hiện chuyển tiền/chuyển khoản.</p><p>3. Hoặc Quý khách vui lòng liên hệ với Bộ phận Bán hàng trực tuyến của&nbsp;<strong>Poscoron</strong>&nbsp;theo số&nbsp;<strong><a href="tel:0394448743">0394448743</a></strong>, để thông báo đã chuyển tiền.</p><p>4. Ngay khi nhận được báo cáo xác nhận từ Ngân hàng,&nbsp;<strong>Poscoron</strong>&nbsp;sẽ tiến hành thông báo lại cho Quý khách đồng thời xuất hàng giao hàng cho Quý khách trong thời gian quy định trong mục Chính sách vận chuyển.</p><p>&nbsp;–&nbsp;<strong>Poscoron</strong>&nbsp;sẽ không chịu trách nhiệm về sai sót trong quá trình chuyển khoản hoặc chuyển khoản sai thông tin, Quý khách phải làm việc với Ngân hàng để được xử lý ổn thỏa, chỉ khi nào tiền được chuyển đến tài khoản của&nbsp;<strong>Poscoron</strong>,&nbsp;<strong>Poscoron</strong>&nbsp;sẽ xác nhận với Quý khách. Trong một số tình huống Quý khách có thể nhờ phía Ngân hàng mà Quý khách thực hiện giao dịch hoặc Ngân hàng của&nbsp;<strong>Poscoron</strong>&nbsp;sử dụng để kiểm tra đối chứng cần thiết.</p><p><strong>III – MUA HÀNG ONLINE – PHƯƠNG THỨC (COD) NHẬN HÀNG THANH TOÁN</strong></p><p>Đối với&nbsp; tất cả các đơn hàng được đặt hàng thành công với hình thức&nbsp;<strong>COD</strong><em><strong>&nbsp;(nhận hàng thanh toán tại nhà)</strong></em>, khách hàng sẽ được nhân viên của <strong>Poscoron</strong> liên hệ tư vấn xác nhận đơn hàng và tuỳ vào trường hợp để hướng dẫn khách hàng&nbsp;<strong>ĐẶT CỌC TRƯỚC</strong>&nbsp;từ 100.000đ – 500.000đ với đơn hàng &gt; 02&nbsp;triệu&nbsp;được nhân viên <strong>Poscoron</strong> thông báo cụ thể khi liên hệ. Giá trị đặt cọc sẽ được trừ trực tiếp vào giá trị sản phẩm,&nbsp; khi nhận hàng bạn chỉ cần thanh toán số tiền còn lại.</p><p>Hình thức đặt cọc linh hoạt, bạn có thể chuyển khoản qua các tài khoản của <strong>Poscoron</strong> cuối trang này,&nbsp;cũng có thể chuyển tiền qua các ví điện tử hoặc có thể gửi mã card điện thoại giá trị tương ứng tới Hotline của <strong>Poscoron</strong>.</p><p>Ngay sau khi <strong>Poscoron</strong> xác nhận đã nhận được đặt cọc của quý khách hàng thành công, nhân viên <strong>Poscoron</strong> sẽ lên đơn hàng, test sản phẩm đóng gói cẩn thận và chuyển tới đơn vị vận chuyển như Giao hàng tiết kiệm, Grab,&nbsp;…chuyển tới quý khách hàng.</p><p><b>CHÍNH SÁCH GIAO NHẬN</b></p><p><strong>1. DỊCH VỤ ÁP DỤNG :</strong></p><p>&nbsp;Tất cả các khách hàng mua sản phẩm hàng hoá quần, áo và phụ kiện tại&nbsp;<strong>Poscoron</strong>&nbsp;có nhu cầu giao hàng trực tiếp tại nhà.</p><p><strong>2. PHẠM VI ÁP DỤNG:</strong></p><p>&nbsp;<strong>2.1. Giao hàng trong nội thành :</strong></p><p>&nbsp;– Thu phí 30.000đ/ đơn hàng với các quận nội thành ,&nbsp;</p><p>&nbsp;– Đối với các đơn hàng có nhu cầu giao gấp trong ngày , &nbsp;nhân viên của&nbsp;<strong>Poscoron&nbsp;</strong>sẽ thoả thuận phí vận chuyển với khách hàng.</p><p>&nbsp;<strong>2.2 . Giao hàng ngoại thành và các tỉnh :</strong></p><p>&nbsp;– Phí vận chuyển với các quận, huyện ngoại thành nhân viên của&nbsp;<strong>Poscoron</strong>&nbsp;sẽ thỏa thuận với khách hàng</p><p>&nbsp;– Phí vận chuyển các tỉnh sẽ tính theo cước bưu điện, cước dịch vụ của nhà chuyển phát.</p><p>&nbsp;Lưu ý : Khách hàng vui lòng thanh toán chi phí đổi trả hàng và chi phí vận chuyển phát sinh (nếu có).</p><p><strong>3. THỜI GIAN GIAO HÀNG :</strong></p><p>&nbsp;Các đơn hàng mua thông thường ( không có ưu đãi giá) trong ngày trước 18h30 trong phạm vi 10 km : sẽ được xử lý đơn hàng và giao trong 1 - 3 ngày hoặc theo thời gian yêu cầu cụ thể của quí khách.</p><p>&nbsp;Các đơn hàng mua theo giá thông thường ( không có ưu đãi giá), sau 19h00: sẽ được phục vụ vào ngày hôm sau hoặc tùy theo tình hình của nhà vận chuyển&nbsp;tại thời điểm đặt hàng.</p><p>– Trong một số trường hợp khách quan&nbsp;<strong>Poscoron</strong>&nbsp;có thể giao hàng chậm trễ do những điều kiện bất khả kháng như thời tiết xấu, điều kiện giao thông không thuận lợi, xe hỏng hóc trên đường giao hàng, trục trặc trong quá trình xuất hàng.</p><p>&nbsp;– Trong thời gian chờ đợi nhận hàng, Quí khách có bất cứ thắc mắc gì về thông tin vận chuyển xin vui lòng liên hệ tổng đài toàn chăm sóc khách hàng&nbsp;<strong><a href="tel:0394448743">0394448743</a></strong>&nbsp;của&nbsp;<strong>Poscoron&nbsp;</strong>để nhận trợ giúp.</p><p><strong>4. ĐÓNG GÓI GIAO HÀNG Ở XA</strong></p><p>&nbsp;Đối với đơn hàng giao hàng ở xa thông qua dịch vụ vận chuyển thuê ngoài, để an toàn cho hàng hóa của quí khách,&nbsp;<strong>Poscoron</strong>&nbsp;sẽ đóng gói hàng hóa trong các bao bì hoặc thùng hàng chuyên dụng lớn hơn kích thước hàng.</p><p><strong>5. TRÁCH NHIỆM VỚI HÀNG HÓA VẬN CHUYỂN .</strong></p><p>&nbsp;– Nếu dịch vụ vận chuyển do&nbsp;<strong>Poscoron</strong>&nbsp;hoặc do chúng tôi chỉ định sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của hàng hóa trong suốt quá trình vận chuyển hàng từ&nbsp;<strong>Poscoron</strong>&nbsp;đến quí khách.</p><p>&nbsp;– Quí khách có trách nhiệm kiểm tra hàng hóa khi nhận hàng. Khi phát hiện hàng hóa bị hư hại&nbsp;hoặc sai hàng hóa thì ký xác nhận tình trạng hàng hóa với Nhân viên giao nhận và thông báo ngay cho Bộ phận chăm sóc khách hàng <strong><a href="tel:0394448743">0394448743</a>&nbsp;</strong></p><p>Sau khi quí khách đã ký nhận hàng mà không ghi chú hoặc có ý kiến về hàng hóa&nbsp;<strong>Poscoron&nbsp;</strong>không có trách nhiệm với những yêu cầu đổi trả vì hư hỏng, sai hàng hóa,… từ quí khách sau này.</p><p>&nbsp;– Nếu dịch vụ vận chuyển do quí khách chỉ định và lựa chọn thì quí khách sẽ chịu trách nhiệm với hàng hóa và các rủi ro như mất mát hoặc hư hại của hàng hóa trong suốt quá trình vận chuyển hàng từ&nbsp;<strong>Poscoron&nbsp;</strong>đến quí khách. Khách hàng sẽ chịu trách nhiệm cước phí và tổn thất liên quan.</p><p><strong>CHÍNH SÁCH BẢO HÀNH</strong></p><p><strong>I. BẢO HÀNH</strong></p><p>Bảo hành sản phẩm là: khắc phục những lỗi xảy ra do lỗi&nbsp;của Poscoron hoặc tiến hành đổi mới sản phẩm tuỳ vào từng trường hợp&nbsp;.</p><p><strong>A. Quy định về bảo hành</strong></p><p>– Sản phẩm được bảo hành miễn phí nếu sản phẩm đó&nbsp;chưa qua sử dụng, còn tag nhãn và hóa đơn mua hàng</p><p>– Poscoron hỗ trợ&nbsp;đổi sản phẩm&nbsp;trong vòng<strong>&nbsp;30 ngày</strong>&nbsp;kể từ ngày mua hàng hoặc nhận được hàng.</p><p><strong>B. Những trường hợp không được bảo hành</strong></p><p>– Sản phẩm đã hết thời hạn khi quá hạn&nbsp;<strong>30 ngày</strong>&nbsp;kể từ ngày mua hàng hoặc nhận được hàng.</p><p>– Tự ý&nbsp;sử dụng các hoá chất tẩy rửa không đúng theo phiếu hướng dẫn sử dụng của&nbsp;<strong>Poscoron</strong></p><p>– Sản phẩm không có: Nhãn tag giấy Poscoron, Hoá đơn mua hàng&nbsp;.</p><p>– Trường hợp sản phẩm của Quý khách hàng không có hoá đơn mua hàng&nbsp;của <strong>Poscoron&nbsp;</strong>hay nhầm lẫn thông tin trên Phiếu mua hàng: Trong trường hợp này, bộ phận bảo hành sẽ đối chiếu với số phiếu xuất gốc lưu tại hệ thống của <strong>Poscoron</strong>, hóa đơn, phần mềm của <strong>Poscoron</strong>, nếu có sự sai lệch thì sản phẩm của Quý khách không được bảo hành. Kính mong Quý khách hàng thông cảm!</p><p>– Bảo hành không bao gồm vận chuyển hàng và giao hàng.</p><p><strong>II. ĐỊA ĐIỂM BẢO HÀNH VÀ BẢO TRÌ</strong></p>
            <p>Tất cả các sản phẩm được bảo hành tại showroom của <strong>Poscoron</strong>. 
            Quý khách hàng có thể liên hệ với nhân viên bảo hành của <strong>Poscoron</strong> để được hướng dẫn thêm thông tin (nếu cần). 0394448743</p>
            <p><strong>IV. NHỮNG CHÍNH SÁCH CAM KẾT BẢO HÀNH, ĐỔI&nbsp;HÀNG</strong></p><p><strong>a. Các sản phẩm quần, áo &nbsp;:&nbsp;</strong>bán ra trong vòng 30 ngày , nếu bị lỗi kỹ thuật do sản xuất&nbsp;thì sẽ được đổi sản phẩm mới cùng loại khác kích thước (size)&nbsp;theo điều kiện đổi ở bên dưới</p><p><strong>b. Các sản phẩm phụ kiện:&nbsp;</strong>tùy theo từng mặt hàng(không bao gồm sản phẩm đồ lót, vớ/tất,...), nếu bị lỗi kỹ thuật do sản xuất, thì sẽ được đổi sản phẩm mới cùng loại theo điều kiện đổi dưới đây:</p><p><strong>Điều kiện đổi:</strong></p><p>+ Không vi phạm các điều kiện bảo hành,trong vòng 30 ngày kể từ ngày mua hàng hoặc nhận hàng.</p><p>+ Sản phẩm chưa qua sử dụng.</p><p>+ Đầy đủ bao bì, còn nhãn tag đính kèm trên sản phẩm, Hóa đơn mua hàng.</p><p>+ Trường hợp không đủ các điều kiện trên thì quyền quyết định đổi hàng thuộc về <strong>Poscoron</strong></p><p>Sau thời gian trên hoặc những trường hợp không đủ điều kiện đổi hàng thì tất cả các sản phẩm sẽ được bảo hành theo những quy định, chính sách chung của <strong>Poscoron.</strong>&nbsp;Trường hợp lý do nào đó sản phẩm chậm tiến trình đổi hàng&nbsp;<strong>Poscoron</strong> có trách nhiệm cập nhật thông tin, tình trạng, cho quý khách.</p><p>+ Trả hàng: <strong>Poscoron</strong> không có chính sách trả hàng, nhưng hỗ trợ khách hàng nâng cấp sản phẩm nếu cảm thấy sản phẩm đã mua trước đó không phù hợp với nhu cầu sử dụng.</p><p><strong>V. LIÊN HỆ, THẮC MẮC, KHIẾU NẠI VỀ VẤN ĐỀ ĐỔI HÀNG, BẢO HÀNH</strong></p><p>Nếu Quý khách chưa thấy hài lòng hoặc có thắc mắc khiếu nại gì về vấn đề bảo hành, xin Quý khách vui lòng liên hệ tới&nbsp;<strong>Poscoron</strong>&nbsp;tại địa chỉ&nbsp;<strong>43 Huỳnh Văn Bánh P.17 Q.Phú Nhuận, TP.HCM</strong>, Điện thoại: 0394448743&nbsp;hoặc địa chỉ email: Poscoron.cskh@gmail.com</p><p>Toàn thể nhân viên <strong>Poscoron</strong>&nbsp; xin chân thành cám ơn Quý khách hàng đã mua hàng của <strong>Poscoron</strong>. Chắc chắn Quý khách hàng sẽ hài lòng về chất lượng dịch vụ và thái độ phục vụ tốt nhất từ <strong>Poscoron</strong>.</p><p>—————————————————-</p>
        </div>
    </div>
</div>
<!--about progress bar end -->
