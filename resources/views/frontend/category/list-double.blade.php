@extends('frontend.layouts')
@section('content')
    <style>
        ul.pagination {
            display: inline-block;
        }

        ul.pagination  li a{
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        ul.pagination  li span{
            color: white;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }
        ul.pagination  li.active{
            background-color: #4CAF50;
            color: white;
        }

        ul.pagination li:hover:not(.active) {background-color: #ddd;}
    </style>
    <div class="shop-page-title category-page-title page-title ">

        <div class="page-title-inner flex-row  medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <div class="is-large">

                    <nav class="woocommerce-breadcrumb breadcrumbs"><a href="{{route('home')}}">Trang chủ</a> <span class="divider">/</span> Đồng hồ đôi</nav></div>
                <div class="category-filtering category-filter-row show-for-medium">
                    <a href="#" data-open="#shop-sidebar" data-visible-after="true" data-pos="left" class="filter-button uppercase plain">
                        <i class="icon-menu"></i>
                        <strong> Lọc</strong>
                    </a>
                    <div class="inline-block">
                    </div>
                </div>
            </div><!-- .flex-left -->

            <div class="flex-col medium-text-center">
                <p class="woocommerce-result-count hide-for-medium">

                    Hiển thị từ {{$_objectProduct->firstItem()}} đến {{$_objectProduct->lastItem()}} của  {{$_objectProduct->total()}} sản phẩm</p>

            </div>

        </div><!-- flex-row -->
    </div>
    <div class="row category-page-row">
        <div class="col large-3 hide-for-medium ">
            <div id="shop-sidebar" class="sidebar-inner col-inner">


                <aside id="woocommerce_products-2" class="widget woocommerce widget_products">
                    <h3 class="widget-title shop-sidebar">Sản phẩm giảm giá</h3><div class="is-divider small"></div><ul class="product_list_widget">

                        @foreach($_objectDiscount as $key=>$item)


                            <li>
                                <a href="{{route('products.detail', $item['id'])}}">
                                    <img width="180" height="180" src="{{asset($item['product_image'])}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""
                                         sizes="(max-width: 180px) 100vw, 180px">		<span class="product-title">{{$item['product_name']}}</span>
                                </a>
                                <del>
                                            <span class="woocommerce-Price-amount amount">{{number_format($item['product_price'],2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                            </span>
                                </del>
                                <ins>

                                            <span class="woocommerce-Price-amount amount">{{number_format(($item['product_price']*(100 - $item['product_discount'])/100),2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </span>
                                </ins>
                            </li>
                        @endforeach


                    </ul>
                </aside>
            </div><!-- .sidebar-inner -->
        </div><!-- #shop-sidebar -->

        <div class="col large-9">
            <div class="shop-container">



                <div class="products row row-small large-columns-3 medium-columns-3 small-columns-2">

                    @foreach($_objectProduct as $key=>$item)
                        <div class="product-small col has-hover post-3492 product type-product status-publish has-post-thumbnail product_cat-dong-ho-bentley product_cat-dong-ho-nam product_cat-danh-muc-san-pham product_cat-phan-khuc-gia product_cat-duoi-5-trieu product_tag-bl1684-20471 product_tag-dong-ho-bentley product_tag-dong-ho-chinh-hang product_tag-dong-ho-day-da product_tag-dong-ho-deo-tay product_tag-dong-ho-nam  instock sale shipping-taxable purchasable product-type-simple">
                            <div class="col-inner">
                                @if($item['product_discount'] >0)
                                    <div class="badge-container absolute left top z-1">
                                        <div class="callout badge badge-circle">
                                            <div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div>
                                        </div>
                                    </div>
                                @endif
                                <div class="product-small box has-hover box-normal box-text-bottom">
                                    <div class="box-image">
                                        <div class="">
                                            <a href="{{route('products.detail', $item['id'])}}">
                                                <img width="300" height="300"
                                                     src="{{asset($item['product_image'])}}"
                                                     class="show-on-hover absolute fill hide-for-small back-image" alt=""
                                                     sizes="(max-width: 300px) 100vw, 300px"/>
                                                <img width="300" height="300"  src="{{asset($item['product_image'])}}"
                                                     class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                     alt=""

                                                     sizes="(max-width: 300px) 100vw, 300px"/>
                                            </a>
                                        </div>

                                        <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                            <a class="quick-view"  href="{{route('products.detail', $item['id'])}}">Xem nhanh</a>
                                        </div>
                                    </div>
                                    <!-- box-image -->
                                    <div class="box-text text-center">
                                        <div class="title-wrapper">
                                            <p class="name product-title"><a
                                                        href="{{route('products.detail', $item['id'])}}">{{$item['product_name']}}</a></p>
                                        </div>
                                        <div class="price-wrapper">
                                <span class="price">
                                    @if($item['product_discount'] >0)
                                        <del>
                                            <span class="woocommerce-Price-amount amount">{{number_format($item['product_price'],2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                            </span>
                                        </del>
                                        <ins>

                                            <span class="woocommerce-Price-amount amount">{{number_format(($item['product_price']*(100 - $item['product_discount'])/100),2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </span>
                                        </ins>
                                    @else
                                        <ins><span class="woocommerce-Price-amount amount">{{number_format($item['product_price'],2)}}
                                                <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                        </span>
                                    @endif

                                </span>
                                        </div>
                                    </div>
                                    <!-- box-text -->
                                </div>
                                <!-- box -->
                            </div>
                        </div><!-- col -->


                    @endforeach



                </div><!-- row -->
                @if($_objectProduct->count())
                    <div class="container">
                        <nav class="woocommerce-pagination">
                            <ul class="page-numbers nav-pagination links text-center">
                                @include('frontend.sub.pagination')

                            </ul>
                        </nav>
                    </div>
                @endif

            </div><!-- shop container -->
        </div>
    </div>
    <div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/oVjM2wVZ10b.js?version=42#channel=f287bfd655e4d28&amp;origin=http%3A%2F%2Fdonghogoldtime.vn" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/oVjM2wVZ10b.js?version=42#channel=f287bfd655e4d28&amp;origin=http%3A%2F%2Fdonghogoldtime.vn" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <style>#cfacebook{position:fixed;bottom:0px;right:60px;z-index:999999999999999;width:250px;height:auto;box-shadow:6px 6px 6px 10px rgba(0,0,0,0.2);border-top-left-radius:5px;border-top-right-radius:5px;overflow:hidden;}#cfacebook .fchat{float:left;width:100%;height:270px;overflow:hidden;display:none;background-color:#fff;}#cfacebook .fchat .fb-page{margin-top:-130px;float:left;}#cfacebook a.chat_fb{float:left;padding:0 25px;width:250px;color:#fff;text-decoration:none;height:40px;line-height:40px;text-shadow:0 1px 0 rgba(0,0,0,0.1);background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAqCAMAAABFoMFOAAAAWlBMV…8/UxBxQDQuFwlpqgBZBq6+P+unVY1GnDgwqbD2zGz5e1lBdwvGGPE6OgAAAABJRU5ErkJggg==);background-repeat:repeat-x;background-size:auto;background-position:0 0;background-color:#3a5795;border:0;border-bottom:1px solid #133783;z-index:9999999;margin-right:12px;font-size:18px;}#cfacebook a.chat_fb:hover{color:yellow;text-decoration:none;}</style>
    <script>
        jQuery(document).ready(function () {
            jQuery(".chat_fb").click(function() {
                jQuery('.fchat').toggle('slow');
            });
        });
    </script>
    <div id="cfacebook">
        <a href="javascript:;" class="chat_fb" onclick="return:false;"><i class="fa fa-facebook-square"></i> Chat với GOLDTIME</a>
        <div class="fchat">
            <div class="fb-page fb_iframe_widget" data-tabs="messages" data-href="https://www.facebook.com/donghochinhhangtoanquoc/" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=&amp;container_width=0&amp;height=400&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fdonghochinhhangtoanquoc%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;small_header=false&amp;tabs=messages&amp;width=250"><span style="vertical-align: bottom; width: 250px; height: 0px;"><iframe name="f8e6597d910b98" width="250px" height="400px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.10/plugins/page.php?adapt_container_width=true&amp;app_id=&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FoVjM2wVZ10b.js%3Fversion%3D42%23cb%3Df23bf52794b9648%26domain%3Ddonghogoldtime.vn%26origin%3Dhttp%253A%252F%252Fdonghogoldtime.vn%252Ff287bfd655e4d28%26relation%3Dparent.parent&amp;container_width=0&amp;height=400&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fdonghochinhhangtoanquoc%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;small_header=false&amp;tabs=messages&amp;width=250" class="" style="border: none; visibility: visible; width: 250px; height: 0px;"></iframe></span></div>
        </div>
    </div>
@endsection
