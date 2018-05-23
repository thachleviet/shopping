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
                                    <div class="col-md-6">
                                        <input name="search"  type="text" class="form-control" placeholder="Nhập tên sản phẩm">

                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-success" type="submit">Tìm kiếm</button>
                                        <a href="{{route('inventory')}}" class="btn btn-default" type="submit">Xóa tìm kiếm</a>
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
                        @include('backend.inventory.list')
                        @include('backend.inc.paging')
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
    <script src="{{asset('static/backend')}}/js/transaction/custom.js"></script>
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

