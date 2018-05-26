
<div class="table-responsive">
    <table id="tb_menu" class="table table-bordered table-striped">
        <thead>
        <tr >
            <th class="text-center">STT</th>
            <th class="text-center">Tên danh mục</th>
            <th class="text-center">Thể loại</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Ngày tạo</th>
            <th class="text-center"></th>
        </tr>
        </thead>
        <tbody>
        @if($_object)

            @foreach($_object as $key=>$item)
                <tr>
                    <td  class="text-center">{{($key+1)}}</td>
                    <td>{{$item['menu_name']}}</td>
                    <td>
                        @if($item['menu_type'] =='new')
                            <a href='javascript:void(0)' class="label label-success">Tin tức</a>
                        @else
                            <a href='javascript:void(0)' class="label label-danger">Sản phẩm</a>
                        @endif
                    </td>
                    <td>
                        @if($item['menu_status'])
                          <span class="label label-success">Đang hoạt động</span>
                            @else
                            <span class="label label-danger">Tạm ngưng</span>
                        @endif
                    </td>

                    <td class="text-center">{{\Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i')}}</td>
                    <td class="text-center">
                        <a href="{{route('menu.edit', $item['id'])}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                        <a class="btn btn-xs btn-warning"><i class="fa fa-lock"></i> Khóa</a>
                        <a href='javascript:void(0)' onclick="Menu.remove(this, '{{$item['id']}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>


