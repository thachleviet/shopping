<section id="footer-top">
    <div class="container">
        <div class="row">
            <div id="links_block_left" class="col-sm-8">
                <div class="logo-footer"> </div>
                <ul class="inline">
                    <li><a href="gioi-thieu.html" title="4men gioi thieu">Giới thiệu</a></li>
                    <li><a href="lien-he.html" title="4men lien he">Liên hệ</a></li>
                    <li><a href="tuyen-dung.html" title="4men tuyen dung">Tuyển dụng</a></li>
                    <li><a href="chinh-sach-bao-mat.html" title="chinh sach bao mat">Chính sách bảo mật</a></li>
                </ul>
            </div>
            <div id="footer_contact_phone" class="col-sm-4"> <i class="fa fa-phone"></i><span>0868.044.644</span>
                <br />
                <div style="color:#FFF; font-size:13px;"> <i class="fa fa-envelope-o"></i> Email: <span><a href="#">info@4menshop.com</a></span> </div>
            </div>
        </div>
    </div>
</section>
<section id="footer-primary">
    <div class="container">
        <div class="row">
            <section class="footer-account box-footer col-sm-3 ">
                <h3 class="mod-title"><i class="fa fa-user"></i>Trợ giúp mua hàng</h3>
                <div class="block_content toggle-footer">
                    <ul class="list-link">
                        <li><a href="dat-hang-truc-tuyen.html" title="Huong dan dat hang truc tuyen"> Hướng dẫn đặt hàng</a></li>
                        <li><a href="huong-dan-chon-size.html" title="Huong dan chon size"> Hướng dẫn chọn size</a></li>
                        <li><a href="chinh-sach-giao-hang.html" title="Chinh sach giao hang"> Chính sách giao hàng</a></li>
                        <li><a href="chinh-sach-doi-hang.html" title="Chinh sach doi hang"> Chính sách đổi hàng</a></li>
                        <li><a href="chinh-sach-khach-vip.html" title="Chinh sach khach vip"> Chính sách khách vip</a></li>
                        <li><a href="chinh-sach-bao-mat.html" title="chinh sach bao mat">Chính sách bảo mật</a></li>
                        <li><a href="cau-hoi-thuong-gap.html" title="Cau hoi thuong gap">Câu hỏi thường gặp</a></li>
                    </ul>
                    <ul class="social-block" style="clear:both; margin-top:20px;">
                        {{--<li class="facebook">--}}
                            {{--<a target="_blank" href="http://facebook.com/4menshop" data-toggle="tooltip" title="Facebook"> <i class="fa fa-facebook"></i> </a>--}}
                        {{--</li>--}}
                        {{--<li class="google-plus">--}}
                            {{--<a target="_blank" href="https://plus.google.com/+4MenShopThoiTrangNamGiaRe" data-toggle="tooltip" title="Google Plus"> <i class="fa fa-google"></i> </a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </section>
            <section class="footer-block box-footer col-sm-3 hidden-xs" id="block_various_links_footer">
                <h3 class="mod-title"><i class="fa fa-newspaper-o"></i>Danh mục sản phẩm </h3>
                <ul class="list-link">
                    @if(!empty($categoryMenuLevelTwo))
                        @foreach($categoryMenuLevelTwo as $value)
                            <li> <a href="#" title="ao khoac nam">{{$value['category_name']}}</a> </li>
                        @endforeach
                    @endif
                </ul>
            </section>
            <section id="block_contact_infos" class="contact-infos box-footer col-sm-6 last">
                <h3 class="mod-title"><i class="fa fa-map-marker"></i>HỆ THỐNG CỬA HÀNG Newshop</h3>
                <h3 class="mod-title">CHI NHÁNH TP.HCM</h3>
                <div class="category_footer toggle-footer">
                    <div class="list">
                        <ul class="list-contact">
                            <li> <i class="fa fa-map-marker"></i>623 Quang Trung, P.11, Q.Gò Vấp, Tp.HCM <em>(<a href="tel:+842866827164" title="hotline cn1" rel="nofollow">0286 6827 164</a>)</em> </li>
                            <li> <i class="fa fa-map-marker"></i>384 Huỳnh Tấn Phát, P. Bình Thuận, Q.7, Tp.HCM <em>(<a href="tel:+84968168584" title="hotline cn2" rel="nofollow">0968 168 584</a>)</em> </li>
                            <li> <i class="fa fa-map-marker"></i> 206D Lê Văn Sỹ, P.10, Q. Phú Nhuận, Tp.HCM <em>(<a href="tel:+84981504541" title="hotline cn4" rel="nofollow">0981 504 541</a>)</em> </li>
                        </ul>
                    </div>
                </div>
                <h3 class="mod-title">Chi nhánh Đông Nam Bộ</h3>
                <ul class="list-contact">
                    <li> <i class="fa fa-map-marker"></i> 1333 Phạm Văn Thuận, P. Thống Nhất, Tp. Biên Hòa, Đồng Nai <em>(<a href="tel:+842516557607" title="hotline cn7" rel="nofollow">0251 655 7607</a>)</em> </li>
                    <li> <i class="fa fa-map-marker"></i> 344 Trương Công Định, P.8, TP. Vũng Tàu <em>(<a href="tel:+842546545009" title="hotline cn8" rel="nofollow">0254 6545 009</a>)</em> </li>
                </ul>
            </section>
        </div>
    </div>
</section>
<section id="footer-secondary">
    <div class="container">
        <div class="row" style="margin-top:10px;">
            <div class="col-sm-12 col-md-6"> <span style="border-bottom:1px solid #CCC; margin-bottom:20px; display:inline-block;"> © 2010 Newshopshop.com All rights reserved <a href="index.html" title="thoi trang nam">Thời trang nam</a>. </span>
                <p> Chủ quản: ông Nguyễn Ngọc Năm.
                    <br /> MST cá nhân: 0312028096
                    <br /> Số ĐKKD: 41N8021904 do UBND quận Tân Bình - Tp.HCM cấp ngày 22/10/2012
                    <!--<hr style="border-bottom:1px solid #ccc;" /> <strong style="color:#F00;">Nhãn hiệu "4MEN" đã được đăng kí độc quyền tại Cục sở hữu trí tuệ Việt Nam</strong> </p>-->
            </div>
        </div>
    </div>
</section>