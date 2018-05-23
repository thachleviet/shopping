<div class="col-md-12">
    <div class="form-group row">
        <label class="col-md-2">Hình đại diện : </label>
        <div class="col-md-8">
            <img src="{{($object['user_type'] ==='account') ? (($object['user_avatar']) ?  asset($object['user_avatar']) : (($object['user_gender'] == 1) ?  asset('static/main/avatar/img_avatar.png') :asset('static/main/avatar/img_avatar2.png') ))  :(($object['user_avatar']) ?  $object['user_avatar'] : (($object['user_gender'] == 1) ?  asset('static/main/avatar/img_avatar.png') :asset('static/main/avatar/img_avatar2.png') ))}}" class="img-responsive" alt="Cinque Terre" width="200" height="200"/></div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Họ và tên : </label>
        <div class="col-md-8"><strong>{{$object['user_name']}}</strong></div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Ngày sinh : </label>
        <div class="col-md-8"><strong>{{($object['user_birthday']) ? date('d-m-Y', strtotime($object['user_birthday'])): 'Chưa xác định'}}</strong></div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Giới tính : </label>
        <div class="col-md-8"><strong>{{($object['user_gender']==1) ? 'Nam' : 'Nữ'}}</strong></div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Số nhà </label>
        <div class="col-md-8"><strong>{{$object['user_address']}}</strong></div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Địa chỉ : </label>
        <div class="col-md-8">{{($object['ward_name']) ? $object['ward_name'] .' - '. $object['district_name'].' - '. $object['province_name'] : 'Chưa xác định'  }}</div>
    </div>
</div>