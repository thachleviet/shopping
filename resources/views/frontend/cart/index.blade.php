@extends('frontend.layouts')
@section('content')
<div class="checkout-page-title page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                <a href="http://donghogoldtime.vn/cart/" class="current">Thông tin giỏ hàng</a>
                <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                <a href="http://donghogoldtime.vn/checkout/" class="hide-for-small">Thông tin chi tiết</a>
                <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                <a href="#" class="no-click hide-for-small">Hoàn tất mua hàng</a>
            </nav>
        </div><!-- .flex-left -->
    </div><!-- flex-row -->
</div>
<div class="cart-container container page-wrapper page-checkout"><div class="woocommerce"><div class="woocommerce row row-large row-divided">
            <div class="col large-7 pb-0 ">


                <form action="http://donghogoldtime.vn/cart/" method="post" class="woocommerce-cart-form">
                    <div class="cart-wrapper sm-touch-scroll">


                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="product-name" colspan="3">Sản phẩm</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-subtotal">Tổng cộng</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                <td class="product-remove">
                                    <a href="http://donghogoldtime.vn/cart/?remove_item=757b505cfd34c64c85ca5b5690ee5293&amp;_wpnonce=809aab1e6e" class="remove" aria-label="Xóa sản phẩm này" data-product_id="201" data-product_sku="OP130-03MS-GL-T">×</a>          </td>

                                <td class="product-thumbnail">
                                    <a href="http://donghogoldtime.vn/san-pham/op130-03ms-gl-t/"><img width="180" height="180" src="//donghogoldtime.vn/wp-content/uploads/2017/08/OP130-03MS-GL-T-180x180.png" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="OP130-03MS-GL-T" srcset="//donghogoldtime.vn/wp-content/uploads/2017/08/OP130-03MS-GL-T-180x180.png 180w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP130-03MS-GL-T-150x150.png 150w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP130-03MS-GL-T-300x300.png 300w, //donghogoldtime.vn/wp-content/uploads/2017/08/OP130-03MS-GL-T.png 500w" sizes="(max-width: 180px) 100vw, 180px"></a>          </td>

                                <td class="product-name" data-title="Sản phẩm">
                                    <a href="http://donghogoldtime.vn/san-pham/op130-03ms-gl-t/">OP130-03MS-GL-T</a>          </td>

                                <td class="product-price" data-title="Giá">
                                    <span class="woocommerce-Price-amount amount">1.950.000&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span>          </td>

                                <td class="product-quantity" data-title="Số lượng">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus button is-form">    <input type="number" class="input-text qty text" step="1" min="0" max="9999" name="cart[757b505cfd34c64c85ca5b5690ee5293][qty]" value="2" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
                                        <input type="button" value="+" class="plus button is-form">  </div>
                                </td>

                                <td class="product-subtotal" data-title="Tổng cộng">
                                    <span class="woocommerce-Price-amount amount">3.900.000&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span>            </td>
                            </tr>
                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                <td class="product-remove">
                                    <a href="http://donghogoldtime.vn/cart/?remove_item=e06f967fb0d355592be4e7674fa31d26&amp;_wpnonce=809aab1e6e" class="remove" aria-label="Xóa sản phẩm này" data-product_id="1896" data-product_sku="BL1684-10001">×</a>          </td>

                                <td class="product-thumbnail">
                                    <a href="http://donghogoldtime.vn/san-pham/bl1684-10001/"><img width="180" height="180" src="//donghogoldtime.vn/wp-content/uploads/2018/02/BL1684-10001-180x180.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" srcset="//donghogoldtime.vn/wp-content/uploads/2018/02/BL1684-10001-180x180.jpg 180w, //donghogoldtime.vn/wp-content/uploads/2018/02/BL1684-10001-150x150.jpg 150w, //donghogoldtime.vn/wp-content/uploads/2018/02/BL1684-10001-300x300.jpg 300w, //donghogoldtime.vn/wp-content/uploads/2018/02/BL1684-10001.jpg 500w" sizes="(max-width: 180px) 100vw, 180px"></a>          </td>

                                <td class="product-name" data-title="Sản phẩm">
                                    <a href="http://donghogoldtime.vn/san-pham/bl1684-10001/">BL1684-10001</a>          </td>

                                <td class="product-price" data-title="Giá">
                                    <span class="woocommerce-Price-amount amount">4.890.000&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span>          </td>

                                <td class="product-quantity" data-title="Số lượng">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus button is-form">    <input type="number" class="input-text qty text" step="1" min="0" max="9999" name="cart[e06f967fb0d355592be4e7674fa31d26][qty]" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
                                        <input type="button" value="+" class="plus button is-form">  </div>
                                </td>

                                <td class="product-subtotal" data-title="Tổng cộng">
                                    <span class="woocommerce-Price-amount amount">4.890.000&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span>            </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="actions clear">

                                    <div class="continue-shopping pull-left text-left">
                                        <a class="button-continue-shopping button primary is-outline" href="http://donghogoldtime.vn/shop/">
                                            ← Tiếp tục mua hàng    </a>
                                    </div>

                                    <input type="submit" class="button primary mt-0 pull-left small" name="update_cart" value="Cập nhatah giỏ hàng" disabled="">

                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="809aab1e6e"><input type="hidden" name="_wp_http_referer" value="/cart/">			</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="cart-collaterals large-5 col pb-0">
                <div class="cart-sidebar col-inner ">
                    <div class="cart_totals ">

                        <table cellspacing="0">
                            <thead>
                            <tr>
                                <th class="product-name" colspan="2" style="border-width:3px;">Tất cả giỏ hàng</th>
                            </tr>
                            </thead>
                        </table>

                        <h2>Tất cả giỏ hàng</h2>

                        <table cellspacing="0" class="shop_table shop_table_responsive">

                            <tbody><tr class="cart-subtotal">
                                <th>Tổng phụ</th>
                                <td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount">8.790.000&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></td>
                            </tr>






                            <tr class="order-total">
                                <th>Tổng cộng</th>
                                <td data-title="Tổng cộng"><strong><span class="woocommerce-Price-amount amount">8.790.000&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
                            </tr>


                            </tbody></table>

                        <div class="wc-proceed-to-checkout">

                            <a href="http://donghogoldtime.vn/checkout/" class="checkout-button button alt wc-forward">
                                Tiến hành kiểm tra </a>
                        </div>


                    </div>
                    <form class="checkout_coupon mb-0" method="post">
                        <div class="coupon">
                            <h3 class="widget-title"><i class="icon-tag"></i> Mã giảm giá</h3>
                            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi"> <input type="submit" class="is-form expand" name="apply_coupon" value="Áp dụng mã giảm giá">

                        </div>
                    </form>
                    <div class="cart-sidebar-content relative"></div>	</div>
            </div>
        </div>
        <div class="cart-footer-content after-cart-content relative"></div></div>
</div>
@endsection