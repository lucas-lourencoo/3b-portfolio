<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>3B - Comércio e Importação</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-5.13.0/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.min.css') }}">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    @include('includes/menu-main')

    <div class="main">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="{{ asset('img/banner_3b.png') }}" alt="Imagem do banner">
            </div>
            <div class="item">
                <img src="{{ asset('img/banner_3b.png') }}" alt="Imagem do banner">
            </div>
        </div>
    </div>

    @include('includes/footer')


    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery.easing/jquery.easing.min.js') }}"></script>


    <script>
    $('#search-open').click(function(e) {
        e.preventDefault();
        $('.nav-menu.nav-main').removeClass('d-lg-block');
        $('.nav-search').removeClass('d-none');
        $('.bar-options, .logo, .mobile-nav-toggle').addClass('d-none');
        setTimeout(function() { $('.nav-search input').focus() }, 500);
    });
    $('a#close').click(function (e) { 
        e.preventDefault();
        $('.nav-menu.nav-main').addClass('d-lg-block');
        $('.nav-search').addClass('d-none');
        $('.bar-options , .logo, .mobile-nav-toggle').removeClass('d-none');
    });


    $('.owl-carousel').owlCarousel({
        loop: true, 
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            }
        }
    })
    </script>
</body>

</html>