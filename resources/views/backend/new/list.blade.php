
<div class="table-responsive">
    <table id="tb_product" class="table table-bordered table-striped">
        <thead>
        <tr >
            <th class="text-center">STT</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Tiêu đề</th>
            <th class="text-center">Loại bài viêt</th>
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
                    <td class="text-center">@if($item['new_image'])
                            <img src="{{asset($item['new_image'])}}" style="width: 60px; height: 60px">
                        @endif
                    </td>
                    <td>
                       {{$item['new_title']}}
                    </td>
                    <td>
                        @if($item['new_type']  == 'new')
                            <span class="label label-success">Tin tức</span>
                        @else
                            <span class="label label-danger">Hướng dẫn</span>
                        @endif
                    </td>
                    <td>
                        @if($item['new_status'])
                          <span class="label label-success">Đang hoạt động</span>
                            @else
                            <span class="label label-danger">Tạm ngưng</span>
                        @endif
                    </td>
                    <td class="text-center">{{\Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i')}}</td>
                    <td class="text-center">
                        <a href="{{route('new.edit', $item['id'])}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                        <a href='javascript:void(0)' class="btn btn-xs btn-warning" onclick="New.changeStatus(this, '{{$item['id']}}', '{{($item["new_status"] == 1) ? "active" :"un-active"}}')"><i class="{{($item["new_status"] == 1) ? "fa fa-lock" :"fa fa-unlock-alt"}}"></i> Khóa</a>
                        <a href='javascript:void(0)' onclick="New.remove(this, '{{$item['id']}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>


