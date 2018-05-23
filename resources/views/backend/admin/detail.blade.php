@extends('backend.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small> <a href="{{asset(route('category'))}}"> <i class="fa fa-angle-double-right"></i> Danh mục sản phẩm</a></small>
            <small><i class="fa fa-angle-double-right"></i> {{$title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">{{$title}}</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">{{$title}}</h3>
                    </div>
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-2">Hình đại diện : </label>
                                <div class="col-md-8">
                                    <img src="{{($object['type'] ==='account') ? (($object['avatar']) ?  asset($object['avatar']) : (($object['gender'] == 1) ?  asset('static/main/avatar/img_avatar.png') :asset('static/main/avatar/img_avatar2.png') ))  :(($object['avatar']) ?  $object['avatar'] : (($object['gender'] == 1) ?  asset('static/main/avatar/img_avatar.png') :asset('static/main/avatar/img_avatar2.png') ))}}" class="img-responsive" alt="Cinque Terre" width="200" height="200"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">Họ và tên : </label>
                                <div class="col-md-8"><strong>{{$object['name']}}</strong></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">Ngày sinh : </label>
                                <div class="col-md-8"><strong>{{($object['birthday']) ? date('d-m-Y', strtotime($object['birthday'])): 'Chưa xác định'}}</strong></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">Giới tính : </label>
                                <div class="col-md-8"><strong>{{($object['gender']==1) ? 'Nam' : 'Nữ'}}</strong></div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2">Số nhà </label>
                                <div class="col-md-8"><strong>{{$object['address']}}</strong></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">Địa chỉ : </label>
                                <div class="col-md-8">{{($object['ward_name']) ? $object['ward_name'] .' - '. $object['district_name'].' - '. $object['province_name'] : 'Chưa xác định'  }}</div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-2">Vai trò: </label>
                                <div class="col-md-7">
                                    @foreach($roles as $role)
                                        <label> - {{$role}}</label><br>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('after_script')

@stop