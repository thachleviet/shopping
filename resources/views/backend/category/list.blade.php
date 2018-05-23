
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
<table id="category" class="table table-bordered table-striped" width="100%">
    <thead>
    <tr>
        <th><input class="checkAll"  type="checkbox" /></th>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Ngày tạo</th>
        <th>Ngày chỉnh sửa</th>
        <th>Trạng thái</th>
        <th>Ordering</th>
        <th>Hành động</th>
    </tr>
    </thead>
    <tbody>

        @if($object)

            @foreach($object as $key=>$item)
            <tr>
                <td><input  type="checkbox" class="checkbox" data-id="{{$item['category_id']}}" name="check-all[{{$item['category_id']}}]"/></td>
                <td>{{($key+1)}}</td>
                <td>
                    @if($item['level'] == 2)
                        <a href="{{asset(route('category.edit', $item['category_id']))}}">{{($item['category_name'])}}</a>
                    @else
                        <span style="padding-left:{{($item['level']-1)*25}}px">|--------</span><a href="{{asset(route('category.edit', $item['category_id']))}}">{{($item['category_name'])}}</a>
                    @endif
                </td>
                <td class="text-center">{{\Carbon\Carbon::parse($item['category_created_at'])->format('d/m/Y H:i')}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($item['category_update_at'])->format('d/m/Y H:i')}}</td>
                <td >
                    @if (!empty($item['category_status']))
                        <span class="label label-success">Đang hoạt động</span>

                    @else
                        <span class="label label-warning"> Tạm ngưng</span>

                    @endif
                </td>
                <td>
                    <div class="text-center qty" >
                        <span  onclick="Category.minus(this ,'{{$item['category_id']}}');"   class='qtyplus btn btn-default' ><i class="fa fa-angle-double-down"></i></span>
                        <input  data-id="{{$item['category_id']}}" type='text' name='quantity' value="{{($item['category_ordering']) ? $item['category_ordering'] : 0}}" class='qty' style="max-width: 40px;"/>
                        <span  onclick="Category.plus(this ,'{{$item['category_id']}}');"   class='qtyplus btn btn-default' field='quantity' ><i class="fa fa-angle-double-up"></i></span>
                    </div>
                <td class="text-center">
                    {{--<div class="dropdown">--}}
                        {{--<a class="btn btn-xs btn-danger dropbtn"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>--}}
                        {{--<div class="dropdown-content">--}}
                            {{--@if ($item['category_status'])--}}
                                {{--<a class="disabled" style="color: #ff4033" href='javascript:void (0)' onclick="Category.changeStatus(this, '{!! $item['category_id'] !!}', 'publish')"><i class="fa fa-circle-o"></i> Tạm ngưng </a>--}}
                            {{--@else--}}
                                {{--<a style="color: #1ab315" href='javascript:void (0)' onclick="Category.changeStatus(this, '{!! $item['category_id'] !!}', 'unPublish')"><i class="fa fa-circle-o"></i> Kính hoạt</a>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <a href="{{asset(route('category.edit', $item['category_id']))}}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Chỉnh sửa</a>
	  			  	<a href='javascript:void(0)' onclick="Category.remove(this, '{{ $item['category_id'] }}')"  class="btn btn-xs btn-danger" data-button-type="delete"><i class="fa fa-trash"></i> Xóa </a>
                </td>
            </tr>
            @endforeach
        @endif

    </tbody>
</table>
