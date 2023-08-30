<?php require_once('../app/partials/landing_head.php'); ?>

<body>
    <!-- Head Navigation Bar -->
    <?php require_once('../app/partials/landing_menu.php'); ?>
    <!-- Footer Navigation Bar -->

    <!--offcanvas menu area end-->

    <!--slide banner section start-->
    <div class="hero_banner_section hero_banner2 d-flex align-items-center mb-60" data-bgimg="../public/img/bg/hero-bg2.png">
        <div class="container">
            <div class="hero_banner_inner">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero_content hero_content2">
                            <h3 class="wow fadeInUp text-white" data-wow-delay="0.1s" data-wow-duration="1.1s"> Up To
                                Sale <span> 50% Off</span> </h3>
                            <h1 class="wow fadeInUp text-white" data-wow-delay="0.2s" data-wow-duration="1.2s">We Bake
                                With <br>
                                Pasion.</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!-- featured banner section start -->
    <div class="featured_banner_section mb-100">
        <div class="container-fluid">
            <div class="row featured_banner_inner slick__activation" data-slick='{
                "slidesToShow": 3,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img src="../public/img/bg/featured-banner1.png" alt=""></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Pastry</a></h3>
                            <span>(39)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img src="../public/img/bg/featured-banner2.png" alt=""></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Breakfast</a></h3>
                            <span>(23)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img src="../public/img/bg/featured-banner3.png" alt=""></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Cofee Cake</a></h3>
                            <span>(17)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_featured_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        <div class="featured_banner_thumb">
                            <a href="shop-left-sidebar.html"><img src="../public/img/bg/featured-banner1.png" alt=""></a>
                        </div>
                        <div class="featured_banner_text d-flex justify-content-between align-items-center">
                            <h3><a href="shop-left-sidebar.html">Pastry</a></h3>
                            <span>(39)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured banner section end -->

    <!--footer area start-->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!--footer area end-->

    <?php require_once('../app/partials/landing_scripts.php'); ?>


</body>

</html>