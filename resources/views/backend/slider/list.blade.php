
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
            {{--<th class="text-center"><input class="checkAll"  type="checkbox" /></th>--}}
            <th class="text-center">STT</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Ngày tạo</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>

        @if($object)

            @foreach($object as $key=>$item)
                <tr>
                    {{--<td ><input type="checkbox" class="checkbox" data-id="{{$item['slide_id']}}" name="check-all[{{$item['slide_id']}}]"/></td>--}}
                    <td class="text-center">{{($key+1)}}</td>
                    <td class="text-center">
                        <a href="{{asset($item['slide_image'])}}" target="_blank" ><img  class="img-responsive img-thumbnail" src="{{asset($item['slide_image'])}}" alt="" style="max-width: 50px; ,max-height: 20px;"></a>
                    </td>
                    <td class="text-center">{{\Carbon\Carbon::parse($item['slide_created_at'])->format('d/m/Y H:i')}}</td>
                    <td class="text-center">
                        {{--<a href='javascript:void(0)' data-id="{{$item['slider_id']}}" onclick="Product.changeStatus(this,  {{$item['slide_id']}})" >--}}
                            {{--<input  data-id="{{$item['slide_status']}}"  data-size="mini" type="checkbox" {{!empty($item['slide_status']) ? 'checked': ''}} data-toggle="toggle" data-onstyle="success" data-offstyle="warning"></a>--}}
                        <a href="{{asset(route('slider.edit', $item['slide_id']))}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        <a href='javascript:void(0)' onclick="Slider.remove(this, '{{ $item['slide_id'] }}')"  class="btn btn-xs btn-danger" data-button-type="delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>


