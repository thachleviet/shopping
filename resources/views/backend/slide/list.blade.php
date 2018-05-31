
<div class="table-responsive">
    <table id="tb_slide" class="table table-bordered table-striped">
        <thead>
        <tr >
            <th class="text-center">STT</th>
            <th class="text-center">Tên slide</th>
            <th class="text-center">Tiêu đề</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Thể loại</th>
            <th class="text-center">Trang thai</th>
            <th class="text-center">Ngày tạo</th>
            <th class="text-center"></th>
        </tr>
        </thead>
        <tbody>
        @if($_object)

            @foreach($_object as $key=>$item)
                <tr>
                    <td  class="text-center">{{($key+1)}}</td>
                    <td>{{$item['slider_name']}}</td>
                    <td>{{$item['slider_title']}}</td>
                    <td class="text-center">@if($item['slider_image'])
                            <img src="{{asset($item['slider_image'])}}" style="width: 60px; height: 60px">
                            @endif
                    </td>
                    <td>
                        @if($item['slider_type'] == 'slide')
                            <span class="label label-success">Slider</span>
                        @elseif($item['slider_type'] == 'logo')
                            <span class="label label-danger">Logo</span>
                            @else
                            <span class="label label-warning">Quảng cáo</span>
                        @endif
                    </td>
                    <td>
                        @if($item['slider_status'])
                          <span class="label label-success">Đang hoạt động</span>
                            @else
                            <span class="label label-danger">Tạm ngưng</span>
                        @endif
                    </td>
                    <td class="text-center">{{\Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i')}}</td>
                    <td class="text-center">
                        <a href="{{route('slide.edit', $item['id'])}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                        <a href='javascript:void(0)' class="btn btn-xs btn-warning" onclick="Slide.changeStatus(this, '{{$item['id']}}', '{{($item["slider_status"] == 1) ? "active" :"un-active"}}')"><i class="{{($item["slider_status"] == 1) ? "fa fa-lock" :"fa fa-unlock-alt"}}"></i> Khóa</a>
                        <a href='javascript:void(0)' onclick="Slide.remove(this, '{{$item['id']}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>


