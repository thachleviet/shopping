<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title', 'New Shop')</title>
    <link rel="shortcut icon" type="image/x-icon" href="http://4menshop.com/favicon.ico" />
    <script type="text/javascript">
        var base_url = "index.html";
        var current_script = "index_frontend";
        var product_id = 0;
        var catalogue_id = 0;
    </script>
    @yield('before_style')
    <!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="en"><![endif]-->
    <!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="en"><![endif]-->
    <!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
    <!--[if gt IE 8]> <html class="no-js ie9" lang="en"><![endif]-->
    <link  href="{{asset('static/frontend')}}/all/css3860.css?v="+time(); rel="stylesheet" type="text/css" media="all" />
    @yield('after_style')
</head>

<body id="index" class="index hide-left-column">
<div id="page">
    <div class="header-container">
       @include('frontend.components.header')
    </div>

    @yield('content')

    <div class="footer-container">
        @include('frontend.components.footer')
    </div>
</div>

</body>

</html>
@include('frontend.components.scripts')
