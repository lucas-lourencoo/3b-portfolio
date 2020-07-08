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

    <div class="banner">

    </div>

    <div class="main">
        <!--
        <div class="owl-carousel owl-banner owl-theme">
            <div class="item">
                <img src="{{ asset('img/banner_3b.png') }}" alt="Imagem do banner">
            </div>
            <div class="item">
                <img src="{{ asset('img/banner_3b.png') }}" alt="Imagem do banner">
            </div>
        </div> -->
        <div class="clients">
            <div class="container text-center">
                <h3 class="brands">Marcas</h3>
                <div class="row no-gutters clients-wrap clearfix">
                    <div class="col-xs-4 col-lg-2">
                        <div class="client-logo">
                            <a href="#"><img src="{{ asset('img/bayer.png') }}" alt="bayer"></a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-2">
                        <div class="client-logo">
                            <a href="#"><img src="{{ asset('img/rosembusch.png') }}" alt="rosembusch"></a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-2">
                        <div class="client-logo">
                            <a href="#"><img src="{{ asset('img/imeve.png') }}" alt="imeve"></a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-2">
                        <div class="client-logo">
                            <a href="#"><img src="{{ asset('img/rogama.png') }}" alt="rogama"></a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-2">
                        <div class="client-logo">
                            <a href="#"><img src="{{ asset('img/vithal.png') }}" alt="vithal"></a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-lg-2">
                        <div class="client-logo">
                            <a href="#"><img src="{{ asset('img/ucbvet.png') }}" alt="ucbvet"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container highlights-container text-center">
            <h3 class="highlights">Destaques</h3>
            <div class="owl-carousel owl-products">
                <div class="item">
                    <div class="img-car">
                        <img src="{{ asset('img/produto.jpg') }}" alt="">
                    </div>
                    <div class="info-car">
                        <p>Nome do produto</p>
                        <span>R$ 200</span>
                        <a href="#" class="go-shop"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @include('includes/footer')


    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


</body>

</html>