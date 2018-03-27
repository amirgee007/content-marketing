@include('layouts.main.partials.head')

<body>


<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
    <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
    </button>
    <!-- Menu -->
    <ul class="menu vertical" data-accordion-menu>
        <li>
            <a href="#home" class="active">Home</a>
        </li>
        <li>
            <a href="#about">About</a>
        </li>
        <li>
            <a href="#expertise">Expertise</a>
        </li>
        <li>
            <a href="#service">Service</a>
        </li>
        <li>
            <a href="#resource">Resources</a>
        </li>
        <li>
            <a href="#faq">FAQ</a>
        </li>
        <li>
            <a href="#contact">Contacts</a>
        </li>
    </ul>

</div>
<div class="off-canvas-content  is-sticky-wrapper    " data-off-canvas-content>
    <div id="home"></div>
    <!-- start content -->
    <!-- one page header -->

    <header class="header is-sticky " id="header">

@include('layouts.main.partials.header-top')
@include('layouts.main.partials.header-middle')
    </header>
    <!-- end header -->
  <section id="slider-04">
        <div class="owl-slider-04 owl-carousel owl-theme">
          @include('layouts.main.partials.slider-04-01')
          @include('layouts.main.partials.slider-04-02')
            @include('layouts.main.partials.slider-04-03')
        </div>
    </section>
    <!-- end main slide -->
    <!-- end main slide -->
    <section class="section p-t-30 p-b-30">
       @include('layouts.main.partials.client-logo')
    </section>
    <!-- end client logo -->

    <div class="section bg--grey" id="about" style="background-image:url('images/cm-bg-01.jpg');background-position: bottom center;">
      @include('layouts.main.partials.standard2')
    </div>
    <!-- end standard 2 section -->
    <div class="section p-t-60" id="expertise">
      @include('layouts.main.partials.tabs-wizard-01')

        <div class="section-content block-tab-collapse m-t-60">
        @include('layouts.main.partials.tabs-wizard-02')
            <!-- end tabs wizard -->
        </div>

    </div>
    <!-- end section tabs wizard -->
    <div class="section p-t-60 p-b-60" id="service">
        <div class="row">
            <div class="large-12 column">
               @include('layouts.main.partials.content-marketing')
            </div>
        </div>
    </div>
    <!-- enc content marketing service -->
    <div class="section bg--grey" id="resource">
        <div class="row" data-equalizer="foo-book">
           @include('layouts.main.partials.content-book')
        </div>
    </div>
    <!-- end content book -->
    <div class="section p-t-60 p-b-60" id="faq">
       @include('layouts.main.partials.content-faq')
    </div>
    <!-- end content faq -->
    <footer class="section footer p-t-30 p-b-30 bg--primary" id="contact">
        <div class="row">
        @include('layouts.main.partials.footer-01')
        </div>
        <div class="row">
            <div class="large-12 column">
            @include('layouts.main.partials.footer-02')
            </div>
        </div>
    </footer>
    <!-- end footer-->
    <!-- end content -->
</div>
<!-- end offcanvas -->
<script src="assets/libs/jquery.js"></script>
<script src="assets/libs/foundation.min.js"></script>
<script src="assets/libs/SmoothScroll.js"></script>
<script src="assets/libs/jquery.easing.1.3.js"></script>
<script src="assets/libs/jquery.flexverticalcenter.js"></script>
<script src="assets/libs/owl.carousel.min.js"></script>
<script type="" src="assets/libs/scrolla.jquery.min.js"></script>

<script>
    $('.animate').scrolla({
        mobile: true, // disable animation on mobiles
        once: true // only once animation play on scroll
    });

    /* vertical center */
    $('.vcenter').flexVerticalCenter({
        cssAttribute: 'padding-top'
    });

    // to make scroll feel smooth
    SmoothScroll({
        // Scrolling Core
        animationTime: 800, // [ms]
        stepSize: 50, // [px]
        // Acceleration
        accelerationDelta: 50, // 50
        accelerationMax: 3, // 3
        // Keyboard Settings
        keyboardSupport: true, // option
        arrowScroll: 50, // [px]
        // Pulse (less tweakable)
        // ratio of "tail" to "acceleration"
        pulseAlgorithm: true,
        pulseScale: 4,
        pulseNormalize: 1,
        // Other
        touchpadSupport: false, // ignore touchpad by default
        fixedBackground: true,
        excluded: ''
    });

    /* foundation main */
    $(document).foundation();
    $('.off-canvas a').on('click', function () {
        $('.off-canvas').foundation('close');
    });

    // career page collapse
    $('.career-item_header-button').click(function () {
        $(this).parent().parent().find('.career-item_content').slideToggle('active');
    });

    // owl carousel
    $(document).ready(function () {
        $('.main-slide').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('.team-slide').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            },
            autoplay: true,
            autoplayTimeout: 8000,
            autoplayHoverPause: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ]
        });
    });

    // handle links with @href started with '#' only
    $(document).on('click', 'a[href^="#"]', function (e) {
        var id = $(this).attr("href");
        var offset = 110;
        var target = $(id).offset().top - offset;
        $('html, body').animate({
            scrollTop: target
        }, 1500, "easeInOutExpo");
        event.preventDefault();
    });

    $('.owl-slider-01').owlCarousel({
        nav: true,
        autoplaySpeed: 300,
        items: 1,
        navSpeed: 400,
        navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-02').owlCarousel({
        nav: true,
        autoplaySpeed: 300,
        items: 1,
        navSpeed: 400,
        navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-03').owlCarousel({
        nav: true,
        autoplaySpeed: 300,
        items: 1,
        navSpeed: 400,
        navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-04').owlCarousel({
        nav: true,
        autoplaySpeed: 300,
        items: 1,
        navSpeed: 400,
        navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-05').owlCarousel({
        nav: true,
        autoplaySpeed: 300,
        items: 1,
        navSpeed: 400,
        navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
    });

    $('.owl-slider-logo').owlCarousel({
        nav: true,
        autoplaySpeed: 300,
        items: 5,
        navSpeed: 400,
        navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false
            }
        }
    });
</script>
</body>

</html>