
@extends('frontend.layouts')
@section('after_style')
    <style>
        body.framed, body.framed header, body.framed .header-wrapper, body.boxed, body.boxed header, body.boxed .header-wrapper, body.boxed .is-sticky-section{
            max-width: 1170px;
            margin: auto;
        }
        div img.image_slide_show{
            height: 400px !important;
        }
        .w3-content{
            max-width: 100%!important;
        }
    </style>
    <link rel='stylesheet' id='contact-form-7-css'  href="{{asset('css/w3.css?v='.time())}}" type='text/css' media='all' />
@endsection

@section('content')
    <div id="content" role="main" class="content-area">

        @include('frontend.components._banner')



        <div class="container section-title-container" style="margin-top:20px;"><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Sản phẩm mới</span><b></b></h3></div><!-- .section-title -->


        <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>

                @foreach($_object as $key=>$item)

                <div class="col">
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
                    <!-- .col-inner -->
                </div>
                @endforeach


        </div>
        <div class="container section-title-container" ><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Sản phẩm bán chạy</span><b></b></h3></div><!-- .section-title -->


        <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
            @foreach($_objectProductPay as $key=>$item)

                <div class="col">
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
                                    @if($item['product_discount'] > 0)
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
                    <!-- .col-inner -->
                </div>
            @endforeach

        </div>
        <div class="row"  id="row-140289334">
            <div class="col medium-4 small-12 large-4"  ><div class="col-inner"  >
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_2050305156">
                        <a href='javascript:void(0)' target="_self" class="">
                            <div class="img-inner dark" >
                                <img width="500" height="150" src="{{asset('frontend/wp-content/uploads/2017/08/b1.png')}}" class="attachment-large size-large" alt="Giao hàng"  sizes="(max-width: 500px) 100vw, 500px" />
                            </div>
                        </a>
                        <style scope="scope">

                        </style>
                    </div>

                </div></div>
            <div class="col medium-4 small-12 large-4"  ><div class="col-inner"  >
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1305025343">
                        <a href='javascript:void(0)' target="_self" class="">
                            <div class="img-inner dark" >
                                <img width="500" height="150" src="{{asset('frontend/wp-content/uploads/2017/08/b2.png')}}" class="attachment-large size-large" alt="Cam kết chính hãng"   sizes="(max-width: 500px) 100vw, 500px" />
                            </div>
                        </a>
                        <style scope="scope">

                        </style>
                    </div>

                </div></div>
            <div class="col medium-4 small-12 large-4"  ><div class="col-inner"  >
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_904396708">
                        <a href='javascript:void(0)' target="_self" class="">            <div class="img-inner dark" >
                                <img width="500" height="150" src="{{asset('frontend/wp-content/uploads/2017/08/b3.png')}}" class="attachment-large size-large" alt="Chính sách đổi trả"  sizes="(max-width: 500px) 100vw, 500px" />
                            </div>
                        </a>
                        <style scope="scope">

                        </style>
                    </div>

                </div></div>
        </div>
        <div class="container section-title-container" ><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Đồng hồ Nam</span><b></b><a href="{{route('category.male')}}" target="">Xem thêm<i class="icon-angle-right" ></i></a></h3></div><!-- .section-title -->


        <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
            @foreach($_objectTypeMale as $key=>$item)
                <div class="col">
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
                    <!-- .col-inner -->
                </div><!-- col -->
            @endforeach


        </div>
        <div class="gap-element" style="display:block; height:auto; padding-top:36px" class="clearfix"></div>

        <div class="banner has-hover has-parallax" id="banner-820218701">
            <div class="banner-inner fill">
                <div class="banner-bg fill" data-parallax="-1" data-parallax-container=".banner" data-parallax-background>
                    <div class="bg fill bg-fill "></div>
                    <div class="overlay"></div>
                </div><!-- bg-layers -->
                <div class="banner-layers container">
                    <div class="fill banner-link"></div>
                    <div id="text-box-1063566216" class="text-box banner-layer x5 md-x5 lg-x5 y95 md-y95 lg-y95 res-text">
                        <div class="text dark">
                            <div class="text-inner text-center">
                                <h3 class="uppercase"><strong><span style="color: #ff0000;">Đồng hồ </span> {{$_objectQC['slider_name']}}</strong></h3>
                                <p class="lead">{{$_objectQC['slider_title']}}.</p>
                            </div>
                        </div>

                        <style scope="scope">

                            #text-box-1063566216 {
                                width: 78%;
                            }
                            #text-box-1063566216 .text {
                                font-size: 100%;
                            }


                            @media (min-width:550px) {

                                #text-box-1063566216 {
                                    width: 37%;
                                }

                            }
                        </style>
                    </div>

                </div><!-- .banner-layers -->
            </div><!-- .banner-inner -->

            <style scope="scope">

                #banner-820218701 {
                    padding-top: 366px;
                }
                #banner-820218701 .bg.bg-loaded {
                    background-image: url({{asset($_objectQC['slider_image'])}});
                }
                #banner-820218701 .overlay {
                    background-color: rgba(0, 0, 0, 0.26);
                }
                #banner-820218701 .bg {
                    background-position: 63% 90%;
                }
            </style>
        </div><!-- .banner -->
        <div class="container section-title-container" ><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Đồng hồ nữ</span><b></b><a href="{{route('category.female')}}" target="">Xem thêm<i class="icon-angle-right" ></i></a></h3></div><!-- .section-title -->
        <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
            @foreach($_objectTypeFeMale as $key=>$item)
                <div class="col">
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
                    <!-- .col-inner -->
                </div><!-- col -->
            @endforeach



        </div>
        <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
        </div>


    </div>
@endsection
@section('after_script')

@endsection