<footer id="footer" class="footer-wrapper">


    <!-- FOOTER 1 -->


    <!-- FOOTER 2 -->
    <div class="footer-widgets footer footer-2 dark">
        <div class="row dark large-columns-3 mb-0">
            <div id="text-2" class="col pb-0 widget widget_text">
                <h3 class="widget-title">Thông tin cửa hàng</h3>
                <div class="is-divider small">
                </div>
                <div class="textwidget">
                    <p> <strong>Đại lý:</strong> {{$config['name']}}</p>
                    <p>{{$config['title']}}</p>
                    <p><strong>Địa chỉ:</strong> {{$config['address']}}</p>
                    <p>  <strong>Điện thoại:</strong> {{$config['phone']}}</p>
                </div>
            </div><div id="text-3" class="col pb-0 widget widget_text"><h3 class="widget-title">Fanpage </h3><div class="is-divider small"></div>			<div class="textwidget"><div class="fb-page" data-href="https://www.facebook.com/donghochinhhangtoanquoc/" data-tabs="timeline" data-width="300" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote class="fb-xfbml-parse-ignore" cite="{{$config['link_fanpage']}}"><p><a href="{{$config['link_fanpage']}}">{{$config['title']}}</a></p></blockquote>
                    </div>
                </div>
            </div><div id="text-4" class="col pb-0 widget widget_text"><h3 class="widget-title">Bản đồ Goldtime</h3><div class="is-divider small"></div>			<div class="textwidget"><p >



                       {!! $config['map'] !!}</p>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end footer 2 -->



    <div class="absolute-footer light medium-text-center small-text-center">
        <div class="container clearfix">

            <div class="footer-primary pull-left">
                <div class="copyright-footer">
                   {!! $config['footer'] !!}     </div>
            </div><!-- .left -->
        </div><!-- .container -->
    </div><!-- .absolute-footer -->


</footer>