
<div class="table-responsive">
    <table id="tb_config" class="table table-bordered table-striped">
        <thead>
        <tr >
            <th class="text-center">STT</th>
            <th class="text-center">Header</th>
            <th class="text-center">Footer</th>
            <th class="text-center">Số điện thoại</th>
            <th class="text-center">Thời gian mở cửa</th>
            <th class="text-center">Link Fange</th>
            <th class="text-center">Địa chỉ</th>
            <th class="text-center">Ngày tạo</th>
            <th class="text-center"></th>
        </tr>
        </thead>
        <tbody>
        @if($_object)
{{--            @foreach($_object as $key=>$item)--}}
                {{--'id', 'link_fanpage', 'header', 'footer',
                'time_open', 'created_at', 'updated_at'--}}
                <tr>
                    <td  class="text-center">1</td>
                    <td>
                        {{$_object['header']}}
                    </td>
                    <td>
                       {{$_object['footer']}}
                    </td>
                    <td>
                        {{$_object['phone']}}
                    </td>
                    <td class="text-center">
                        {{$_object['time_open']}}
                    </td>
                    <td>
                        <a href="{{$_object['link_fanpage']}}">{{$_object['link_fanpage']}}</a>
                    </td>
                    <td>
                        {{$_object['address']}}
                    </td>
                    <td class="text-center">{{\Carbon\Carbon::parse($_object['created_at'])->format('d/m/Y H:i')}}</td>
                    <td class="text-center">
                        <a href="{{route('config.edit', $_object['id'])}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                    </td>
                </tr>
            {{--@endforeach--}}
        @endif
        </tbody>
    </table>
</div>


