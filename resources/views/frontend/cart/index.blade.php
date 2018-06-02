@extends('frontend.layouts')
@section('title', $title)
@section('content')
<div class="checkout-page-title page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                <a href="{{route('cart')}}" class="current">Thông tin giỏ hàng</a>
                <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                <a href="{{route('order')}}" class="hide-for-small">Thông tin chi tiết</a>
                <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                <a href="#" class="no-click hide-for-small">Hoàn tất mua hàng</a>
            </nav>
        </div><!-- .flex-left -->
    </div><!-- flex-row -->
</div>
<div class="cart-container container page-wrapper page-checkout"><div class="woocommerce"><div class="woocommerce row row-large row-divided">
            <div class="col large-7 pb-0 ">


                <form action="{{route('cart.update')}}" method="post" class="woocommerce-cart-form">
                    <div class="cart-wrapper sm-touch-scroll">

                        {!! csrf_field() !!}
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
                            <?php
                            $param = array();
                            if(\Illuminate\Support\Facades\Route::currentRouteName() == 'products.detail'){
//                                                $id  =  URL::current();
                                $param = array('product_id'=>collect(request()->segments())->last(),'route'=>'products.detail');
                            }else{
                                $param = array('route'=>\Illuminate\Support\Facades\Route::currentRouteName());
                            }
                            ?>

                            @foreach($_object as $key=>$item)
                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                <td class="product-remove">
                                    <a href="{{route('cart.destroy',array('id'=>$item->rowId,'route'=>$param['route'],'product_id'=>!empty($param['product_id']) ? $param['product_id']:0 ))}}" class="remove" aria-label="Xóa sản phẩm này" data-product_id="201" data-product_sku="OP130-03MS-GL-T">×</a>          </td>

                                <td class="product-thumbnail">
                                    <a href="{{route('san-pham.detail', [$item->id, $item->slug])}}"><img width="180" height="180" src="{{asset($item->options->product_image)}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="OP130-03MS-GL-T"  sizes="(max-width: 180px) 100vw, 180px"></a>          </td>

                                <td class="product-name" data-title="Sản phẩm">
                                    <a href="{{route('san-pham.detail', [$item->id, $item->slug])}}">{{$item->product_name}}</a>          </td>

                                <td class="product-price" data-title="Giá">
                                    <span class="woocommerce-Price-amount amount">{{number_format($item->price)}}<span class="woocommerce-Price-currencySymbol">₫</span></span>          </td>

                                <td class="product-quantity" data-title="Số lượng">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus button is-form">
                                        <input type="number" class="input-text qty text" step="1" min="0" max="9999" name="qty[]" value="{{$item->qty}}" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
                                        <input type="button" value="+" class="plus button is-form">
                                        <input value="{{$item->rowId}}" name="rowId[]" type="hidden">
                                    </div>
                                </td>

                                <td class="product-subtotal" data-title="Tổng cộng">
                                    <span class="woocommerce-Price-amount amount">{{number_format($item->price*$item->qty,2)}}<span class="woocommerce-Price-currencySymbol">₫</span></span>            </td>
                            </tr>

                            @endforeach

                            <tr>
                                <td colspan="6" class="actions clear">

                                    <div class="continue-shopping pull-left text-left">
                                        <a class="button-continue-shopping button primary is-outline" href="{{route('home')}}">
                                            ← Tiếp tục mua hàng    </a>
                                    </div>

                                    <input type="submit" class="button primary mt-0 pull-left small" name="update_cart" value="Cập nhật giỏ hàng" >

                                			</td>
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
                                <td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount">{{$total}}<span class="woocommerce-Price-currencySymbol">₫</span></span></td>
                            </tr>

                            <tr class="order-total">
                                <th>Tổng cộng</th>
                                <td data-title="Tổng cộng"><strong><span class="woocommerce-Price-amount amount">{{$total}}&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
                            </tr>
                            </tbody></table>

                        <div class="wc-proceed-to-checkout">

                            <a href="{{route('order')}}" class="checkout-button button alt wc-forward">
                                Tiến hành kiểm tra </a>
                        </div>
                    </div>

                    <div class="cart-sidebar-content relative"></div>	</div>
            </div>
        </div>
        <div class="cart-footer-content after-cart-content relative"></div></div>
</div>
@endsection