<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>3B - {{ $product->name }}</title>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-5.13.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/venobox/venobox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/single.css') }}" rel="stylesheet">
    <link rel="icon" type="imagem/png" href="{{ asset('img/logo.png') }}" />

</head>

<body>

    @include('includes/menu-main')

    <div class="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/" title="Voltar ao início do site">Início</a></li>
                    <li><a href="/produtos" title="Voltar a pagina de produtos">Produtos</a></li>
                    <li>{{ $product->category }}</li>
                </ol>
            </div>
        </section>

        <div class="container single-container">
            <h3>
                <hr>
                <span>{{ $product->brand }} |</span> {{ $product->name }}
                <hr>
            </h3>
            <div class="row align-items-center">
                <div class="single-image col-md-6">
                    <img src="{{ asset('storage/products/'.$product->image) }}" alt="Imagem principal do produto">
                </div>
                <div class="single-info col-md-6">
                    <div class="block-info">
                        <p class="price">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="seller-container">
            <div class="card">
                <div class="cover-bg"></div>
                <div class="user-info-wrap">
                    <div class="user-photo"></div>
                    <div class="user-info">
                        <div class="user-name">{{ $salesman->name }}</div>
                        <div class="user-title">Vendedor</div>
                    </div>
                </div>
                <div class="user-bio">
                    <div class="social">
                        <div class="social-icons">
                            <a href="#" class="btn-phone"><i class="fas fa-phone"></i> {{ $salesman->celphone }}</a>
                            <a href="https://api.whatsapp.com/send?phone={{ $salesman->celphone }}&text=Olá, gostaria de comprar o produto {{ $product->name }}!" class="btn-whats"><i class="fab fa-whatsapp"></i>Ir para chat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes/footer')


    <div id="preloader"><img src="{{ asset('img/logo.png') }}" alt="Logo 3B"></div>
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('js/single.js') }}"></script>
    <script src="{{ asset('plugins/jquery.easing/jquery.easing.min.js') }}"></script>

</body>

</html>