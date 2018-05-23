<header id="header">
    <div class="header-top clearfix">
        <div class="container">
            <div class="row">
                <div id="header_logo" class="col-sm-2">
                    <a class="logo" href="{{asset('')}}" title="thoi trang nam"> <img src="{{asset('static/frontend')}}/logo.png" alt="New Shop" width="180" /> </a>
                </div>
                @include('frontend.components.menu')
            </div>
        </div>
    </div>
    <div class="header-bottom clearfix">
        <div class="container">
            <div id="search_block_top" class="col-md-offset-3 clearfix">
                <form id="searchbox" action="#" method="post">
                    <input class="search_query form-control" type="text" id="search_query_top" name="text" placeholder="Tìm kiếm" value="" />
                    <button type="submit" name="submit" class="button-search"> <i class="fa fa-search"></i> </button>
                </form>
            </div>
            <div class="header_user_info">
                <ul class="links">
                    <li class="last"> <a href="thanh-toan/error-1.html" title="Thanh toan" rel="nofollow"><i class="fa fa-share"></i> Thanh toán</a></li>
                </ul>
            </div>

            <div class="shopping_cart clearfix">
                <a href="thanh-toan/error-1.html" title="Giỏ hàng của bạn" rel="nofollow"> <b>Giỏ hàng</b> (<span class="cartTopRightQuantity">0</span>) <span class="ajax_cart_product_txt">SP</span> </a>
                <div class="cart_block block exclusive" style="display:none;">
                    <div class="block_content">
                        <div class="cart_block_list">
                            <p class="cart_block_no_products">Bạn chưa chọn sản phẩm nào</p>
                            <dl class="products cartTopRightContent"> </dl>
                            <div class="cart-prices cartTopRightTotal"> </div>
                            <p class="cart-buttons cartTopRightButtons" style="display:none;">
                                <a id="button_order_cart" class="btn btn-default button button-small" href="thanh-toan/error-1.html" title="Gửi đơn hàng" rel="nofollow"> <span> Gửi đơn hàng<i class="fa fa-chevron-right right"></i> </span> </a>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="header_user_info">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tài Khoản
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">

                            @if (Auth::guest())
                                <li><a style="background-color: #fff ; color: #ff4033" href="{{ route('login') }}">Login</a></li>
                                <li><a style="background-color: #fff ; color: #ff4033" href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
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
                                    </ul>
                                </li>

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
                            @endif
                    </ul>
                </div>
            </div>

            <div class="header_user_info product_session_header">
                <a class="btn btn-default button" id="btn_product_session_header" href="san-pham-da-xem.html" title="san pham da xem" rel="nofollow"> <i class="fa fa-th-large"></i> Sản phẩm đã xem</a>
            </div>
        </div>
    </div>
</header>