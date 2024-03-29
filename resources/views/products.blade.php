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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/ion.rangeSlider-2.3.1/css/ion.rangeSlider.min.css') }}">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/Pagination/pagination.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.css') }}" rel="stylesheet">

    <link rel="icon" type="imagem/png" href="{{ asset('img/logo.png') }}" />
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

        <div class="container products-container">
            <div class="row">
                <div class="sidebar">
                    <a class="show-filters d-block d-md-none" data-toggle="collapse" href="#filters" role="button"
                        aria-expanded="false" aria-controls="filters">Filtrar produtos</a>

                    <div id="filters" class="">
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <a data-toggle="collapse" href="#category" role="button" aria-expanded="false"
                                    aria-controls="category"><i class="fas fa-angle-down"></i> Categorias</a>
                            </div>
                            <ul class="sidebar_categories collapse show" id="category">
                                @foreach ($categories as $category)
                                <li data-category="{{ mb_strtolower($category->name, 'UTF-8') }}">
                                    <a>{{ ucfirst($category->name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <a data-toggle="collapse" href="#brand" role="button" aria-expanded="false"
                                    aria-controls="brand"><i class="fas fa-angle-down"></i>Marca</a>
                            </div>
                            <ul class="sidebar_categories collapse show" id="brand">
                                @foreach ($brands as $brand)
                                <li data-brand="{{ mb_strtolower($brand->name, 'UTF-8') }}">
                                    <a>{{ ucfirst($brand->name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <a data-toggle="collapse" href="#animal" role="button" aria-expanded="false"
                                    aria-controls="animal"><i class="fas fa-angle-down"></i>Cat. Animal</a>
                            </div>
                            <ul class="sidebar_categories collapse show" id="animal">
                                @foreach ($animals as $animal)
                                <li data-animal="{{ mb_strtolower($animal->name, 'UTF-8') }}">
                                    <a>{{ ucfirst($animal->name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <a data-toggle="collapse" href="#price" role="button" aria-expanded="false"
                                    aria-controls="price">Filtrar por preço</a>
                            </div>
                            <ul class="sidebar_categories  collapse show" id="price">
                                <p>
                                    <input type="text" class="js-range-price" id="range_price" value="" />
                                </p>
                                <button class="filter-price">
                                    Filtrar
                                </button>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="products-list">
                    <div class="container-fluid">
                        <div class="row order-container">
                            <div class="order">
                                <label for="order-product">Ordenar por</label>
                                <div class="select-wrapper">
                                    <select id="order-product" class="select-order-product">
                                        <option value="">Padrão</option> 
                                        <option value="desc">Menor preço</option>
                                        <option value="asc">Maior preço</option>
                                    </select>
                                </div>
                            </div>
                            <div class="order">
                                <label for="order-product">Produtos por página</label>
                                <div class="select-wrapper">
                                    <select id="max-results" class="select-order-product">
                                        <option value="18">18</option>
                                        <option value="24">24</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row d-none search-d"></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="loading">
                                <div class="lds-ring side">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid">

                        </div>
                        <div class="row justify-content-center">
                            <div id="page"></div>
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
    <script src="{{ asset('js/products.js') }}"></script>
    <script src="{{ asset('plugins/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('plugins/ion.rangeSlider-2.3.1/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('plugins/Pagination/pagination.min.js') }}"></script>
    <script src="{{ asset('js/filter.js') }}"></script>


    <script>
    /* CHANGE ICON WHEN SIDEBAR IS COLLAPSE */
    $(document).ready(function() {
        if ($(window).width() < 700) {
            $('#filters').addClass('collapse');
            $('.sidebar_title a').addClass('collapsed');
            $('.sidebar_categories').removeClass("show");
            $('.fa-angle-down').removeClass("fa-angle-down").addClass('fa-angle-right');
        }
        $('.sidebar_title a').click(function(e) {
            var i = $(this).children();
            if (i.hasClass('fa-angle-down')) {
                i.addClass('fa-angle-right').removeClass('fa-angle-down');
            } else {
                i.addClass('fa-angle-down').removeClass('fa-angle-right');
            }
        });


    });
    </script>
</body>

</html>