<!-- Custom-JavaScript-File-Links -->

<!-- Default-JavaScript -->
<script type="text/javascript" src="../public/landing/js/jquery-2.1.4.min.js"></script>

<!-- Background-Video-JavaScript -->
<script src="../public/landing/js/jquery.vide.min.js"></script>
<!-- //Background-Video-JavaScript -->

<!-- Skills-why-Scroller-Effect-JavaScript -->
<script type="text/javascript" src="../public/landing/js/numscroller-1.0.js"></script>
<!-- //Skills-why-Scroller-Effect-JavaScript -->

<!-- Tabs-JavaScript -->
<script src="../public/landing/js/jquery.filterizr.js"></script>
<script src="../public/landing/js/controls.js"></script>
<script type="text/javascript">
    $(function() {
        $('.filtr-container').filterizr();
    });
</script>
<!-- //Tabs-JavaScript -->

<!-- PopUp-Box-JavaScript -->
<script src="../public/landing/js/jquery.chocolat.js"></script>
<script type="text/javascript">
    $(function() {
        $('.filtr-item a').Chocolat();
    });
</script>
<!-- //PopUp-Box-JavaScript -->

<!-- Slide-To-Top JavaScript -->
<script type="text/javascript">
    $(document).ready(function() {
        var defaults = {
            containerID: 'toTop',
            containerHoverID: 'toTopHover',
            scrollSpeed: 100,
            easingType: 'linear',
        };
        $().UItoTop({
            easingType: 'easeOutQuart'
        });
    });
</script>
<a href="#home" id="toTop" class="stuoyal3w scroll stieliga" style="display: block;"> <span id="toTopHover" style="opacity: 0;"> </span></a>
<!-- //Slide-To-Top JavaScript -->

<!-- Smooth-Scrolling-JavaScript -->
<script type="text/javascript" src="../public/landing/js/move-top.js"></script>
<script type="text/javascript" src="../public/landing/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //Smooth-Scrolling-JavaScript -->

<!-- FlexSlider-JavaScript -->
<script defer src="../public/landing/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function() {
        SyntaxHighlighter.all();
    });
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!-- //FlexSlider-JavaScript -->

<!-- Bootstrap-JavaScript -->
<script type="text/javascript" src="../public/landing/js/bootstrap.min.js"></script>

<!-- //Custom-JavaScript-File-Links -->