
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
        <th class="text-center"><input class="checkAll"  type="checkbox" /></th>
        <th class="text-center">STT</th>
        <th class="text-center">Tên thể loại</th>
        <th class="text-center">Tên sản phẩm</th>
        <th class="text-center">Hình ảnh</th>
        <th class="text-center">Hình ảnh Intro</th>
        <th class="text-center">Giá</th>
        <th class="text-center">Ngày tạo</th>
        <th class="text-center">Hành động</th>
    </tr>
    </thead>
    <tbody>

    @if($object)

        @foreach($object as $key=>$item)
            <tr>
                <td ><input type="checkbox" class="checkbox" data-id="{{$item['product_id']}}" name="check-all[{{$item['product_id']}}]"/></td>
                <td class="text-center">{{($key+1)}}</td>
                <td>{{$item['category_name']}}</td>
                <td>{{$item['product_name']}}</td>
                <td class="text-center">
                    <a href="{{asset($item['product_image'])}}" target="_blank" ><img  class="img-responsive img-thumbnail" src="{{asset($item['product_image'])}}" alt="" style="max-width: 50px; ,max-height: 20px;"></a>
                </td>
                <td class="text-center">
                    <a href="{{asset($item['product_image_intro'])}}" target="_blank" ><img  class="img-responsive img-thumbnail" src="{{asset($item['product_image_intro'])}}" alt="" style="max-width: 50px; ,max-height: 20px;"></a>
                </td>
                <td class="text-center"> {{number_format($item['product_price'],2)}} đ</td>
                <td class="text-center">{{\Carbon\Carbon::parse($item['product_created_at'])->format('d/m/Y H:i')}}</td>
                <td class="text-center">
                    <a href='javascript:void(0)' data-id="{{$item['product_id']}}" onclick="Product.changeStatus(this,  {{$item['product_id']}})" >
                        <input  data-id="{{$item['product_status']}}"  data-size="mini" type="checkbox" {{!empty($item['product_status']) ? 'checked': ''}} data-toggle="toggle" data-onstyle="success" data-offstyle="warning"></a>
                    <a href="{{asset(route('product.edit', $item['product_id']))}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                    <a href='javascript:void(0)' onclick="Product.remove(this, '{{ $item['product_id'] }}')"  class="btn btn-xs btn-danger" data-button-type="delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    @endif

    </tbody>
</table>
</div>


