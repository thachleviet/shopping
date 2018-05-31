
<div class="table-responsive">
    <table id="tb_product" class="table table-bordered">
        <thead>
        <tr >
            <th class="text-center">STT</th>
            <th class="text-center">Tên người dùng</th>
            <th class="text-center">Email</th>
            <th class="text-center">Số điện thoại</th>

            <th class="text-center">Ngày tạo</th>

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
                    <td class="text-center">{{\Carbon\Carbon::parse($item['created_at'])->format('d/m/Y H:i')}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>


