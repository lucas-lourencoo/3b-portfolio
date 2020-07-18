<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>3B | Painel Administrativo</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-5.13.0/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_native.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2_4.0.13/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bs4-theme-select2/select2-bootstrap4.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin/includes/menu')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h3 class="info"><img src="{{ asset('img/logo.png') }}" alt="Imagem do título da página"> Vendedores
                        |
                        Gerenciar</h3>

                    <div class="col-mb-3">
                        @if (Request::get('result') != null && Request::get('result') == 0)
                        <div class="alert alert-success"><i class="fas fa-lg fa-check-circle"></i> Vendedor cadastrada
                            com sucesso!
                        </div>
                        @elseif(Request::get('result') != null && Request::get('result') == 1)
                        <div class="alert alert-danger"><i class="fas fa-lg fa-times-circle"></i> Erro ao cadastrar
                            vendedor, tente novamente!</div>
                        @endif
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-3">
                            <table class="table-bordered">
                                <thead>
                                    <tr>
                                        <td>Nome</td>
                                        <td>Email</td>
                                        <td>Telefone</td>
                                        <td>Editar</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salesman as $sale)
                                        <tr>
                                            <td>{{ $sale->name }}</td>
                                            <td>{{ $sale->email }}</td>
                                            <td>{{ $sale->celphone }}</td>
                                            <td><a href="#" style="text-decoration: none; color: #000;"><i class="fas fa-pen"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                            {{ $salesman->links() }}
                        </div>
                    </div>

                    <div class="row row-form justify-content-center">
                        <div class="col-lg-3">
                            <form action="{{ route('admin.vendedor.add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="box-profile form-group">
                                    <div class="box">
                                        <div class="js--image-preview"></div>
                                    </div>
                                    <div class="upload-options">
                                        <label>
                                            Buscar foto
                                            <input name="profile" type="file" class="image-upload"/>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="group">Nome do vendedor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i
                                                    class="fas fa-user-tie"></i></button>
                                        </div>
                                        <input type="text" class="form-control" name="salesman">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="group">Telefone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i class="fa fa-phone fa-rotate-90"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                        <input type="text" class="form-control" id="celphone" name="celphone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="group">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i
                                                    class="fa fa-envelope"></i></button>
                                        </div>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="btn-group mt-5">
                                        <button class="btn btn-b3" type="submit">CADASTRAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin_native.js') }}"></script>
    
    <script src="{{ asset('plugins/select2_4.0.13/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin_seller.js') }}"></script>

</body>

</html>