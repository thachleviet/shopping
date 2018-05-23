
@extends('frontend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('frontend')}}/js/css/select2.min.css">
@stop
@section('content')
    <style>
        label.error{  display: block; color: red; vertical-align: top; }
        input.error{
            border: 1px solid red;
        }
        div.form-group{
            margin-top: 20px;
        }
    </style>
    <div class="content">
        <!--banner-bottom-->
        <div class="ban-bottom-w3l">
            <div class="container">
                <form  id="formOrderCart"  method="post"  onsubmit="return false">
                    {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-12 ">
                         <h2 class="tittle">Xác nhận đơn hàng</h2>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px; ">
                        <div class="col-md-6">
                                <h3 > Nhập thông tin </h3>
                                <div class="form-group row" style="padding-top: 20px; ">
                                    <label class="col-md-4"> Họ tên <span >*</span></label>
                                    <div class=" col-md-8">
                                        <input type="text" name="customer_fullname" class="form-control" {{(!empty($object['name']) ? 'disabled': '') }} value="{{(!empty($object['name']) ? $object['name']: '')}}" placeholder="Nhập họ tên" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customer_email" class="col-md-4"> Email <span >*</span> </label>
                                    <div class=" col-md-8">
                                        <input type="email" name="customer_email" {{(!empty($object['email'])) ? 'disabled': ''}} value="{{(!empty($object['email'])) ? $object['email']: ''}}" class="form-control" placeholder="Nhập email" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4"> Số điện thoại <span >*</span></label>
                                    <div class=" col-md-8">
                                        <input type="text" {{!empty($object['phone']) ? 'disabled': ''}} value="{{!empty($object['phone']) ? $object['phone']: ''}}" name="customer_phone" class="form-control" placeholder="Nhập số điện thoại" aria-describedby="basic-addon1">
                                    </div>
                                </div >
                                <div style="border: solid 0.5px #ccc; "></div>
                                <h4 style="padding-top: 20px; ">Địa chỉ giao hàng</h4>
                                    @if(empty($object))
                                    <div class="form-group row"  style="padding-top: 20px; ">
                                        <label class="col-md-4"> Chọn tỉnh/thành phố <span >*</span></label>
                                        <div class=" col-md-8">
                                            <select onclick="Main.provinceOption()"  name="province_id" class="form-control select2 s-province">
                                                @foreach($provinceOption as $key=>$item)
                                                    <option {{(!empty($object['province_id']) == $key) ? 'selected': ''}} value="{{$key}}">{{$item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"  style="padding-top: 20px; ">
                                        <label class="col-md-4"> Chọn quận/huyện <span >*</span></label>
                                        <div class=" col-md-8">
                                            <select  onclick="Main.districtOption()" name="district_id" class="form-control select2 s-district">
                                                <option {{(!empty($object['district_id']) == $key) ? 'selected': ''}}value="">Chọn  quận huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"  style="padding-top: 20px; ">
                                        <label class="col-md-4"> Chọn Xã/Phường/Thị trấn <span >*</span> </label>
                                        <div class=" col-md-8">
                                            <select  name="ward_id" class="form-control select2-single s-ward" >
                                                <option {{(!empty($object['ward_id']) == $key) ? 'selected': ''}}value="">Chọn xã phường</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endif()
                                    <div class="form-group row" >

                                    <label class="col-md-4"> Số nhà, tên đường  <span >*</span></label>
                                    <div class=" col-md-8">

                                        <input type="text" name="customer_address" class="form-control" placeholder="Nhập địa chỉ" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-md-4"> Ghi chú </label>
                                    <div class=" col-md-8">

                                        <textarea  name="customer_discription" class="form-control" placeholder="Ghi chú" aria-describedby="basic-addon1"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <label class="col-md-4"> Hình thức thanh toán </label>
                                    <div class=" col-md-8">
                                        <label class="radio-inline"><input checked type="radio" name="payment" value="home">Tại nhà</label>
                                        <label class="radio-inline"><input type="radio" name="payment" value="bank">Ngân hàng</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label"></label>
                                    <div class="col-lg-8">
                                        <button  style="width:auto;"  class="btn btn-danger btn-buynow" >Gửi đơn hàng</button>
                                    </div>
                                </div>
                                <input id="district" name="district" value="{{!empty($object['district_id']) ? $object['district_id']: ''}}" type="hidden">
                                <input id="ward" name="ward" value="{{!empty($object['ward_id']) ? $object['ward_id'] : ''}}" type="hidden">
                        </div>
                        <div class="col-md-6">
                            <h3 >Giỏ  hàng của bạn</h3>
                                <table style="margin-top: 20px; "  class="table table-bordered cartItem" >
                                    <thead>
                                    <tr>
                                        <th style="color: #b1241d; ">HÌNH</th>
                                        <th style="color: #b1241d; ">Tên sản phẩm</th>
                                        <th style="color: #b1241d; ">SL</th>
                                        <th width="40%" style="color: #b1241d; "> ĐƠN GIÁ	TỔNG</th>
                                        <th style="color: #b1241d; ">XÓA</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1 ?>
                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $key=>$item)
                                        <tr>
                                            <td><img width="50px" height="60px" src="{{asset($item->options->product_image)}}"></td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <input onclick="Cart.updateCart(this,'{{$item->rowId}}')" class="form-control quantity input-sm" style="width:60px; text-align:center;" type="number" value="{{$item->qty}}" name="qty[]" min="1" >

                                            </td>
                                            <td>{{number_format($item->price,2)}} vnđ</td>
                                            <td> <a   class="btn btn-primary" href='javascript:void(0)' onclick="Cart.removeCart(this,'{{$item->rowId}}')"><i class="fa fa-trash-o"></i> Xóa</a> </td>
                                            <input type="hidden" name="product_id[]" value="{{$item->id}}">
                                            {{--<input type="hidden" name="qty[]" value="{{$item->qty}}">--}}

                                        </tr>
                                        <?php $i++ ?>
                                    @endforeach
                                    <tr> <td colspan="5"><a href="{{route('home')}}" style="float: right" class="btn btn-primary"> Tiếp tục mua</a></td></tr>
                                    </tbody>
                                </table>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <h3>Tổng</h3>
                            <table style="margin-top: 20px; " class="table table-bordered">
                                <thead>
                                <tr> <td>Số tiền mua hàng</td> <td align="right" id="sumTotal" >{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} vnđ</td> </tr>
                                <tr> <td>Thuế VAT</td> <td align="right" id="sumTotal" >{{$percent}} %</td> </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td align="right" style="">Tổng tiền :</td> <td align="right" id="sumTotalBill" price="1225000">{{$total_pay}} vnđ</td> </tr>

                                <tr>
                                    <td colspan="5">
                                    </td> </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <input name="total_mount" type="hidden" value="{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}">
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script_after')
    <script src="{{asset('static/main/js/main.js?v='.time())}}"></script>
    <script src="{{asset('js/jquery.validate.min.js?v='.time())}}"></script>
    <script src="{{asset('js/additional-methods.min.js?v='.time())}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var val = $('.s-province').val();
            $.get(laroute.route('address.district', { province_id: val }), function(e) {
                $('.s-district').html(e);
                $('.s-district').change();
            });
            $('.s-district').change(function(){
                var val = $(this).val();
                $.get(laroute.route('address.ward', { district_id: val }), function(e) {
                    $('.s-ward').html(e);
                    $('.s-ward').change();
                });
            });
            // if($("input[name=district]").val()){
            //     let  district = $("input[name=district]").val() ;
            //     alert( $(".s-district option").val())
            //
            // }
        });
        orderSubmit._init();
    </script>
@stop
