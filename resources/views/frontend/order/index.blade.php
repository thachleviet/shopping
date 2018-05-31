@extends('frontend.layouts')
@section('content')
    <div class="checkout-page-title page-title">
        <div class="page-title-inner flex-row medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <nav class="breadcrumbs heading-font checkout-breadcrumbs text-center h2 strong">
                    <a href="{{route('cart')}}" class="hide-for-small">Thông tin giỏ hàng</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                    <a href="{{route('order')}}" class="current">Thông tin chi tiết</a>
                    <span class="divider hide-for-small"><i class="icon-angle-right"></i></span>
                    <a href="#" class="no-click hide-for-small">Hoàn tất mua hàng</a>
                </nav>
            </div><!-- .flex-left -->
        </div><!-- flex-row -->
    </div><!-- .page-title -->
    <div class="cart-container container page-wrapper page-checkout">
        <div class="woocommerce">




            <form  id="formOrderCart"  method="post"  action="{{route('order.order-cart')}}">
                {!! csrf_field() !!}
                <div class="row pt-0 ">
                    <div class="large-7 col  ">
                        <div id="customer_details">
                            <div class="clear">
                                <div class="woocommerce-billing-fields">
                                    <h3>Thông tin khách hàng</h3>

                                    <div class="woocommerce-billing-fields__field-wrapper">
                                        <p  class="{{($errors->has('fullname_customer')) ? 'has-error': ''}} form-row form-row-wide" id="customer_name" data-priority="30">
                                            <label for="customer_name" class="">Họ tên</label>
                                            <input type="text"
                                                                                                         class="input-text "
                                                                                                         name="fullname_customer"
                                                                                                         id="fullname_customer"
                                                                                                         placeholder=""
                                                                                                         value=""
                                                                                                         autocomplete="organization">
                                            @if ($errors->has('fullname_customer'))
                                                <span class="help-block">{{ $errors->first('fullname_customer')}}</span>
                                            @endif
                                        </p>

                                        <p class=" form-row form-row-wide address-field validate-postcode"
                                           id="customer_postcode" data-priority="65"
                                           data-o_class="form-row form-row-wide address-field validate-postcode"><label
                                                    for="customer_postcode" class="">Mã bưu điện</label><input
                                                    type="text" class="input-text " name="postcode_customer"
                                                    id="postcode_customer" placeholder="" value=""
                                                    autocomplete="postal-code">

                                        </p>
                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated"
                                           id="billing_country_field" data-priority="40">
                                            <label for="billing_country" class="">Tỉnh / Thành phố <abbr
                                                        class="required" title="bắt buộc">*</abbr></label>
                                            <select onclick="Main.provinceOption()" name="province_id"  id="province_id">
                                                <option value="">Chọn tỉnh thành</option>
                                                @foreach($_provinceOption as $key=>$item)
                                                    <option value="{{$key}}">{{$item}}</option>
                                                @endforeach

                                            </select>


                                        </p>
                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated"
                                           id="billing_country_field" data-priority="40">
                                            <label for="billing_country" class="">Quận / Huyện <abbr class="required" title="bắt buộc">*</abbr></label>
                                            <select onclick="Main.districtOption()" name="district_id"  id="district_id" >
                                                <option value="">Chọn quận huyện</option>
                                            </select>


                                        </p>
                                        <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated"
                                           id="billing_country_field" data-priority="40"><label for="billing_country"
                                                                                                class="">Xã Phường <abbr
                                                        class="required" title="bắt buộc">*</abbr></label>
                                            <select  name="ward_id"  id="ward_id">

                                            </select>


                                        </p>
                                        <p class="form-row form-row-wide address-field validate-required"
                                           id="billing_address_1_field" data-priority="50"><label
                                                    for="billing_address_1" class="">Địa chỉ <abbr class="required"
                                                                                                   title="bắt buộc">*</abbr></label>
                                            <input
                                                    type="text" class="input-text " name="address_customer"
                                                    id="address_customer"
                                                    placeholder="Nhập địa chỉ cụ thể: Số nhà, Đường, Thành Phố ,..."
                                                    value="" autocomplete="address-line1"></p>

                                        <p class="form-row form-row-first validate-required validate-phone"
                                           id="billing_phone_field" data-priority="100"><label for="billing_phone"
                                                                                               class="">Số điện thoại
                                                <abbr class="required" title="bắt buộc">*</abbr></label>
                                            <input
                                                    type="tel" class="input-text " name="phone_customer"
                                                    id="phone_customer" placeholder="" value="" autocomplete="tel"></p>
                                        <p class="form-row form-row-last validate-required validate-email"
                                           id="billing_email_field" data-priority="110"><label for="billing_email"
                                                                                               class="">Địa chỉ email
                                                <abbr class="required" title="bắt buộc">*</abbr></label><input
                                                    type="email" class="input-text " name="email_customer"
                                                    id="email_customer" placeholder="" value=""
                                                    autocomplete="email email_customer"></p>
                                        <input name="transaction_amount" type="hidden" id="transaction_amount" value="{{$_total_pay}}">
                                    </div>

                                </div>

                            </div>
                            <div class="clear">
                                <div class="woocommerce-shipping-fields">
                                </div>
                                <div class="woocommerce-additional-fields">


                                    <h3>Thông tin thêm</h3>


                                    <div class="woocommerce-additional-fields__field-wrapper">
                                        <p class="form-row notes" id="order_comments_field" data-priority=""><label
                                                    for="order_comments" class="">Ghi chú</label>
                                            <textarea
                                                    name="transaction_note" class="input-text " id="transaction_note"
                                                    placeholder="Nhập ghi chú của bạn tại đây . . ." rows="2"
                                                    cols="5"></textarea></p></div>


                                </div>
                            </div>
                        </div>


                    </div><!-- large-7 -->

                    <div class="large-5 col">
                        <div class="col-inner has-border">
                            <div class="checkout-sidebar sm-touch-scroll">
                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>

                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tổng cộng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($_listCart as $key=>$item)
                                            <tr class="cart_item">
                                                <input  class="form-control quantity input-sm" style="width:60px; text-align:center;" type="hidden" value="{{$item->qty}}" name="qty[]" min="1" >
                                                <input  class="form-control quantity input-sm" style="width:60px; text-align:center;" type="hidden" value="{{$item->id}}" name="product_id[]" min="1" >
                                                <td class="product-name">
                                                    {{$item->name}}
                                                    <strong class="product-quantity">× {{$item->qty}}</strong></td>
                                                <td class="product-total">
                                                <span class="woocommerce-Price-amount amount"> {{number_format($item->qty*$item->price,2)}}<span
                                                            class="woocommerce-Price-currencySymbol">₫</span></span>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                        <tfoot>

                                        <tr class="cart-subtotal">
                                            <th>Tổng phụ</th>
                                            <td><span class="woocommerce-Price-amount amount">{{$_total_pay}}<span
                                                            class="woocommerce-Price-currencySymbol">₫</span></span>
                                            </td>
                                        </tr>


                                        <tr class="order-total">
                                            <th>Tổng cộng</th>
                                            <td><strong><span
                                                            class="woocommerce-Price-amount amount">{{$_total_pay}}<span
                                                                class="woocommerce-Price-currencySymbol">₫</span></span></strong>
                                            </td>
                                        </tr>


                                        </tfoot>
                                    </table>

                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_cod">
                                                <input id="payment_method_cod" type="radio" class="input-radio"
                                                       name="payment_method" value="cod" checked="checked"
                                                       data-order_button_text="" style="display: none;">


                                            </li>
                                        </ul>
                                        <div class="form-row place-order">


                                            <input type="submit" class="button alt"  id="place_order" value="Đặt hàng" data-value="Đặt hàng">

                                            {{--<input type="hidden" name="_wp_http_referer" value="/checkout/?wc-ajax=update_order_review">--}}
                                        </div>
                                    </div>

                                </div>
                                <div class="html-checkout-sidebar pt-half"></div>
                            </div>
                        </div>
                    </div><!-- large-5 -->

                </div><!-- row -->
            </form>

        </div>
    </div>



    <script>
        jQuery(document).ready(function () {
            jQuery(".chat_fb").click(function () {
                jQuery('.fchat').toggle('slow');
            });
        });
        var Main = {

            provinceOption:function () {

                $('select[name=province_id]').change(function () {

                    $.ajaxSetup(
                        {
                            headers:
                                {
                                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                                }
                        });
                    $.post(laroute.route('province'),{province_id:$(this).val()}, function (data) {
                        let  elementOption = '';
                        $.each(data.data,(function (k, v) {
                            elementOption +='<option value="'+k+'">'+v+'</option>'
                        }));
                        $('select[name=district_id]').removeAttr("disabled").empty().append(elementOption);
                        $('select[name=ward_id]').attr("disabled", "disabled").empty().append('<option value="" >Chọn xã phường</option>');
                    },'json');

                })
            },
            districtOption:function () {
                $('select[name=district_id]').change(function () {
                    $.ajaxSetup(
                        {
                            headers:
                                {
                                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                                }
                        });
                    $.post(laroute.route('district'),{district_id:$(this).val()}, function (data) {
                        let  elementOption = '';

                        $.each(data.data,(function (k, v) {
                            elementOption +='<option value="'+k+'">'+v+'</option>'
                        }));
                        $('select[name=ward_id]').removeAttr("disabled").empty().append(elementOption);
                    },'json');

                })
            },
        };
    </script>


@endsection
@section('after_script')

    <script src="{{asset('frontend/js/jquery.min.js?v='.time())}}"></script>

@stop