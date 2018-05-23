
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

    <table id="tb_product" class="table table-bordered" width="100%">
        <thead>
        <tr >

            <th class="text-center">STT</th>
            <th class="text-center">Tên thể loại</th>
            <th class="text-center">Số lượng nhập vào</th>
            <th class="text-center">Số lượng bán ra</th>
            <th class="text-center">Số hàng tồn</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Ngày tạo</th>
        </tr>
        </thead>
        <tbody>

        @if($object)

            @foreach($object as $key=>$item)
                <tr>
                    <td class="text-center">{{($key+1)}}</td>
                    <td >{{$item['product_name']}}</td>
                    <td >{{$item['product_number']}}</td>
                    <td >{{(int)$item['count_order']}}</td>
                    <td >{{(int)$item['product_number']-(int)$item['count_order']}}</td>
                    <td><a class="label label-{{((int)$item['product_number']-(int)$item['count_order'] <= 0) ? 'warning': 'success'}}">{{((int)$item['product_number']-(int)$item['count_order'] <= 0) ? 'Hết hàng': 'Còn hàng'}}</a></td>
                    <td class="text-center">{{\Carbon\Carbon::parse($item['product_created_at'])->format('d/m/Y H:i')}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>


