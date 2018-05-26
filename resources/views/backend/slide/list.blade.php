
<div class="table-responsive">
    <table id="tb_slide" class="table table-bordered table-striped">
        <thead>
        <tr >
            <th class="text-center">STT</th>
            <th class="text-center">Tiêu đề</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Ngày tạo</th>
            <th class="text-center"></th>
        </tr>
        </thead>
        <tbody>
        @if($_object)

            @foreach($_object as $key=>$item)
                <tr>
                    <td  class="text-center">{{($key+1)}}</td>
                    <td>{{$item['slider_title']}}</td>
                    <td>{{$item['slider_title']}}</td>
                    <td>{{$item['slider_image']}}</td>
                    <td>
                        @if($item['slider_status'])
                          <span class="label label-success">Đang hoạt động</span>
                            @else
                            <span class="label label-danger">Tạm ngưng</span>
                        @endif
                    </td>
                    <td class="text-center">{{\Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i')}}</td>
                    <td class="text-center">
                        <a class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                        <a class="btn btn-xs btn-warning"><i class="fa fa-lock"></i> Khóa</a>
                        <a class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>


