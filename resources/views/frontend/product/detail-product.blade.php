@extends('frontend.layouts')
@section('title', $title)
@section('after_meta')
    <meta itemprop="image" content="{{$_image}}">
    @if(!empty($keyword))
        <meta name="keywords" content="{{$keyword}}"/>
    @endif
@stop

@section('content')
    <style>
        .nav-dropdown > li.html {
            min-width: 300px !important;
        }
    </style>
    <div class="shop-container">
        <div id="product-279"
             class="post-279 product type-product status-publish has-post-thumbnail product_cat-dong-ho-nam product_cat-danh-muc-san-pham product_cat-dong-ho-olym-pianus product_cat-phan-khuc-gia product_cat-tu-5-trieu-den-10-trieu product_tag-olym-pianus-op990-083amk-t product_tag-op990-083amk-t first instock sale shipping-taxable purchasable product-type-simple">
            <div class="product-container">
                <div class="product-main">
                    <div class="row content-row mb-0">
                        <div class="product-gallery large-6 col">
                            <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                 data-columns="4" style="opacity: 1;">
                                @if($_object['product_discount'] >0)
                                <div class="badge-container is-larger absolute left top z-1">
                                    <div class="callout badge badge-circle">
                                        <div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="flickity-viewport" style="height: 510px;">
                                    <div class="flickity-slider" style="left: 0px; transform: translateX(-100%);">
                                        <div class="woocommerce-product-gallery__image slide is-selected"
                                             style="position: absolute; left: 100%;">
                                            <a href='javascript:void(0)'>
                                                <img width="500" height="500" id="image_change"
                                                     src="{{asset($_object['product_image'])}}"
                                                     class="attachment-shop_single size-shop_single"
                                                     alt="{{$_object['product_name']}}" title=""
                                                     sizes="(max-width: 500px) 100vw, 500px">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-thumbnails thumbnails slider row row-small row-slider slider-nav-small small-columns-4 flickity-enabled is-draggable"
                                 data-flickity-options="{
                     &quot;cellAlign&quot;: &quot;left&quot;,
                     &quot;wrapAround&quot;: false,
                     &quot;autoPlay&quot;: false,
                     &quot;prevNextButtons&quot;:true,
                     &quot;asNavFor&quot;: &quot;.product-gallery-slider&quot;,
                     &quot;percentPosition&quot;: true,
                     &quot;imagesLoaded&quot;: true,
                     &quot;pageDots&quot;: false,
                     &quot;rightToLeft&quot;: false,
                     &quot;contain&quot;: true
                     }" tabindex="0">
                                <div class="flickity-viewport" style="height: 107.906px;">
                                    <div class="flickity-slider">
                                        <?php
                                        $i = 25
                                        ?>
                                        @foreach($_imageProduct as $key=>$item)
                                            @if($key ==0 )
                                                <div class="col" style="position: absolute; left: {{$key}}%;">
                                                    <a>
                                                        <img id="image_{{$key}}"
                                                             onclick="changeSrcImage(this, '{{$key}}')" width="180"
                                                             height="180" src="{{asset($item['image_product'])}}"
                                                             class="attachment-shop_thumbnail size-shop_thumbnail"
                                                             sizes="(max-width: 180px) 100vw, 180px">
                                                    </a>
                                                </div>
                                            @else
                                                <div class="col"
                                                     style="position: absolute; left: <?php  echo($i * $key);?>%;">
                                                    <a href='javascript:void(0)'>
                                                        <img id="image_{{$key}}"
                                                             onclick="changeSrcImage(this, '{{$key}}')" width="180"
                                                             height="180" src="{{asset($item['image_product'])}}"
                                                             class="attachment-shop_thumbnail size-shop_thumbnail"
                                                             sizes="(max-width: 180px) 100vw, 180px">
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                        <script type="text/javascript">
                                            function changeSrcImage(obj, $id) {
                                                document.getElementById('image_change').src = document.getElementById('image_' + $id + '').src;
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <!-- .product-thumbnails -->
                        </div>
                        <div class="product-info summary col-fit col entry-summary product-summary">
                            <nav class="woocommerce-breadcrumb breadcrumbs">
                                <a href="#">Trang chủ</a>
                                <span class="divider">/</span>
                                <a href="#">
                                    {{$_object['menu_name']}}</a> <span class="divider">/</span>
                                <a href="{{route('products.detail', $_object['product_id'])}}">{{$_object['product_name']}}</a>
                            </nav>
                            <h1 class="product-title entry-title">
                                {{strtoupper($_object['product_name'])}}
                            </h1>
                            <div class="is-divider small"></div>
                            <ul class="next-prev-thumbs is-small show-for-medium">
                                @foreach($_imageProduct as $key=>$item)
                                    <li class="prod-dropdown has-dropdown">
                                        <a href='javascript:void(0)' rel="next" class="button icon is-outline circle">
                                            <i class="icon-angle-left"></i>
                                        </a>
                                        <div class="nav-dropdown">
                                            <a title="{{$item['product_name']}}" href='javascript:void(0)'>
                                                <img width="180" height="180" src="{{asset($item['product_image'])}}"
                                                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                     alt="" sizes="(max-width: 180px) 100vw, 180px"></a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="price-wrapper">
                                <p class="price product-page-price price-on-sale">
                                    @if($_object['product_discount'] >0)
                                    <del><span class="woocommerce-Price-amount amount">{{number_format($_object['product_price'], 2)}}
                                            &nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></del>
                                    @endif
                                    <ins><span class="woocommerce-Price-amount amount">{{number_format(($_object['product_price']*(100 - $_object['product_discount'])/100),2)}}
                                            <span class="woocommerce-Price-currencySymbol">₫</span></span></ins>
                                </p>
                            </div>
                            <div class="product-short-description">
                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    @foreach($_attributeProduct as $key=>$item)
                                        <tr>
                                            <td><span style="color: #000000;">{{$item['key']}}:<i
                                                            class="fa fa-angle-right"></i></span></td>
                                            <td><span style="color: #000000;">{{$item['value']}}</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <form id="cart" action="{{route('cart.add')}}" class="cart" method="post"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus button is-form">
                                    <input type="number" class="input-text qty text" step="1" min="1" max="9999"
                                           name="quantity" value="1"
                                           title="SL"
                                           size="4"
                                           pattern="[0-9]*"
                                           inputmode="numeric">
                                    <input type="button" value="+" class="plus button is-form">
                                    <input type="hidden" name="product_name" value="{{$_object['product_name']}}">
                                    <input type="hidden" name="product_image" value="{{$_object['product_image']}}">
                                    <input type="hidden" name="product_id" value="{{$_object['product_id']}}">
                                    <input type="hidden" name="product_price" value="{{$_object['product_price']}}">
                                    <input type="hidden" name="product_discount" value="{{$_object['product_discount']}}">
                                </div>
                                <button type="submit" name="add-to-cart" value="279"
                                        class="single_add_to_cart_button button alt">Thêm vào giỏ
                                </button>

                            </form>
                        </div>

                    </div>
                    <!-- .row -->
                </div>
                <!-- .product-main -->
                <div class="product-footer">
                    <div class="container">
                        @if(!empty($_object['product_content']))
                        <div class="woocommerce-tabs tabbed-content">
                            <ul class="product-tabs nav small-nav-collapse tabs nav nav-uppercase nav-line nav-left">
                                <li class="reviews_tab active">
                                    <a href="#tab-reviews">Nội dung</a>
                                </li>
                            </ul>
                            <div class="tab-panels">
                                <div class="panel entry-content active" id="tab-reviews">
                                    {!! $_object['product_content'] !!}
                                </div>
                            </div>
                            <!-- .tab-panels -->
                        </div>
                        @endif
                        <!-- .tabbed-content -->
                        @if($_related->count()>0)
                        <div class="related related-products-wrapper product-section">
                            <h3 class="product-section-title product-section-title-related pt-half pb-half uppercase">
                                Sản phẩm liên quan
                            </h3>
                            <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push flickity-enabled is-draggable"
                                 data-flickity-options="{&quot;imagesLoaded&quot;: true, &quot;groupCells&quot;: &quot;100%&quot;, &quot;dragThreshold&quot; : 5, &quot;cellAlign&quot;: &quot;left&quot;,&quot;wrapAround&quot;: true,&quot;prevNextButtons&quot;: true,&quot;percentPosition&quot;: true,&quot;pageDots&quot;: false, &quot;rightToLeft&quot;: false, &quot;autoPlay&quot; : false}"
                                 tabindex="0">
                                <div class="flickity-viewport" style="height: 336.359px;">
                                    <div class="flickity-slider" style="left: 0px; transform: translateX(-200%);">
                                        <?php
                                        $i = 25
                                        ?>
                                        @foreach($_related as $key=>$value)
                                            @if($key == 0)
                                                <div class="product-small col has-hover post-164 product type-product status-publish has-post-thumbnail product_cat-dong-ho-nam product_cat-danh-muc-san-pham product_cat-dong-ho-olym-pianus product_cat-phan-khuc-gia product_cat-duoi-5-trieu product_tag-dong-ho-op product_tag-olym-pianus product_tag-olympianus-chinh-hang product_tag-op8974amk first instock sale shipping-taxable purchasable product-type-simple "
                                                     style="position: absolute; left: 200%;">
                                                    <div class="col-inner">
                                                        <div class="product-small box ">
                                                            <div class="box-image">
                                                                <div class="image-fade_in_back">
                                                                    <a href="{{route('products.detail', $value['id'])}}">
                                                                        <img width="300" height="300"
                                                                             src="{{asset($value['product_image'])}}"
                                                                             class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                                             alt="Olym Pianus OP8974AMK-T"
                                                                             sizes="(max-width: 300px) 100vw, 300px"> </a>
                                                                </div>
                                                                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                                </div>
                                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                    <a class="quick-view quick-view-added" data-prod="164"
                                                                       href="{{route('products.detail', $value['id'])}}">Xem
                                                                        nhanh   </a>
                                                                </div>
                                                            </div>
                                                            <!-- box-image -->
                                                            <div class="box-text box-text-products">
                                                                <div class="title-wrapper">
                                                                    <p class="name product-title"><a href="{{route('products.detail', $value['id'])}}" style="text-align: center">{{strtoupper($value['product_name'])}}</a></p>
                                                                </div>


                                                            </div>
                                                            <!-- box-text -->
                                                        </div>
                                                        <!-- box -->
                                                    </div>
                                                    <!-- .col-inner -->
                                                </div>
                                                @else
                                                <div class="product-small col has-hover post-164 product type-product status-publish has-post-thumbnail product_cat-dong-ho-nam product_cat-danh-muc-san-pham product_cat-dong-ho-olym-pianus product_cat-phan-khuc-gia product_cat-duoi-5-trieu product_tag-dong-ho-op product_tag-olym-pianus product_tag-olympianus-chinh-hang product_tag-op8974amk first instock sale shipping-taxable purchasable product-type-simple "
                                                     style="position: absolute; left: {{($i*$key)+200}}%;">
                                                    <div class="col-inner">
                                                        <div class="product-small box ">
                                                            <div class="box-image">
                                                                <div class="image-fade_in_back">
                                                                    <a href="{{route('products.detail', $value['id'])}}">
                                                                        <img width="300" height="300"
                                                                             src="{{asset($value['product_image'])}}"
                                                                             class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                                             alt="Olym Pianus OP8974AMK-T"
                                                                             sizes="(max-width: 300px) 100vw, 300px"> </a>
                                                                </div>
                                                                <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                                </div>
                                                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                    <a class="quick-view quick-view-added" data-prod="164"
                                                                       href="{{route('products.detail', $value['id'])}}">Xem
                                                                        nhanh   </a>
                                                                </div>
                                                            </div>
                                                            <!-- box-image -->
                                                            <div class="box-text box-text-products">
                                                                <div class="title-wrapper">
                                                                    <p class="name product-title"><a href="{{route('products.detail', $value['id'])}}" style="text-align: center">{{strtoupper($value['product_name'])}}</a></p>
                                                                </div>


                                                            </div>
                                                            <!-- box-text -->
                                                        </div>
                                                        <!-- box -->
                                                    </div>
                                                    <!-- .col-inner -->
                                                </div>
                                            @endif

                                        @endforeach
                                    </div>
                                </div>
                                <button class="flickity-prev-next-button previous" type="button" aria-label="previous">
                                    <svg viewBox="0 0 100 100">
                                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"
                                              class="arrow"></path>
                                    </svg>
                                </button>
                                <button class="flickity-prev-next-button next" type="button" aria-label="next">
                                    <svg viewBox="0 0 100 100">
                                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"
                                              transform="translate(100, 100) rotate(180) "></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- container -->
                </div>
                <!-- product-footer -->
            </div>
            <!-- .product-container -->
        </div>
    </div>
@endsection