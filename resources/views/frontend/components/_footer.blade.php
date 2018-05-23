<div class="footer-w3l">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>Như Shop </h4>
                <p>Mong</p>
                <div class="social-icon">
                    <a href="#"><i class="icon"></i></a>
                    <a href="#"><i class="icon1"></i></a>
                    <a href="#"><i class="icon2"></i></a>
                    <a href="#"><i class="icon3"></i></a>
                </div>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Tài khoản</h4>
                <ul>

                    @if (Auth::guest())

                        <li><a href="{{ route('login') }}">Đăng nhập tài khoản</a></li>
                        <li><a href="{{ route('login.facebook') }}">Đăng nhập <F></F>acebook </a></li>
                        <li><a href="{{ route('register') }}"> Tạo tài khoản </a></li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Lịch  sử đặt hàng
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif




                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Thông tin</h4>
                <ul>

                    <li><a href="index.html">Home</a></li>
                    @foreach($categoryMenuLevelOne as $key=>$value)
                        <li><a href="products.html">{{$value['category_name']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 footer-grid foot">
                <h4>Liê hệ</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><a href="#">72 Trần trọng cung </a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><a href="#">1 599-033-5036</a></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:example@mail.com"> huynhnhu@@mail.com</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<div class="copy-section">
    <div class="container">
        <div class="copy-left">
            <p>&copy; 2018 Như shop . Đã đăng ký bản quyền | Thiết kế bơi <a href='javascritp:void(0)'>Như Shop</a></p>
        </div>
        <div class="copy-right">
            <img src="{{asset('frontend')}}/images/card.png" alt=""/>
        </div>
        <div class="clearfix"></div>
    </div>
</div>