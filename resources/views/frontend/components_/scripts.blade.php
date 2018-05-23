@yield('before_script')

<script type="text/javascript" src="{{asset('static/frontend')}}/all/js.js"></script>
<script type="text/javascript" src="{{asset('static/frontend/javascript')}}/jquery/plugin/scrolltofixed/scrolltofixed.js"></script>
<!--[if IE 9]><link rel="stylesheet" type="text/css" href="{{asset('static/frontend')}}/css/ie9.css"><![endif]-->
{{--<link rel="stylesheet" href="{{asset('static/frontend')}}/css/custom7b30.css" type="text/css" media="all" />--}}
<script type="text/javascript">
    var FancyboxI18nClose = 'Close';
    var FancyboxI18nNext = 'Next';
    var FancyboxI18nPrev = 'Previous';
    var contentOnly = false;
    var baseDir = 'styles/frontend/index.html';
    var baseUri = 'styles/frontend/index.html';
    var jqZoomEnabled = true;
    var page_name = 'index';
</script>
<script type="text/javascript">
    var homeslider_loop = 1;
    var homeslider_width = 1170;
    var homeslider_speed = 429;
    var homeslider_pause = 3000;
</script>
<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext" type="text/css" media="all" />-->
<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> <![endif]-->
<link href="{{asset('static/frontend/javascript')}}/jquery/plugin/pnotify/pnotify.core.min.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('static/frontend/javascript')}}/jquery/plugin/pnotify/pnotify.core.min.js"></script>
<script type="text/javascript" src="{{asset('static/frontend/javascript')}}/jquery/plugin/cookie/jquery.cookie.min.js"></script>
<script type="text/javascript" src="{{asset('static/frontend')}}/client.js"></script>
<script type="text/javascript" src="{{asset('static/frontend/javascript')}}/tmd/lib.min.js"></script>
<script type="text/javascript" src="{{asset('static/frontend/javascript')}}/tmd/cart.201530f4.js?v=3"></script>
<script type="text/javascript" src="{{asset('static/frontend/javascript')}}/tmd/tmd.2015ae52.js?v=5"></script>
<script type="text/javascript">
    $(document).ready(function($) {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
{{--<script type="text/javascript" src="styles/frontend/js/index_slide.min.js"></script>--}}

@yield('after_script')