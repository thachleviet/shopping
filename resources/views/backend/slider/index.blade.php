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

                        {{--<a href='javascript:void(0)' onclick="Slider.removeMulti()" class=" btn btn-warning"> <i class="fa fa-remove"></i> Xóa </a>--}}
                        <a href="{{route('slider.add')}}" class=" btn btn-primary"> <i class="fa fa-plus"></i> Thêm </a>
                    </div>
                    <div class="box-body">
                        <div class="alert alert-success alert-dismissible" id="alert-success" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            <div class="content-message"></div>
                        </div>
                        @include('backend.slider.list')
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
    <script src="{{asset('static/backend')}}/js/slider/custom.js"></script>
    <script>
        let table = $('#tb_product').DataTable( {
            responsive: true,
            columnDefs: [
                { "targets": [0,1,4,5], "searchable": false, "orderable": false, "visible": true }
            ]
        } );

        new $.fn.dataTable.FixedHeader( table );
    </script>
@stop

