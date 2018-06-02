@yield('before_style')
<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('static/backend')}}/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
{{--<link rel="stylesheet" href="{{asset('static/backend')}}/dist/css/skins/_all-skins.min.css">--}}
{{--<!-- Morris chart -->--}}
{{--<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/morris.js/morris.css">--}}
<!-- jvectormap -->
{{--<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/jvectormap/jquery-jvectormap.css">--}}
<!-- Date Picker -->
{{--<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">--}}
<!-- Daterange picker -->
{{--<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css">--}}
<!-- bootstrap wysihtml5 - text editor -->
{{--<link rel="stylesheet" href="{{asset('static/backend')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">--}}

<link rel="stylesheet" href="{{asset('static/backend')}}/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/datatables.net-bs/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="{{asset('static/backend')}}/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
<link href=" //cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@yield('after_style')