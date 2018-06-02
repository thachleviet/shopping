<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Title of the document</title>
</head>
<style>
    body {
        font-family: DejaVu Sans;
    }
    table th{
        font-size: 12px ;
        text-align: center;
    }
    table td{
        font-size: 10px ;
        text-align: center;
    }
    div.bill{
        width: 47.5%;
        float: left;
    }
    .bill-right{
        width: 52%;
        float: right;
    }
    .bill-right label{
        float: right;
        text-align: center;
    }
    .bill-right strong{
        font-size: 14px;

        font-weight: 590;

    }
    .clear{
        clear: both;
    }
    div .info{
        font-size: 14px;
        font-weight: 590;

    }
    div.bill-info{
        font-size: 14px;
    }
</style>
<body>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                    <div class="col-md-12" style="color: red; font-size: 22px; font-weight: bold">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HÓA ĐƠN THANH TOÁN GIAO HÀNG</div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" style="color: #b1241d; font-size: 14px">Chi tiết đơn hàng </h3>
                </div>
                <div class="box-header">
                </div>
                <div class="box-body">
                    <form method="get" action="{{route('transaction.generate-order-fill',$objectTransaction['transaction_id'])}}">
                        <div class="alert alert-success alert-dismissible" id="alert-success" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            <div class="content-message"></div>
                        </div>
                        <div class="table-responsive">
                            <table id="tb_transaction" class="table table-bordered " style="min-width:100%">
                                <thead>
                                <tr >
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Khuyến mãi</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($object)
                                    <?php  $total = 0;?>
                                    @foreach($object as $key=>$item)
                                        <tr>
                                            <td class="text-center">{{($key+1)}}</td>
                                            <td class="text-center">{{$item['product_name']}}</td>
                                            <td class="text-center"><img src="{{public_path().'/'.$item['product_image']}}" width="70" height="70"></td>
                                            <td class="text-center">{{$item['count_order']}}</td>
                                            <td class="text-center">{{number_format($item['product_price'],2)}} vnđ</td>
                                            <td class="text-center">{{$item['product_discount']}} %</td>
                                            <td class="text-center">{{number_format($item['total_pay'],2)}} vnđ</td>
                                        </tr>
                                        <?php  $total += $item['total_pay']?>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div style="width: 100%;margin-top: 30px ; ">
                                <div class="bill" >
                                </div>
                                <div class="bill-right" >
                                    <strong >Tổng tiền trước thuế : </strong> <label class="col-md-5 text-right">{{number_format($total,2)}} vnđ</label><br>
                                    <strong >Thuế VAT : </strong> <label class="col-md-5 text-right">0% </label><br>
                                    <strong >Tổng tiền thanh toán  : </strong> <label class="col-md-5 text-right">{{number_format($total,2) }} vnđ</label>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div style="width: 100%; margin-top: 50px ; ">
                                <div class="bill bill-info" >
                                    <h4 style="color: #5471cd; ">Thông tin khách hàng</h4>
                                    <label class="info">Họ tên : </label> {{$objectTransaction['fullname_customer']}}<br>
                                    <label class="info">Số điện thoại: </label> {{$objectTransaction['phone_customer']}}<br>
                                    <label class="info">Email : </label> {{$objectTransaction['email_customer']}}<br>
                                    <label class="info">Số nhà  : </label> {{($objectTransaction['address_customer']) ?$objectTransaction['address_customer']: $objectTransaction['address'] }}<br>
                                    <label class="info">Địa chỉ : </label> {{$objectTransaction['ward_name'] .' - '.$objectTransaction['district_name'].' - '.$objectTransaction['city_name']}}<br>
                                </div>
                                <div class="bill-right" >
                                    <h4 style="color: #5471cd; text-align: center">Xác nhận của khách</h4>
                                    <div style=" font-size: 14px; text-align: center;  font-style: italic; ">Tp. Hồ Chí Minh  ngày.........tháng..........năm {{date('Y')}}</div><br><br><br>
                                    <div style=" text-align: center">................................... </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>