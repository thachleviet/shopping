<header id="header" class="header header-full-width has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="top-bar" class="header-top hide-for-sticky nav-dark">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav nav-left medium-nav-center nav-small  nav-">
                        <li class="html custom html_topbar_left"><strong class="uppercase">{{$config['header']}}</strong>
                        </li>
                    </ul>
                </div>
                <!-- flex-col left -->
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav nav-center nav-small  nav-">
                    </ul>
                </div>
                <!-- center -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="nav top-bar-nav nav-right nav-small  nav-">
                        <li class="html header-social-icons ml-0">
                            <div class="social-icons follow-icons ">
                                <a href="{{$config['link_fanpage']}}" target="_blank"
                                   data-label="Facebook" rel="nofollow" class="icon plain facebook tooltip"
                                   title="Follow on Facebook"><i class="icon-facebook"></i> </a>

                            </div>
                        </li>
                    </ul>
                </div>
                <!-- .flex-col right -->
                <div class="flex-col show-for-medium flex-grow">
                    <ul class="nav nav-center nav-small mobile-nav  nav-">
                        <li class="html custom html_topbar_left"><strong class="uppercase">{{$config['header']}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- .flex-row -->
        </div>
        <!-- #header-top -->
        <div id="masthead" class="header-main show-logo-center">
            <div class="header-inner flex-row container logo-center medium-logo-center" role="navigation">
                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="{{route('home')}}"
                       title="{{$logo['slider_title']}}"
                       rel="home">
                        <img width="551" height="156"
                             src="{{asset($logo['slider_image'])}}"
                             class="header_logo header-logo"
                             alt="{{$logo['slider_title']}}"/>
                        <img width="551" height="156"   src="{{asset($logo['slider_image'])}}"
                             class="header-logo-dark"
                             alt="{{$logo['slider_title']}}"/>
                    </a>
                </div>
                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color=""
                               class="is-small" aria-controls="main-menu" aria-expanded="false">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left
               ">
                    <ul class="header-nav header-nav-main nav nav-left  nav-line-bottom nav-uppercase">
                        <li class="header-search-form search-form html relative has-icon">
                            <div class="header-search-form-wrapper">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                    <form method="get" class="searchform" action="{{route('the-loai.search')}}"
                                          role="search">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <input type="search" class="" name="search"  placeholder="Tìm kiếm . . . "/>

                                            </div>
                                            <!-- .flex-col -->
                                            <div class="flex-col">
                                                <button type="submit"
                                                        class="ux-search-submit submit-button secondary button icon mb-0">
                                                    <i class="icon-search"></i></button>
                                            </div>
                                            <!-- .flex-col -->
                                        </div>
                                        <!-- .flex-row -->
                                        <div class="live-search-results text-left z-top"></div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-line-bottom nav-uppercase">

                        <li class="cart-item has-icon
                     has-dropdown">
                            <div class="header-button">
                                <a href="{{route('cart')}}" title="Giỏ hàng"
                                   class="header-cart-link icon button circle is-outline is-small"><span class="header-cart-title">Giỏ hàng   /      <span class="cart-price"><span class="woocommerce-Price-amount amount">{{$countCart}}&nbsp;<span
                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span></span></span>
                                    <i class="icon-shopping-cart"
                                       data-icon-label="{{$countCart}}">
                                    </i>
                                </a>
                            </div>
                            <ul class="nav-dropdown nav-dropdown-default dropdown-uppercase">
                                <li class="html widget_shopping_cart">
                                    <div class="widget_shopping_cart_content">
                                        <?php
                                        $param = array();
                                        if(\Illuminate\Support\Facades\Route::currentRouteName() == 'san-pham.detail'){
//                                                $id  =  URL::current();
                                                $param = array('product_id'=>collect(request()->segments())->last(),'route'=>'san-pham.detail');
                                        }else{
                                            $param = array('route'=>\Illuminate\Support\Facades\Route::currentRouteName());
                                        }
                                        ?>

                                        @if($listCart->count())
                                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                @foreach($listCart as $key=>$value)

                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        {{--<a href="{{route('cart.destroy',array('id'=>$value->rowId,'route'=>$param['route'],'product_id'=>!empty($param['product_id']) ? $param['product_id']:0 ))}}" class="remove" aria-label="Xóa sản phẩm này" data-product_id="1896" data-product_sku="BL1684-10001">×</a>--}}
                                                        <a href="{{route('san-pham.detail', [$value->id,$value->options->slug])}}">
                                                            <img width="180" height="180" src="{{asset($value->options->product_image)}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" sizes="(max-width: 180px) 100vw, 180px">{{$value->name}}&nbsp;							</a>
                                                        <span class="quantity">{{$value->qty}} × <span class="woocommerce-Price-amount amount">{{$value->price}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>					</li>
                                                @endforeach


                                            </ul>

                                            <p class="woocommerce-mini-cart__total total"><strong>Tổng phụ:</strong> <span class="woocommerce-Price-amount amount">{{$totalCart}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></p>


                                            <p class="woocommerce-mini-cart__buttons buttons"><a href="{{route('cart')}}" class="button wc-forward">Xem giỏ</a><a href="{{route('order')}}" class="button checkout wc-forward">Thanh toán</a></p>
                                            @else
                                            <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ
                                                hàng.
                                            </p>
                                        @endif


                                    </div>
                                </li>
                            </ul>
                            <!-- .nav-dropdown -->
                        </li>
                    </ul>
                </div>

                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="cart-item has-icon">
                            <div class="header-button">
                                <a href="{{route('cart')}}"
                                   class="header-cart-link off-canvas-toggle nav-top-link icon button circle is-outline is-small"
                                   data-open="#cart-popup" data-class="off-canvas-cart" title="Giỏ hàng"
                                   data-pos="right">
                                    <i class="icon-shopping-cart"
                                       data-icon-label="{{$countCart}}">
                                    </i>
                                </a>
                            </div>
                            <!-- Cart Sidebar Popup -->
                            <div id="cart-popup" class="mfp-hide widget_shopping_cart">
                                <div class="cart-popup-inner inner-padding">
                                    <div class="cart-popup-title text-center">
                                        <h4 class="uppercase">Giỏ hàng</h4>
                                        <div class="is-divider"></div>
                                    </div>
                                    <div class="widget_shopping_cart_content">
                                        <?php
                                        $param = array();
                                        if(\Illuminate\Support\Facades\Route::currentRouteName() == 'san-pham.detail'){
//                                                $id  =  URL::current();
                                            $param = array('product_id'=>collect(request()->segments())->last(),'route'=>'san-pham.detail');
                                        }else{
                                            $param = array('route'=>\Illuminate\Support\Facades\Route::currentRouteName());
                                        }
                                        ?>

                                        @if($listCart->count())
                                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                @foreach($listCart as $key=>$value)

                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                        {{--<a href="{{route('cart.destroy',array('id'=>$value->rowId,'route'=>$param['route'],'product_id'=>!empty($param['product_id']) ? $param['product_id']:0 ))}}" class="remove" aria-label="Xóa sản phẩm này" data-product_id="1896" data-product_sku="BL1684-10001">×</a>--}}
                                                        <a href="{{route('san-pham.detail', [$value->id,$value->options->slug])}}">
                                                            <img width="180" height="180" src="{{asset($value->options->product_image)}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" sizes="(max-width: 180px) 100vw, 180px">{{$value->name}}&nbsp;							</a>
                                                        <span class="quantity">{{$value->qty}} × <span class="woocommerce-Price-amount amount">{{$value->price}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></span>					</li>
                                                @endforeach


                                            </ul>

                                            <p class="woocommerce-mini-cart__total total"><strong>Tổng phụ:</strong> <span class="woocommerce-Price-amount amount">{{$totalCart}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></p>


                                            <p class="woocommerce-mini-cart__buttons buttons"><a href="{{route('cart')}}" class="button wc-forward">Xem giỏ</a><a href="{{route('order')}}" class="button checkout wc-forward">Thanh toán</a></p>
                                        @else
                                                <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ
                                                    hàng.
                                                </p>
                                        @endif


                                    </div>
                                    <div class="cart-sidebar-content relative"></div>  </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
            <!-- .header-inner -->
            <!-- Header divider -->
            <div class="container">
                <div class="top-divider full-width"></div>
            </div>
        </div>
        <!-- .header-main -->
        <div id="wide-nav" class="header-bottom wide-nav hide-for-medium">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav header-nav header-bottom-nav nav-left  nav-divided nav-uppercase">
                        <li id="menu-item-46"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home active  menu-item-46">
                            <a href="{{route('home')}}" class="nav-top-link">Trang chủ</a>
                        </li>
                        <li id="menu-item-45"
                            class="menu-item menu-item-type-post_type menu-item-object-post  menu-item-45">

                            <a href='{{($Guide['id']) ? route('tin-tuc.guide', $Guide['id']) : 'javascript:void(0)'}}' class="nav-top-link">Giới thiệu</a></li>
                        <li id="menu-item-33"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children  menu-item-33 has-dropdown">
                            <a href='javascript:void(0)' class="nav-top-link">DANH MỤC SẢN PHẨM<i
                                        class="icon-angle-down"></i></a>
                            <ul class='nav-dropdown nav-dropdown-default dropdown-uppercase'>
                                @foreach($MenuTypeProduct as $key=>$item)
                                    <li id="menu-item-1900"
                                        class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-1900">
                                        <a href="{{route('the-loai.the-loai', [$item['id'],$item['slug']])}}">{{$item['menu_name']}}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </li>

                        <li id="menu-item-3299"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-3299"><a
                                    href="{{route('the-loai.male')}}" class="nav-top-link">Đồng hồ nam</a></li>
                        <li id="menu-item-3298"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-3298"><a
                                    href="{{route('the-loai.female')}}" class="nav-top-link">Đồng hồ nữ</a></li>
                        <li id="menu-item-1526"
                            class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-1526"><a
                                    href="{{route('the-loai.double')}}" class="nav-top-link">ĐỒNG HỒ ĐÔI</a></li>
                        <li id="menu-item-3182"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children  menu-item-3182 has-dropdown">
                            <a href="{{route('tin-tuc')}}" class="nav-top-link">Bài viết
                            </a>

                        </li>
                    </ul>
                </div>
                <!-- flex-col -->
                <div class="flex-col hide-for-medium flex-right flex-grow">
                    <ul class="nav header-nav header-bottom-nav nav-right  nav-divided nav-uppercase">
                        <li class="header-contact-wrapper">
                            <ul id="header-contact" class="nav nav-divided nav-uppercase header-contact">
                                <li class="">
                                    <a class="tooltip" title="{{$config['time_open']}} | Mở cửa các ngày trong tuần. ">
                                        <i class="icon-clock" style="font-size:16px;"></i> <span>{{$config['time_open']}}</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="tel:{{($config['phone']) ? '0'.$config['phone']: ""}}" class="tooltip" title="{{($config['phone']) ? '0'.$config['phone']: ""}}">
                                        <i class="icon-phone" style="font-size:16px;"></i> <span>{{($config['phone']) ? '0'.$config['phone']: ""}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- flex-col -->
            </div>
            <!-- .flex-row -->
        </div>
        <!-- .header-bottom -->
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
        <!-- .header-bg-container -->
    </div>
    <!-- header-wrapper-->
</header>