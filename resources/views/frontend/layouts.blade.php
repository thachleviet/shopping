<!DOCTYPE html >
<!--[if IE 9 ]> <html lang="vi" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="ie9 loading-site no-js"> <![endif]-->
<!--[if IE 8 ]> <html lang="vi" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="ie8 loading-site no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="vi" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="loading-site no-js"> <!--<![endif]-->

<!-- Mirrored from donghogoldtime.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 08:40:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    html{
        background: white!important;
    }
    /**/
    div.footer-2{
        border-top: 5px solid #f21c0c !important;
    }
    div.absolute-footer {
        background-color: #f21c0c !important;
        color: white;
    }
    div.header-top {
        background-color: #000000;
    }
    div .header:not(.transparent) .header-bottom-nav.nav > li > a {
        color: #f74d18;
    }
    .nav>li>a, .nav-dropdown>li>a, .nav-column>li>a {
        color: #f74d18 !important;
        transition: all .2s;
    }
    .section-title-center span, .section-title-bold-center span {
        text-align: center;
        background: none;

        color: #fff;

        font-weight: 500;
        margin-bottom: 0;
        padding: .5em 2em .4em;
        text-transform: uppercase;
        border-radius: 3px;
    }
    div a {
        color: #f74d18;
    }
    .section-title-center span, .section-title-bold-center span {
        text-align: center;


        display: inline-block;
        box-shadow: 0 0 0 #F44336 !important;
        margin-bottom: 0;
        padding: .5em 2em .4em;
        text-transform: uppercase;
        background: #fff !important;
        color: #f74d18 !important;
        font-weight: bold !important;
    }

    /**/
</style>
@include('frontend.components._head')

<body class="home page-template page-template-page-blank page-template-page-blank-php page page-id-11 boxed lightbox nav-dropdown-has-arrow">

<a class="skip-link screen-reader-text" href="#main">Skip to content</a>

<div id="wrapper">

@include('frontend.components._header')
<!-- START CONTENT -->
{{--@yield('content')--}}
<!--END CONTENT -->
    <main id="main" class="">

        @yield('content')

    </main><!-- #main -->

    @include('frontend.components._footer')

</div><!-- #wrapper -->

<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="header-search-form search-form html relative has-icon">
                <div class="header-search-form-wrapper">
                    <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                        <form method="get" class="searchform" action="{{route('the-loai.search')}}" role="search">
                            <div class="flex-row relative">
                                <div class="flex-col flex-grow">
                                    <input type="search"  name="search" value="" placeholder="Tìm kiếm . . . " />

                                </div><!-- .flex-col -->
                                <div class="flex-col">
                                    <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                        <i class="icon-search" ></i>				</button>
                                </div><!-- .flex-col -->
                            </div><!-- .flex-row -->
                            <div class="live-search-results text-left z-top"></div>
                        </form>
                    </div>	</div>
            </li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-46"><a href="{{route('home')}}" class="nav-top-link">Trang chủ</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-post menu-item-45"><a href="{{route('tin-tuc.detail',$Guide['id'])}}" class="nav-top-link">Giới thiệu</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-33">
                <a href="javascript:void(0)" class="nav-top-link">DANH MỤC SẢN PHẨM</a>
                <ul class=children>
                    @foreach($MenuTypeProduct as $key=>$item)

                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-1900">
                            <a href="{{route('the-loai.the-loai', [$item['id'],$item['slug']])}}">{{$item['menu_name']}}</a>
                        </li>
                    @endforeach

                </ul>
            </li>


            <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3299">
                <a href="{{route('the-loai.male')}}" class="nav-top-link">Đồng hồ nam</a>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3298">
                <a
                        href="{{route('the-loai.female')}}" class="nav-top-link">Đồng hồ nữ</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-1526">
                <a
                        href="{{route('the-loai.double')}}" class="nav-top-link">ĐỒNG HỒ ĐÔI</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-3182"><a href="{{route('tin-tuc')}}" class="nav-top-link">Bài viết
                </a>
            </li>
            <li class="account-item has-icon menu-item">
                <a href='javascript:void(0)'
                   class="nav-top-link nav-top-not-logged-in">
    <span class="header-account-title">
    Đăng nhập  </span>
                </a><!-- .account-login-link -->

            </li>
            <li class="header-newsletter-item has-icon">

            </li><li class="html header-social-icons ml-0">
                <div class="social-icons follow-icons " >
                    <a href="{{$config['link_fanpage']}}" target="_blank" data-label="Facebook"  rel="nofollow" class="icon plain facebook tooltip" title="Follow on Facebook"><i class="icon-facebook" ></i>    	</a>
                </div>

            </ul>
    </div><!-- inner -->
</div><!-- #mobile-menu -->

<div id="login-form-popup" class="lightbox-content mfp-hide">



    <div class="account-container lightbox-inner">

        <div class="account-login-inner">

            <h3 class="uppercase">Đăng nhập</h3>

            <form method="post" class="login">


                <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                    <label for="username">Tên tài khoản hoặc địa chỉ email <span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="" />
                </p>

                <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
                    <label for="password">Mật khẩu <span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
                </p>



                <p class="form-row">
                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="e44b9c16be" /><input type="hidden" name="_wp_http_referer" value="/" />				<input type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập" />
                    <label for="rememberme" class="inline">
                        <input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> Ghi nhớ mật khẩu				</label>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                    <a href="my-account/lost-password/index.html">Quên mật khẩu?</a>
                </p>


            </form>
        </div><!-- .login-inner -->


    </div><!-- .account-login-container -->


    <div class="my-account-header page-title normal-title
	">


        <div class="page-title-inner flex-row  container">
            <div class="flex-col flex-grow text-center">

                <div class="text-center social-login">



                </div>

            </div><!-- .flex-left -->
        </div><!-- flex-row -->
    </div><!-- .page-title -->
</div>
<style>

    .Phone {
        position: fixed;
        bottom:20px;
        left: 20px;
        z-index: 99999;
        display: block;
        margin: 0;
        width: 60px;
        height: 60px;
        font-size: 60px;
        background-color: #3498db;
        border-radius: 30px;
        box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        -webkit-transform: translate3d(0, 0, 0) scale(1);
        transform: translate3d(0, 0, 0) scale(1);
    }

    .Phone::before,
    .Phone::after {
        position: absolute;
        content: "";
    }

    .Phone::before {
        top: 0;
        left: 0;
        width: 1em;
        height: 1em;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 100%;
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0) scale(0);
        transform: translate3d(0, 0, 0) scale(0);
    }

    .Phone::after {
        top: 0.25em;
        left: 0.25em;
        width: 0.5em;
        height: 0.5em;
        background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTYuNiAxMC44YzEuNCAyLjggMy44IDUuMSA2LjYgNi42bDIuMi0yLjJjLjMtLjMuNy0uNCAxLS4yIDEuMS40IDIuMy42IDMuNi42LjUgMCAxIC40IDEgMVYyMGMwIC41LS41IDEtMSAxLTkuNCAwLTE3LTcuNi0xNy0xNyAwLS42LjQtMSAxLTFoMy41Yy41IDAgMSAuNCAxIDEgMCAxLjIuMiAyLjUuNiAzLjYuMS40IDAgLjctLjIgMWwtMi4zIDIuMnoiIGZpbGw9IiNmZmZmZmYiLz48L3N2Zz4=);
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-size: cover;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .Phone.is-animating {
        -webkit-animation: phone-outer 3000ms infinite;
        animation: phone-outer 3000ms infinite;
    }
    .Phone.is-animating::before {
        -webkit-animation: phone-inner 3000ms infinite;
        animation: phone-inner 3000ms infinite;
    }
    .Phone.is-animating::after {
        -webkit-animation: phone-icon 3000ms infinite;
        animation: phone-icon 3000ms infinite;
    }

    @-webkit-keyframes phone-outer {
        0% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        33.3333% {
            -webkit-transform: translate3d(0, 0, 0) scale(1.1);
            transform: translate3d(0, 0, 0) scale(1.1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0.1), 0em 0.05em 0.1em rgba(0, 0, 0, 0.5);
        }
        66.6666% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0.5em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
    }

    @keyframes phone-outer {
        0% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        33.3333% {
            -webkit-transform: translate3d(0, 0, 0) scale(1.1);
            transform: translate3d(0, 0, 0) scale(1.1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0.1), 0em 0.05em 0.1em rgba(0, 0, 0, 0.5);
        }
        66.6666% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0.5em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
    }
    @-webkit-keyframes phone-inner {
        0% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        33.3333% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0.9);
            transform: translate3d(0, 0, 0) scale(0.9);
        }
        66.6666% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        100% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
    }
    @keyframes phone-inner {
        0% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        33.3333% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0.9);
            transform: translate3d(0, 0, 0) scale(0.9);
        }
        66.6666% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        100% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
    }
    @-webkit-keyframes phone-icon {
        0% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
        2% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        4% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        6% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        8% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        10% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        12% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        14% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        16% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        18% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        20% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        22% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        24% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        26% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        28% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        30% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        32% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        34% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        36% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        38% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        40% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        42% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        44% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        46% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
    }
    @keyframes phone-icon {
        0% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
        2% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        4% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        6% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        8% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        10% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        12% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        14% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        16% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        18% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        20% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        22% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        24% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        26% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        28% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        30% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        32% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        34% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        36% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        38% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        40% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        42% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        44% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        46% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
    }

</style>
<a href="tel:0961858093"><i class="Phone is-animating"></i></a>

@include('frontend.components._scripts')
</body>

<!-- Mirrored from donghogoldtime.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 08:48:06 GMT -->
</html>
