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
            </div><div id="text-4" class="col pb-0 widget widget_text"><h3 class="widget-title">Bản đồ Goldtime</h3><div class="is-divider small"></div>			<div class="textwidget"><p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4429.59270983774!2d105.812496783821!3d20.99950852665149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9a805890e9%3A0x3a3606c6efab4cff!2zxJDhu5NuZyBI4buTIEdvbGQgVGltZSBMdXh1cnk!5e0!3m2!1svi!2sin!4v1501736226947" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></p>
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