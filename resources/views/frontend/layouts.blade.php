
<!DOCTYPE HTML>
<html>
<head>
    <title>New Shop a E-Commerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <!--css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('frontend/css/bootstrap.css?v='.time())}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('frontend/css/style.css?v='.time())}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('frontend/css/font-awesome.css?v='.time())}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css?v='.time())}}" rel="stylesheet">
    <link href=" //cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    @yield('after_style')
    <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <script src="{{asset('frontend/js/jquery.min.js?v='.time())}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap-3.1.1.min.js?v='.time())}}"></script>
    <link rel="stylesheet" href="{{asset('frontend/css/jstarbox.css?v='.time())}}" type="text/css" media="screen" charset="utf-8" />
</head>
<body>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content load_modal"></div>
    </div>
</div>
<!-- START HEADER -->
@include('frontend.components._header')
<!-- END HEADER -->
<!-- START CONTENT -->
@yield('content')
        <!--END CONTENT -->
<!-- START FOOTER -->
@include('frontend.components._footer')
<!--END FOOTER -->
@include('frontend.components._scripts')
</body>
</html>