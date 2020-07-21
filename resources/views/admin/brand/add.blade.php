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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin/includes/menu')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h3 class="info"><img src="{{ asset('img/logo.png') }}" alt="Imagem do título da página"> Marcas
                        |
                        Gerenciar</h3>

                        <div class="col-mb-3">
                            @if (Request::get('result') != null && Request::get('result') == 0)
                            <div class="alert alert-success"><i class="fas fa-lg fa-check-circle"></i> Marca cadastrada
                                com sucesso!
                            </div>
                            @elseif(Request::get('result') != null && Request::get('result') == 1)
                            <div class="alert alert-danger"><i class="fas fa-lg fa-times-circle"></i> Erro ao cadastrar
                                Marca, tente novamente!</div>
                            @elseif(Request::get('result') != null && Request::get('result') == 2)
                                <div class="alert alert-success"><i class="fas fa-lg fa-check-circle"></i> Marca excluída!</div>
                            @elseif(Request::get('result') != null && Request::get('result') == 3)
                                <div class="alert alert-danger"><i class="fas fa-lg fa-times-circle"></i> Impossível exluir, Marca
                                    em uso!</div>
                            @endif
                        </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th width="17%">Ação</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    @if ($update)
                    <div class="row row-form justify-content-center">
                        <div class="col-lg-3">
                            <form action="{{ route('admin.marca.update', ['id' => $brand->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="group">Nome da marca</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i class="fas fa-ad"></i></button>
                                        </div>
                                        <input type="text" value="{{ $brand->name }}" class="form-control" name="brand">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="btn-group mt-5">
                                        <button class="btn btn-b3" type="submit">ATUALIZAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>    
                    @else
                    <div class="row row-form justify-content-center">
                        <div class="col-lg-3">
                            <form action="{{ route('admin.marca.add') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="group">Nome da marca</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i class="fas fa-ad"></i></button>
                                        </div>
                                        <input type="text" class="form-control" name="brand">
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
                    @endif
                </div>
            </section>
        </div>
    </div>
    <div id="preloader"><img src="{{ asset('img/logo.png') }}" alt="Logo 3B"></div>

    
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin_native.js') }}"></script>
    <script src="{{ asset('plugins/DataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables-1.10.20/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/select2_4.0.13/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/admin_brand.js') }}"></script>
    
    <script>
        $('.table').DataTable({
            lengthMenu: [5, 10, 15, 25, 50, 100, 'Todas'],
            responsive: true,
            processing: true,
            serverSide: true,
            "iDisplayLength": 5,
            "language": {
                "url": "/js/datatable_ptbr.json"
            },
            ajax: "{!! route('admin.marca.listar') !!}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    "data": "action",
                    "render": function(data, type, row, meta) {
                        return '<a href="../../admin/marca/editar/' + row.id +
                            '" class="btn btn btn-b3" title="Editar"> <i class="fa fa-edit"></i></a> <a href="' + '../../admin/marca/excluir/' + row.id + '" id="person-' +
                            row.id +
                            '" class="btn btn-danger" data-toggle="confirmation" data-btn-ok-label="Sim" data-btn-ok-class="btn-success" data-btn-ok-icon-class="material-icons" data-btn-ok-icon-content="" data-btn-cancel-label="Não" data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="material-icons" data-btn-cancel-icon-content="" data-title="Tem certeza que deseja excluir o cadastro de ' +
                            row.name +
                            '?" data-content="Esta ação não poderá ser desfeita." title="Excluir"> <i class="fa fa-trash"></i></a>';
                    }
                }
            ],
        });
        </script>
  
</body>

</html>