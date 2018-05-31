@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('css')}}/bootstrap-toggle.min.css">

@stop
@section('content')

    <section class="content-header">
        <h1>
            <a style="color: #000; " href="{{url('admin')}}"> Trang chủ</a>
            <small> {{$title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">{{$title}}</li>
        </ol>
    </section>
    <section class="content" >

        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->
                <div class="box">


                    <div class="box-header">

                    </div>
                    <form method="post" action="{{route('transaction.generate-order-fill')}}">
                    <div class="box-body" >
                        <div id="content">
                            <div class="form-group row">
                                <div class="col-md-12" style="color: red; font-size: 22px; font-weight: bold"> &nbsp;HÓA ĐƠN THANH TOÁN GIAO HÀNG</div>
                            </div>
                            <div class="box-header with-border">
                                <h3 class="box-title">{{$title}}</h3>
                            </div>
                            {!! csrf_field() !!}
                            <div class="alert alert-success alert-dismissible" id="alert-success" style="display: none">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                <div class="content-message"></div>
                            </div>
                            <div class="table-responsive">

                                <table id="tb_transaction" class="table table-bordered table-striped" style="min-width:100%">
                                    <thead>
                                    <tr >
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Tên sản phẩm</th>
                                        <th class="text-center">Hình ảnh</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Giá</th>
                                        <th class="text-center">Tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($object)
                                        <?php  $total = 0;?>
                                        @foreach($object as $key=>$item)
                                            <tr>

                                                <td class="text-center">{{($key+1)}}</td>
                                                <td class="text-center">{{$item['product_name']}}</td>
                                                <td class="text-center"><img src="{{asset($item['product_image'])}}" width="80" height="100"></td>
                                                <td class="text-center">{{$item['count_order']}}</td>
                                                <td class="text-center">{{number_format($item['product_price'],2)}}</td>
                                                <td class="text-center">{{number_format($item['total_product'],2)}}</td>
                                            </tr>
                                            <?php  $total += $item['total_product']?>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    <div class="col-md-offset-6 col-md-6 text-right">
                                        <label class="col-md-6 text-right">Tổng tiền trước thuế : </label> <label class="col-md-5 text-right">{{number_format($total,2)}} vnđ</label><br>
                                        <label class="col-md-6 text-right">Thuế VAT  :</label> <label class="col-md-5 text-right">0% </label><br>
                                        <label class="col-md-6 text-right">Tổng tiền thanh toán  : </label> <label class="col-md-5 text-right">{{number_format($total,2)}} vnđ</label>
                                    </div>
                                </div>
                                <div class="col-md-12" style="width: 100%">
                                    <div  style="width: 49% ;float: left">
                                        <h4 style="color: #5471cd; ">Thông tin khách hàng</h4>
                                        <label class="info">Họ tên : </label> {{$objectTransaction['fullname_customer']}}<br>
                                        <label class="info">Số điện thoại: </label> {{$objectTransaction['phone_customer']}}<br>
                                        <label class="info">Email : </label> {{$objectTransaction['email_customer']}}<br>
                                        <label class="info">Số nhà  : </label> {{$objectTransaction['address_customer']}}<br>
                                        <label class="info">Địa chỉ : </label> {{$objectTransaction['ward_name'] .' - '.$objectTransaction['district_name'].' - '.$objectTransaction['city_name']}}<br>
                                    </div>
                                    <div style="width: 49% ;float: left ">
                                        <h4 style="color: #5471cd; text-align: center">Xác nhận của khách</h4>
                                        <div style=" text-align: center;  font-style: italic; ">Tp. Hồ Chí Minh  ngày.........tháng..........năm {{date('Y')}}</div><br><br><br>
                                        <div style=" text-align: center">................................... </div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>

                            </div>
                            <input type="hidden" name="transaction_id" value="{{$objectTransaction['transaction_id']}}">
                        </div>

                        <div class="col-md-12">

                            <button class="bill-order-c btn btn-primary pull-right" type="submit" ><i class="fa fa-copy"></i> Export</button>
                            <a onclick="printBill()" class="bill-order-c btn btn-danger pull-right" style="margin-right: 20px" type="submit"><i class="fa fa-copy"></i> Print</a>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>

        function printBill() {
            var printContents    = document.getElementById('content').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
            // document.getElementsByClassName("bill-order-c").style.display = "none";
            document.body.innerHTML = originalContents;
          //return  document.getElementById('content').print();
        }
    </script>
@endsection

