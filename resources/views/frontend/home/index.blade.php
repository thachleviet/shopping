
@extends('frontend.layouts')
@section('content')
    <div id="content" role="main" class="content-area">

        @include('frontend.components._banner')
        <div class="container section-title-container" ><h3 class="section-title section-title-center"><b></b><span class="section-title-main" ><i class="icon-search" ></i>Các thương hiệu</span><b></b></h3></div><!-- .section-title -->
        <div class="slider-wrapper relative hide-for-small" id="slider-2017231640" >
            <div class="slider slider-nav-circle slider-nav-large slider-nav-dark slider-nav-outside slider-style-normal"
                 data-flickity-options='{
            "cellAlign": "center",
            "imagesLoaded": true,
            "lazyLoad": 1,
            "freeScroll": false,
            "wrapAround": true,
            "autoPlay": 500,
            "pauseAutoPlayOnHover" : true,
            "prevNextButtons": true,
            "contain" : true,
            "adaptiveHeight" : true,
            "dragThreshold" : 5,
            "percentPosition": true,
            "pageDots": false,
            "rightToLeft": false,
            "draggable": true,
            "selectedAttraction": 0.1,
            "parallax" : 0,
            "friction": 0.6        }'
            >

                <div class="row row-large"  id="row-1812182031">
                    <div class="col medium-2 small-12 large-2 col-divided"  ><div class="col-inner"  >
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1007460889">
                                <a href="danh-muc/dong-ho-nam/olym-pianus/index.html" target="_blank" class="">            <div class="img-inner dark" >
                                        <img width="200" height="100" src="{{asset('frontend')}}/wp-content/uploads/2017/08/product_category_2v340.png" class="attachment-large size-large" alt="" />
                                    </div>
                                </a>
                                <style scope="scope">

                                </style>
                            </div>

                        </div></div>
                    <div class="col medium-2 small-12 large-2 col-divided"  ><div class="col-inner"  >
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1114014425">
                                <a href="danh-muc/dong-ho-nam/ogival/index.html" target="_self" class="">            <div class="img-inner dark" >
                                        <img width="200" height="100" src="{{asset('frontend')}}/wp-content/uploads/2017/08/Untitled-1-1.png" class="attachment-large size-large" alt="ogival" />
                                    </div>
                                </a>
                                <style scope="scope">

                                </style>
                            </div>

                        </div></div>
                    <div class="col medium-2 small-12 large-2 col-divided"  ><div class="col-inner"  >
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1290783073">
                                <a href="danh-muc/dong-ho-nam/orient/index.html" target="_blank" class="">            <div class="img-inner dark" >
                                        <img width="200" height="100" src="{{asset('frontend')}}/wp-content/uploads/2017/08/Orient_Watch_logo.png" class="attachment-large size-large" alt="" />
                                    </div>
                                </a>
                                <style scope="scope">

                                </style>
                            </div>

                        </div></div>
                    <div class="col medium-2 small-12 large-2 col-divided"  ><div class="col-inner"  >
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1321555644">
                                <a href="danh-muc/dong-ho-nam/seiko/index.html" target="_blank" class="">            <div class="img-inner dark" >
                                        <img width="200" height="100" src="{{asset('frontend')}}/wp-content/uploads/2017/08/Seiko_logo.svg-1.png" class="attachment-large size-large" alt="" />
                                    </div>
                                </a>
                                <style scope="scope">

                                </style>
                            </div>

                        </div></div>
                    <div class="col medium-2 small-12 large-2 col-divided"  ><div class="col-inner"  >
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_543602278">
                                <a href="danh-muc/dong-ho-nam/tissot/index.html" target="_blank" class="">            <div class="img-inner dark" >
                                        <img width="200" height="100" src="{{asset('frontend')}}/wp-content/uploads/2017/08/2000px-Tissot_Logo.svg.png" class="attachment-large size-large" alt="" />
                                    </div>
                                </a>
                                <style scope="scope">

                                </style>
                            </div>

                        </div></div>
                    <div class="col medium-2 small-12 large-2 col-divided"  ><div class="col-inner"  >
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1463275550">
                                <a href="danh-muc/dong-ho-nam/citizen/index.html" target="_self" class="">            <div class="img-inner dark" >
                                        <img width="200" height="100" src="{{asset('frontend')}}/wp-content/uploads/2017/08/1000px-Citizen_Logo.svg-1.png" class="attachment-large size-large" alt="" />
                                    </div>
                                </a>
                                <style scope="scope">

                                </style>
                            </div>

                        </div></div>

                    <style scope="scope">

                    </style>
                </div>
            </div>

            <div class="loading-spin dark large centered"></div>

            <style scope="scope">
            </style>
        </div><!-- .ux-slider-wrapper -->


        <div class="container section-title-container" style="margin-top:20px;"><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Sản phẩm mới</span><b></b></h3></div><!-- .section-title -->


        <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>

                @foreach($_object as $key=>$item)

                <div class="col">
                    <div class="col-inner">
                        <div class="badge-container absolute left top z-1">
                            <div class="callout badge badge-circle">
                                <div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div>
                            </div>
                        </div>
                        <div class="product-small box has-hover box-normal box-text-bottom">
                            <div class="box-image">
                                <div class="">
                                    <a href="{{route('products.detail', $item['id'])}}">
                                        <img width="300" height="300"
                                             src="{{asset($item['product_image'])}}"
                                             class="show-on-hover absolute fill hide-for-small back-image" alt=""
                                             srcset="{{asset($item['product_image'])}} 300w, {{asset($item['product_image'])}} 150w, {{asset($item['product_image'])}} 180w, {{asset($item['product_image'])}} 500w"
                                             sizes="(max-width: 300px) 100vw, 300px"/><img width="300" height="300"
                                                                                           src="{{asset('frontend')}}/wp-content/uploads/2018/05/FC-718WM4H6-300x300.jpg"
                                                                                           class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                                                           alt=""
                                                                                           srcset="{{asset($item['product_image'])}} 300w, {{asset($item['product_image'])}} 150w, {{asset($item['product_image'])}} 180w, {{asset($item['product_image'])}} 500w"
                                                                                           sizes="(max-width: 300px) 100vw, 300px"/>
                                    </a>
                                </div>
                                <div class="image-tools z-top top right show-on-hover">
                                    <div class="wishlist-icon">
                                        <button class="wishlist-button button is-outline circle icon">
                                            <i class="icon-heart"></i></button>
                                        <div class="wishlist-popup dark">
                                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3577">
                                                <div class="yith-wcwl-add-button show" style="display:block">
                                                    <a href="index07c1.html?add_to_wishlist=3577" rel="nofollow"
                                                       data-product-id="3577" data-product-type="simple"
                                                       class="add_to_wishlist">
                                                        Add to Wishlist</a>
                                                    <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif"
                                                         class="ajax-loading" alt="loading" width="16" height="16"
                                                         style="visibility:hidden"/>
                                                </div>
                                                <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                    <span class="feedback">Product added!</span>
                                                    <a href="wishlist/index.html" rel="nofollow">
                                                        Browse Wishlist </a>
                                                </div>
                                                <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                    <span class="feedback">The product is already in the wishlist!</span>
                                                    <a href="wishlist/index.html" rel="nofollow">
                                                        Browse Wishlist </a>
                                                </div>
                                                <div style="clear:both"></div>
                                                <div class="yith-wcwl-wishlistaddresponse"></div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    <a class="quick-view" data-prod="3577" href="{{route('products.detail', $item['id'])}}">Xem nhanh</a>
                                </div>
                            </div>
                            <!-- box-image -->
                            <div class="box-text text-center">
                                <div class="title-wrapper">
                                    <p class="name product-title"><a
                                                href="san-pham/fc-718wm4h6-2/index.html">FC-718WM4H6</a></p>
                                </div>
                                <div class="price-wrapper">
               <span class="price"><del><span
                               class="woocommerce-Price-amount amount">87.050.000&nbsp;<span
                                   class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span
                               class="woocommerce-Price-amount amount">42.000.000&nbsp;<span
                                   class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
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
        <div class="container section-title-container" ><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Sản phẩm bán chạy</span><b></b></h3></div><!-- .section-title -->


        <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>




            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/op990-082amk-t/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2017/08/OP990-082AMK-T-300x300.png" class="show-on-hover absolute fill hide-for-small back-image" alt="Olym pianus OP990-082AMK-T" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T-300x300.png 300w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T-150x150.png 150w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T-180x180.png 180w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2017/08/OP990-082AMK-T-300x300.png" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="Olym pianus OP990-082AMK-T" srcset="//donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T-300x300.png 300w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T-150x150.png 150w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T-180x180.png 180w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-268">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="indexeda0.html?add_to_wishlist=268" rel="nofollow" data-product-id="268" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="268" href="#">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/op990-082amk-t/index.html">OP990-082AMK-T</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">4.950.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">4.200.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/op990-083amk-t/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2017/08/OP990-083AMK-T-300x300.png" class="show-on-hover absolute fill hide-for-small back-image" alt="Olym pianus OP990-083AMK-T" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T-300x300.png 300w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T-150x150.png 150w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T-180x180.png 180w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2017/08/OP990-083AMK-T-300x300.png" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="Olym pianus OP990-083AMK-T" srcset="//donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T-300x300.png 300w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T-150x150.png 150w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T-180x180.png 180w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-279">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index0bc7.html?add_to_wishlist=279" rel="nofollow" data-product-id="279" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="279" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/op990-083amk-t/index.html">OP990-083AMK-T</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">5.040.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">4.200.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/op990-083amsk-t/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2017/08/z857830851031_ae19a2e2f736a587fc6b1128bc929f01-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/z857830851031_ae19a2e2f736a587fc6b1128bc929f01-300x300.jpg 300w, http://donghogoldtime.vn/wp-content/uploads/2017/08/z857830851031_ae19a2e2f736a587fc6b1128bc929f01-150x150.jpg 150w, http://donghogoldtime.vn/wp-content/uploads/2017/08/z857830851031_ae19a2e2f736a587fc6b1128bc929f01-180x180.jpg 180w, http://donghogoldtime.vn/wp-content/uploads/2017/08/z857830851031_ae19a2e2f736a587fc6b1128bc929f01-600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2017/08/990-083-1-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2017/08/990-083-1-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2017/08/990-083-1-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2017/08/990-083-1-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2017/08/990-083-1.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-284">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index8642.html?add_to_wishlist=284" rel="nofollow" data-product-id="284" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="284" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/op990-083amsk-t/index.html">OP990-083AMSK-T</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">5.040.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">4.200.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/op990-082amk-d/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2017/08/OP990-082AMK-D-1-300x300.png" class="show-on-hover absolute fill hide-for-small back-image" alt="Olym pianus OP990-082AMK-D" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1-300x300.png 300w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1-150x150.png 150w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1-180x180.png 180w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1.png 500w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2017/08/OP990-082AMK-D-1-300x300.png" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="Olym pianus OP990-082AMK-D" srcset="//donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1-300x300.png 300w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1-150x150.png 150w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1-180x180.png 180w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMK-D-1.png 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-254">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="indexa81e.html?add_to_wishlist=254" rel="nofollow" data-product-id="254" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="254" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/op990-082amk-d/index.html">OP990-082AMK-D</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">4.950.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">4.200.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/op990-082amsk-t/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2017/08/OP990-082AMSK-T-300x300.png" class="show-on-hover absolute fill hide-for-small back-image" alt="Olym pianus OP990-082AMSK-T" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T-300x300.png 300w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T-150x150.png 150w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T-180x180.png 180w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2017/08/OP990-082AMSK-T-300x300.png" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="Olym pianus OP990-082AMSK-T" srcset="//donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T-300x300.png 300w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T-150x150.png 150w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T-180x180.png 180w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-082AMSK-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-274">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="indexafd5.html?add_to_wishlist=274" rel="nofollow" data-product-id="274" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="274" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/op990-082amsk-t/index.html">OP990-082AMSK-T</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">4.950.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">4.200.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/op990-083amk-gl-t/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2017/08/OP990-083AMK-GL-T-300x300.png" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T-300x300.png 300w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T-150x150.png 150w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T-180x180.png 180w, http://donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2017/08/OP990-083AMK-GL-T-300x300.png" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T-300x300.png 300w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T-150x150.png 150w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T-180x180.png 180w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP990-083AMK-GL-T.png 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-277">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index9ce5.html?add_to_wishlist=277" rel="nofollow" data-product-id="277" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="277" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/op990-083amk-gl-t/index.html">OP990-083AMK-GL-T</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">5.040.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">4.200.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->

        </div>
        <div class="row"  id="row-140289334">
            <div class="col medium-4 small-12 large-4"  ><div class="col-inner"  >
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_2050305156">
                        <a href="839-2/index.html" target="_self" class="">            <div class="img-inner dark" >
                                <img width="500" height="150" src="{{asset('frontend')}}/wp-content/uploads/2017/08/b1.png" class="attachment-large size-large" alt="Giao hàng" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/b1.png 500w, http://donghogoldtime.vn/wp-content/uploads/2017/08/b1-300x90.png 300w" sizes="(max-width: 500px) 100vw, 500px" />
                            </div>
                        </a>
                        <style scope="scope">

                        </style>
                    </div>

                </div></div>
            <div class="col medium-4 small-12 large-4"  ><div class="col-inner"  >
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1305025343">
                        <a href="chinh-sach-ba%cc%89o-hanh/index.html" target="_self" class="">            <div class="img-inner dark" >
                                <img width="500" height="150" src="{{asset('frontend')}}/wp-content/uploads/2017/08/b2.png" class="attachment-large size-large" alt="Cam kết chính hãng" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/b2.png 500w, http://donghogoldtime.vn/wp-content/uploads/2017/08/b2-300x90.png 300w" sizes="(max-width: 500px) 100vw, 500px" />
                            </div>
                        </a>
                        <style scope="scope">

                        </style>
                    </div>

                </div></div>
            <div class="col medium-4 small-12 large-4"  ><div class="col-inner"  >
                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_904396708">
                        <a href="chinh-sach-do%cc%89i-tra%cc%89-hoan-tien/index.html" target="_self" class="">            <div class="img-inner dark" >
                                <img width="500" height="150" src="{{asset('frontend')}}/wp-content/uploads/2017/08/b3.png" class="attachment-large size-large" alt="Chính sách đổi trả" srcset="http://donghogoldtime.vn/wp-content/uploads/2017/08/b3.png 500w, http://donghogoldtime.vn/wp-content/uploads/2017/08/b3-300x90.png 300w" sizes="(max-width: 500px) 100vw, 500px" />
                            </div>
                        </a>
                        <style scope="scope">

                        </style>
                    </div>

                </div></div>
        </div>
        <div class="container section-title-container" ><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Đồng hồ Nam</span><b></b><a href="danh-muc/dong-ho-nam/index.html" target="">Xem thêm<i class="icon-angle-right" ></i></a></h3></div><!-- .section-title -->


        <div class="row large-columns-4 medium-columns- small-columns-2 row-small">



            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/fc-718wm4h6-2/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/FC-718WM4H6-1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6-1-300x300.jpg 300w, http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6-1-150x150.jpg 150w, http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6-1-180x180.jpg 180w, http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6-1.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2018/05/FC-718WM4H6-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/FC-718WM4H6.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3577">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index07c1.html?add_to_wishlist=3577" rel="nofollow" data-product-id="3577" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3577" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/fc-718wm4h6-2/index.html">FC-718WM4H6</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">87.050.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">42.000.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/dong-ho-tissot-powermatic-80-t086-408-11-031-00/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/z982960271487_0c109b0a046643239b6a71b175d7d6c0-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://donghogoldtime.vn/wp-content/uploads/2018/05/z982960271487_0c109b0a046643239b6a71b175d7d6c0-300x300.jpg 300w, http://donghogoldtime.vn/wp-content/uploads/2018/05/z982960271487_0c109b0a046643239b6a71b175d7d6c0-150x150.jpg 150w, http://donghogoldtime.vn/wp-content/uploads/2018/05/z982960271487_0c109b0a046643239b6a71b175d7d6c0-180x180.jpg 180w, http://donghogoldtime.vn/wp-content/uploads/2018/05/z982960271487_0c109b0a046643239b6a71b175d7d6c0-600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2018/05/T086.408.11.031-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/T086.408.11.031-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/T086.408.11.031-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/T086.408.11.031-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/T086.408.11.031.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3552">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index78a2.html?add_to_wishlist=3552" rel="nofollow" data-product-id="3552" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3552" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/dong-ho-tissot-powermatic-80-t086-408-11-031-00/index.html">ĐỒNG HỒ TISSOT POWERMATIC 80 T086.408.11.031.00</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">31.010.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">12.500.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/hamilton-h40505731/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/H40505731-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/H40505731-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/H40505731-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/H40505731-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/H40505731.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3548">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="indexc0f0.html?add_to_wishlist=3548" rel="nofollow" data-product-id="3548" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3548" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/hamilton-h40505731/index.html">Hamilton-H40505731</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">23.530.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">16.500.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/roberto-cavalli-oryza-r7253124015/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/R7253124015-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/R7253124015-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/R7253124015-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/R7253124015-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/R7253124015.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3545">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index139e.html?add_to_wishlist=3545" rel="nofollow" data-product-id="3545" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3545" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/roberto-cavalli-oryza-r7253124015/index.html">Roberto Cavalli Oryza R7253124015</a></p></div><div class="price-wrapper">
                                <span class="price"><span class="woocommerce-Price-amount amount">3.700.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/calvin-klein-k3t23128/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/K3T23128-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/K3T23128-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/K3T23128-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/K3T23128-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/K3T23128.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3543">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="indexc3b6.html?add_to_wishlist=3543" rel="nofollow" data-product-id="3543" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3543" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/calvin-klein-k3t23128/index.html">Calvin Klein K3T23128</a></p></div><div class="price-wrapper">
                                <span class="price"><span class="woocommerce-Price-amount amount">3.700.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/citizen-fe6054-54a/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/FE6054-54A-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/FE6054-54A-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/FE6054-54A-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/FE6054-54A-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/FE6054-54A.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3541">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index1bcc.html?add_to_wishlist=3541" rel="nofollow" data-product-id="3541" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3541" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/citizen-fe6054-54a/index.html">Citizen FE6054-54A</a></p></div><div class="price-wrapper">
                                <span class="price"><span class="woocommerce-Price-amount amount">4.500.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/citizen-em0093-59a/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/MG_0096-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://donghogoldtime.vn/wp-content/uploads/2018/05/MG_0096-300x300.jpg 300w, http://donghogoldtime.vn/wp-content/uploads/2018/05/MG_0096-150x150.jpg 150w, http://donghogoldtime.vn/wp-content/uploads/2018/05/MG_0096-180x180.jpg 180w, http://donghogoldtime.vn/wp-content/uploads/2018/05/MG_0096-600x600.jpg 600w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2018/05/EM0093-59A-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/EM0093-59A-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/EM0093-59A-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/EM0093-59A-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/EM0093-59A.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3538">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="indexf055.html?add_to_wishlist=3538" rel="nofollow" data-product-id="3538" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3538" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/citizen-em0093-59a/index.html">Citizen EM0093-59A</a></p></div><div class="price-wrapper">
                                <span class="price"><span class="woocommerce-Price-amount amount">4.800.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->


            <div class="col" >
                <div class="col-inner">

                    <div class="badge-container absolute left top z-1">
                        <div class="callout badge badge-circle"><div class="badge-inner secondary on-sale"><span class="onsale">Giảm giá!</span></div></div>
                    </div>
                    <div class="product-small box has-hover box-normal box-text-bottom">
                        <div class="box-image" >
                            <div class="" >
                                <a href="san-pham/fc-285b5b6b/index.html">
                                    <img width="300" height="300" src="{{asset('frontend')}}/wp-content/uploads/2018/05/FC-285B5B6B-1-1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1-1-300x300.jpg 300w, http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1-1-150x150.jpg 150w, http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1-1-180x180.jpg 180w, http://donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1-1.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="wp-content/uploads/2018/05/FC-285B5B6B-1-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/05/FC-285B5B6B-1.jpg 500w" sizes="(max-width: 300px) 100vw, 300px" />									</a>
                            </div>
                            <div class="image-tools z-top top right show-on-hover">
                                <div class="wishlist-icon">
                                    <button class="wishlist-button button is-outline circle icon">
                                        <i class="icon-heart" ></i>      </button>
                                    <div class="wishlist-popup dark">

                                        <div class="yith-wcwl-add-to-wishlist add-to-wishlist-3500">
                                            <div class="yith-wcwl-add-button show" style="display:block">


                                                <a href="index6f42.html?add_to_wishlist=3500" rel="nofollow" data-product-id="3500" data-product-type="simple" class="add_to_wishlist" >
                                                    Add to Wishlist</a>
                                                <img src="{{asset('frontend')}}/wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                                            </div>

                                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                                <span class="feedback">Product added!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                                <span class="feedback">The product is already in the wishlist!</span>
                                                <a href="wishlist/index.html" rel="nofollow">
                                                    Browse Wishlist	        </a>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div class="yith-wcwl-wishlistaddresponse"></div>

                                        </div>

                                        <div class="clear"></div>      </div>
                                </div>
                            </div>
                            <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                <a class="quick-view" data-prod="3500" href="#quick-view">Xem nhanh</a>									</div>
                        </div><!-- box-image -->

                        <div class="box-text text-center" >
                            <div class="title-wrapper"><p class="name product-title"><a href="san-pham/fc-285b5b6b/index.html">FC-285B5B6B</a></p></div><div class="price-wrapper">
                                <span class="price"><del><span class="woocommerce-Price-amount amount">28.680.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></del> <ins><span class="woocommerce-Price-amount amount">13.000.000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></ins></span>
                            </div>							</div><!-- box-text -->
                    </div><!-- box -->
                </div><!-- .col-inner -->
            </div><!-- col -->

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

                                <h3 class="uppercase"><strong><span style="color: #ff0000;">Citizen</span> &#8211; Thương hiệu số 2 nhật bản</strong></h3>
                                <p class="lead">Nơi đâu có ánh sáng-ở đó có năng lượng. Những cỗ máy nhai nuốt ánh sáng của thương hiệu người dân với nhiều ưu điểm vượt trội đã gây thương nhớ cho bao nam giới.</p>
                            </div>
                        </div><!-- text-box-inner -->

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
                    </div><!-- text-box -->

                    <div class="uxb-no-content uxb-image">Upload Image...</div>
                </div><!-- .banner-layers -->
            </div><!-- .banner-inner -->


            <style scope="scope">

                #banner-820218701 {
                    padding-top: 366px;
                }
                #banner-820218701 .bg.bg-loaded {
                    background-image: url({{asset('frontend')}}/wp-content/uploads/2017/08/citizen-banner-duoi-1024x317.png);
                }
                #banner-820218701 .overlay {
                    background-color: rgba(0, 0, 0, 0.26);
                }
                #banner-820218701 .bg {
                    background-position: 63% 90%;
                }
            </style>
        </div><!-- .banner -->


        <div class="container section-title-container" ><h3 class="section-title section-title-center"><b></b><span class="section-title-main" >Đồng hồ nữ</span><b></b><a href="danh-muc/dong-ho-nu/index.html" target="">Xem thêm<i class="icon-angle-right" ></i></a></h3></div><!-- .section-title -->


        <div class="row large-columns-4 medium-columns- small-columns-2 row-small">
        </div>


    </div>
@endsection