
<div class="table-responsive">
    <table id="tb_product" class="table table-bordered">
        <thead>
        <tr >
            <th class="text-center">STT</th>
            <th class="text-center">Tên người dùng</th>
            <th class="text-center">Email</th>
            <th class="text-center">Số điện thoại</th>
            {{--<th class="text-center">Trạng thái</th>--}}
            {{--<th class="text-center">Vai trò</th>--}}
            <th class="text-center">Ngày tạo</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if($object)

            @foreach($object as $key=>$item)
                <tr>
                    <td  class="text-center">{{($key+1)}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>{{$item['phone']}}</td>
                    {{--<td>--}}
                        {{--@if($item['confirmed'] == 'approved')--}}
                            {{--<a class="label label-success" href='javascript:void(0)' onclick="User.changeStatus(this,'{{$item['id']}}', 'approved')">Đang  hoạt động </a>--}}
                        {{--@elseif($item['status'] == 'cancel')--}}
                            {{--<a class="label label-danger" href='javascript:void(0)' onclick="User.changeStatus(this,'{{$item['id']}}', 'cancel')"> Đã hủy </a>--}}
                        {{--@else--}}
                            {{--<a class="label label-primary" href='javascript:void(0)'> Mới </a>--}}
                        {{--@endif--}}
                    {{--</td>--}}
{{--                    <td>{{  $item->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    {{--<td>--}}
                    <td class="text-center">{{\Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i')}}</td>
                    {{--<td class="text-center">--}}
                        {{--<a href="{{route('admin-admin.show', $item['id'])}}" class="label label-primary"> <i class="fa fa-info"></i></a>--}}

                        {{--<a href="{{route('admin-admin.edit', $item['id'])}}" class="label label-default "> <i class="fa fa-edit"></i></a>--}}

                        {{--<a href="{{route('admin-admin.destroy', $item['id'])}}" class="label label-danger "> <i class="fa fa-trash"></i></a>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>


