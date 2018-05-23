
<link href="{{asset('frontend')}}/css/font-awesome.css" rel="stylesheet">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table class="table cartItem">
            <thead>
            <tr>
                <th>#</th>
                <th>Hình ảnh</th>
                <th>Tên </th>
                <th>Số lương</th>
                <th>Giá</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1 ?>

            @if($Object->count()> 0)
                @foreach($Object as $key=>$item)
                    <tr>
                        <td>{{$i}}</td>
                        <td><img width="70px" height="80px" src="{{asset($item->options->product_image)}}"></td>
                        <td>{{$item->name}}</td>
                        <td data-id="{{$item->id}}"><input onclick="Cart.updateCart(this,'{{$item->rowId}}')" class="form-control quantity input-sm" style="width:60px; text-align:center;" type="number" value="{{$item->qty}}" name="qty" min="1" ></td>
                        <td>{{number_format($item->price,2)}} vnđ</td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            @else
                <tr> <td colspan="5">
                        <h3 style=" text-align: center; color: #b1241d"> Không tồn tại sản phẩm nào trong giỏ </h3> </td></tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    @if($Object->count()> 0)
     <a href="{{route('order')}}" class="btn btn-danger"> <i class="far fa-angle-double-right custom"></i> Gửi đơn hàng</a>
        @else
     <a href="{{route('home')}}" class="btn btn-primary"> Vui lòng chọn sản phẩm </a>
    @endif
</div>