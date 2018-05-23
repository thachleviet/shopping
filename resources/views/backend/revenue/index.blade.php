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
                                    <div class="col-md-3 row">
                                        <label class="col-md-5">Tháng </label>
                                        <div class="col-md-6">
                                            <select name="transaction_month" class="form-control">
                                                {{ $type = isset($param['transaction_month']) ? $param['transaction_month'] : '' }}
                                                <option value="all" >Tất cả</option>
                                                @for($i = 1; $i<=12;$i++)
                                                    <option value="{{$i}}" {{ $type == 'transaction_month' ? 'selected="selected"' : '' }}>Tháng {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 row">
                                        <label class="col-md-5">Quý </label>
                                        <div class="col-md-6">
                                            <select name="transaction_quy" class="form-control">
                                                {{ $type = isset($param['transaction_quy']) ? $param['transaction_quy'] : '' }}
                                                <option value="all" >Tất cả</option>
                                                <option value="1" {{ (($type) == 1) ? 'selected="selected"' : '' }} >Quý 1</option>
                                                <option value="2" {{ (($type) == 2) ? 'selected="selected"' : '' }} >Quý 2</option>
                                                <option value="3" {{ (($type) == 3) ? 'selected="selected"' : '' }} >Quý 3</option>
                                                <option value="4" {{ (($type) == 4) ? 'selected="selected"' : '' }} >Quý 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 row">
                                        <label class="col-md-5">Năm  </label>
                                        <div class="col-md-6">
                                            <select name="transaction_year" class="form-control">
                                                {{ $type = isset($param['transaction_year']) ? $param['transaction_year'] : '' }}
                                                <option value="all" >Tất cả</option>
                                                @for($i = date('Y'); $i>=1890;$i--)
                                                    <option value="{{$i}}" {{ $type == $i ? 'selected="selected"' : '' }}>Năm {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 row">

                                        <a style="margin-left: 10px" href="{{route('revenue')}}" class="btn btn-default pull-right"><i class="fa fa-search"></i>Xóa tìm kiếm</a>
                                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-search"></i>Tìm kiếm</button>
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
                        @include('backend.revenue.list')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('after_script')

    {{--<script src="{{asset('backend')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>--}}
    {{--<script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.fixedHeader.min.js"></script>--}}
    {{--<script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>--}}
    {{--<script src="{{asset('backend')}}/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>--}}
    {{--<script src="{{asset('js')}}/bootstrap-toggle.min.js"></script>--}}
    {{--<script src="{{asset('static/backend')}}/js/product/custom.js"></script>--}}
    {{--<script>--}}
        {{--var table = $('#tb_product').DataTable( {--}}
            {{--responsive: true,--}}
            {{--columnDefs: [--}}
                {{--{ "targets": [0,1,4,5], "searchable": false, "orderable": false, "visible": true }--}}
            {{--]--}}
        {{--} );--}}

        {{--new $.fn.dataTable.FixedHeader( table );--}}

        {{--$('')--}}
    {{--</script>--}}
@stop

