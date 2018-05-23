
<style>
    input.qty {
        width: 40px;
        height: 25px;
        text-align: center;
        border: solid 1px #75beff;
    }
    span.qtyplus {

        border: none;
        color: #ff4033;
    }
    input.qtyplus:focus , input.qtyminus:focus{
        outline: none;
        border: none;
    }
    input.qtyminus {
        background-color: #ff7925;
        width:25px; height:25px;
        border: none;
        color: white;

    }
    /* Dropdown Button */
    .dropbtn {
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        text-align: left;
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 9;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: #ff7652;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
        background-color: #ddd;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown:hover .dropbtn{
        background-color: #3e8e41;
    }

</style>
<div class="table-responsive">

    <table id="tb_transaction" class="table table-bordered table-striped" style="min-width:100%">
        <thead>
        <tr >
            <th class="text-center" >STT</th>
            <th class="text-center" >Tên người dùng</th>
            <th class="text-center" >Số điện thoại</th>
            <th class="text-center" >Email</th>
            <th class="text-center" >Đại chỉ</th>

            <th class="text-center" >Trạng thái </th>
            <th class="text-center">Hình thức thanh toán </th>
            <th class="text-center">Ngày giao dịch </th>
        </tr>
        </thead>
        <tbody>
        @if($object)
            @foreach($object as $key=>$item)
                <tr>

                    <td class="text-center">{{($key+1)}}</td>
                    <td class="text-center">{{$item['fullname_customer']}}</td>
                    <td class="text-center">{{$item['phone_customer']}}</td>
                    <td class="text-center">{{$item['email_customer']}}</td>
                    <td class="text-center">{{$item['address_customer']}}</td>
                    <td class="text-center">
                        @if (empty($item['transaction_status']))
                            <a href='javascript:void(0)' onclick="Transaction.confirmOrder2(this, '{{$item['transaction_id']}}')"><span class="label label-warning"> Chưa xác nhận </span></a><br>
                            <a href="{{route('transaction-user.detail-guest',$item['transaction_id'])}}">Xem chi tiết</a>
                        @else
                            <span class="label label-success"> Đã duyệt </span><br>
                            <a href="{{route('transaction-user.detail-guest',$item['transaction_id'])}}">Xem chi tiết</a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item['transaction_type'] == 'home')
                            <span class="label label-primary">Tại nhà</span>
                        @else
                            <span class="label label-primary">Ngân hàng</span>
                    @endif
                    <td class="text-center">{{\Carbon\Carbon::parse($item['transaction_created_at'])->format('d-m-Y H:i')}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>

