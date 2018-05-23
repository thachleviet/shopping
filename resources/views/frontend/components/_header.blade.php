<div class="header" id="header_thach">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
                <ul>
                    @if (Auth::guest())

                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        <li><a href="{{ route('login.facebook') }}"> <i style="font-size: 16px;" class="fa fa-facebook"></i> </a></li>
                        <li><a href="{{ route('register') }}"> Tạo tài khoản </a></li>
                    @else
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <a href="{{route('info-user')}}">
                                <p>Thông tin tài khoản</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom" >
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{asset('')}}">Như Shop<span>Shop anywhere</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{url('')}}" class="act">Home</a></li>
                                @foreach($categoryMenuLevelOne as $key=>$value)
                                    <?php
                                    $class = new Constants();
                                    $count = $class->checkExitEIdCategory($value['category_id'])
                                    ?>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$value['category_name']}}
                                            @if($count >0 )
                                                <b class="caret"></b>
                                            @endif
                                        </a>
                                        @if($value['category_type'] !=='new')

                                            @if($count >0 )
                                                <ul class="dropdown-menu multi-column columns-3 ">
                                                    <div class="row">
                                                        @endif
                                                        @foreach($categoryMenuLevelTwo as $key1=>$value1)
                                                            @if($value1['category_parent_id'] == $value['category_id'])
                                                                <div class="col-sm-3  multi-gd-img">
                                                                    <ul class="multi-column-dropdown">
                                                                        <h6>{{$value1['category_name']}}</h6>
                                                                        @foreach($categoryMenuLevelThree as $key2=>$value2)
                                                                            @if($value2['category_parent_id'] == $value1['category_id'])
                                                                                <li><a href="{{route('categorys.list-category',$value2['category_id'] )}}">{{$value2['category_name']}}</a></li>
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                        <div class="clearfix"></div>
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @if($count >0 )
                                                    </div>
                                                </ul>
                                            @endif

                                        @endif
                                    </li>

                            @endforeach

                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="logo-nav-right">
                    <ul class="cd-header-buttons">
                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                    <div id="cd-search" class="cd-search">
                        <form action="{{route('products.search')}}" method="get" >
                            <input name="search" type="search" placeholder="Search...">
                        </form>
                    </div>
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href='javascript:void(0)' onclick="Cart.showCart()" >
                            <h3>
                                <div class="total">
                                    <span class="simpleCart_total" id="simpleCart_total">
                                       {{($totalItem > 0) ? $totalItem : ''}}
                                    </span>
                                    (<span id="simpleCart_quantity" class="simpleCart_quantity">{{$countItem }}  </span> Sản phẩm)
                                </div>
                                <img src="{{asset('frontend')}}/images/bag.png" alt="" />
                            </h3>
                        </a>
                        <p><a style="display: none" href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
