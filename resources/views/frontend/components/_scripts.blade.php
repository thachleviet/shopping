<script src="{{asset('frontend/js/main.js?v='.time())}}"></script>
<script src="{{asset('frontend/js/responsiveslides.min.js?v='.time())}}"></script>
<script src="{{asset('js/laroute.js?v='.time())}}"></script>
<script src="{{asset('frontend/js/jstarbox.js?v='.time())}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    jQuery(function() {
        jQuery('.starbox').each(function() {
            var starbox = jQuery(this);
            starbox.starbox({
                average: starbox.attr('data-start-value'),
                changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                ghosting: starbox.hasClass('ghosting'),
                autoUpdateAverage: starbox.hasClass('autoupdate'),
                buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                stars: starbox.attr('data-star-count') || 5
            }).bind('starbox-value-changed', function(event, value) {
                if(starbox.hasClass('random')) {
                    var val = Math.random();
                    starbox.next().text(' '+val);
                    return val;
                }
            })
        });
    });


</script>
<script src="{{asset('static/frontend/js/cart.js?v='.time())}}"></script>
@yield('script_after')
<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("header_thach");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
