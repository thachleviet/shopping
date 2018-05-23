<div class="bs-docs-example">

    @foreach($listTransaction as $key=>$item)
        @if(isset($listOrderOfTransaction[$item['transaction_id']]))
        <table class="table table-hover">
            <thead>
            <tr>
                <th>No {{ ($key+1)}}</th>
                <th>Hình ảnh </th>
                <th>Tên sản phẩm</th>
                <th>Số lượng đặt</th>
                <th>Giá sản phẩm</th>
                <th>Tổng giá sản phẩm</th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0  ?>

            @foreach($listOrderOfTransaction[$item['transaction_id']] as $key1=>$item1)
            <tr>
                <td>{{($key1+1)}}</td>
                <td><img src="{{asset($item1['product_image'])}}" width="60" height="70"></td>
                <td>{{$item1['product_name']}}</td>
                <td>{{$item1['count_order']}}</td>
                <td>{{ number_format($item1['product_price'], 2)}}</td>
                <td>{{number_format(($item1['count_order']*$item1['product_price']),2)}}</td>
            </tr>
                <?php $total += $item1['count_order']*$item1['product_price'];

                ?>
            @endforeach
            <tr> <td colspan="7">
                    <a href="https://shopping.io" style="float: right ; text-align: left;" class="btn btn-{{($item['transaction_status'] == 1) ? 'success' : 'warning'}}">Trạng thái : {{($item['transaction_status'] == 1) ? 'Đã xác nhận' : 'Đang chờ'}}</a></td></tr>
            <tr> <td colspan="7">
                    <a href="https://shopping.io" style="float: right" class="btn btn-primary">Tổng thanh toán  : {{number_format($total,2)}}</a></td></tr>
            </tbody>
        </table>
            @endif

    @endforeach
</div>