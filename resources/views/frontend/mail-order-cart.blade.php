<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body style=" padding: 0; margin: auto">

<div class="container" style="padding: 0; margin: auto">
    <div class="header" style="background: #2F96B4; height: auto; ">
        <h2 style="color: white; padding: 20px; margin: auto; text-align: left">Thông báo đặt hàng từ hệ thống shop Đồng hồ</h2>
    </div>
    <div class="content" style="">
        <div class="container">

            <table class="table">
                <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listCart as $key=>$item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{number_format($item->price,2)}} vnđ</td>
                        <td>{{number_format($item->price*$item->qty)}} vnđ</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="padding-top: 30px">
                <div style="padding-top: 10px"> <label>Họ tên  : </label> {{$totalCart}}<br/></div>
                <div style="padding-top: 10px"> <label>Họ tên  : </label> {{$full_name}}<br/></div>
                <div style="padding-top: 10px"> <label>Số điện thoại  : </label> {{$phone_customer}}<br/></div>

            </div>
        </div>

        {{--<p style="color: #e3271e; font-weight: bold; font-size: 14px">--}}
            {{--{{$totalCart}}--}}
        {{--</p>--}}
    </div>
    <div class="footer" style="background: #2F96B4;  ">
        <p style="color: #ffffff; font-weight: bold; font-size: 18px; text-align: left; padding: 50px">Copyright 2018 </p>
    </div>
</div>

</body>
</html>