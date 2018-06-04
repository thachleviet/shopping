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
@include('frontend.components._scripts')
</body>

<!-- Mirrored from donghogoldtime.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 May 2018 08:48:06 GMT -->
</html>
