@extends('backend.layouts')
@section('after_style')
    <link rel="stylesheet" href="{{asset('css')}}/bootstrap-toggle.min.css">
@stop
@section('content')
    <section class="content-header">
        <h1>
            <a style="color: #000; " href="{{url('admin')}}"> Trang chủ</a>
            <small> {{$title}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
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
                    <div class="box-header">
                        <form method="get">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5 row">
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="border:none;padding-left:0">Từ khóa:</span>
                                                <select class="form-control" name="type" style="width: 100%">
                                                    {{ $type = isset($param['type']) ? $param['type'] : '' }}
                                                    <option value="name" {{ $type == 'name' ? 'selected="selected"' : '' }}>Họ Tên</option>
                                                    <option value="email" {{ $type == 'email' ? 'selected="selected"' : '' }}>Email </option>
                                                    <option value="phone" {{ $type == 'phone' ? 'selected="selected"' : '' }}>Số điện thoại</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <input name="search"  type="text" class="form-control" placeholder="Nhập tên người dùng">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-success" type="submit">Tìm kiếm</button>
                                        <a href="{{route('user-admin')}}" class="btn btn-default" type="submit">Xóa tìm kiếm</a>
                                    </div>
                                    <div class="col-md-3 row">
                                        <label class="col-md-5">Trạng thái : </label>
                                        <div class="col-md-6">
                                            <select name="status" class="form-control">
                                                {{ $type = isset($param['status']) ? $param['status'] : '' }}
                                                <option value="all" {{ $type == 'all' ? 'selected="selected"' : '' }}>Tất cả</option>
                                                <option value="approved" {{ $type == 'all' ? 'selected="selected"' : '' }}>Đang hoạt động</option>
                                                <option value="new" {{ $type == 'new' ? 'selected="selected"' : '' }}>Mới</option>
                                                <option value="cancel" {{ $type == 'cancel' ? 'selected="selected"' : '' }}>Hủy</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        <div class="alert alert-success alert-dismissible" id="alert-success" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            <div class="content-message"></div>
                        </div>
                        @include('backend.user.list')
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('after_script')
    <script src="{{asset('backend')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <script src="{{asset('js')}}/bootstrap-toggle.min.js"></script>
    <script src="{{asset('static/backend')}}/js/user/custom.js"></script>
    <script>
        let table = $('#tb_transaction').DataTable( {
            responsive: true,
            columnDefs: [
                { "targets":null, "searchable": false, "orderable": false, "visible": true }
            ]
        } );

        new $.fn.dataTable.FixedHeader( table );
    </script>
@stop

