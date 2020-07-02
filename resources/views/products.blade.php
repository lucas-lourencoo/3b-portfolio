<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>3B - Nossos produtos</title>

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-5.13.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">

</head>

<body>

    @include('includes/menu-main')

    <div class="main" id="contato">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="/" title="Voltar ao início do site">Início</a></li>
                    <li>Produtos</li>
                </ol>
            </div>
        </section>

        <div class="container container-produtos">
            <div class="sidebar">
                <a class="show-filters d-block d-md-none" data-toggle="collapse" href="#filters" role="button"
                    aria-expanded="false" aria-controls="filters">Filtrar</a>

                <h3>Filtrar produtos</h3>

                <div id="filters" class="">
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <a data-toggle="collapse" href="#category" role="button" aria-expanded="false"
                                aria-controls="category">Categorias</a>
                        </div>
                        <ul class="sidebar_categories collapse show" id="category">
                            <li data-category="Vermifúgos"><a class="active">Vermífugos</a></li>
                            <li data-category="Terapêuticos"><a>Terapêuticos</a></li>
                            <li data-category="Nutrição"><a>Nutrição</a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <a data-toggle="collapse" href="#brand" role="button" aria-expanded="false"
                                aria-controls="brand">Marca</a>
                        </div>
                        <ul class="sidebar_categories collapse show" id="brand">
                            <li data-brand="masculino"><a>Bayer</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="products">
                
            </div>
        </div>
    </div>

    @include('includes/footer')


    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/products.js') }}"></script>
    <script src="{{ asset('plugins/jquery.easing/jquery.easing.min.js') }}"></script>

</body>

</html>