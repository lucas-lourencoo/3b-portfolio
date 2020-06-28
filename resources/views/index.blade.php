<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Index 3B</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-5.13.0/css/all.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.min.css') }}">
    <link type="text/css" href="{{ asset('plugins/OwlCarousel2-2.3.4/owl.theme.default.min.css') }}">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

    @include('includes/menu-main')

    <div class="main">
        <div class="owl-carousel owl-theme">
            <div class="item">
               <h1>1</h1>
            </div>
            <div class="item">
               <h1>2</h1>
            </div>
        </div>
    </div>

    @include('includes/footer')


    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>

    <script>
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