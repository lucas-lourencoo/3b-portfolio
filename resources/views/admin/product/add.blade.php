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
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote-0.8.18/summernote.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
    <link rel="icon" type="imagem/png" href="{{ asset('img/logo.png') }}" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin/includes/menu')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h3 class="info"><img src="{{ asset('img/logo.png') }}" alt="Imagem do título da página"> Produtos |
                        Adicionar</h3>

                        <div class="col-mb-3">
                            @if (Request::get('result') != null && Request::get('result') == 0)
                            <div class="alert alert-success"><i class="fas fa-lg fa-check-circle"></i> Produto cadastrado
                                com sucesso!
                            </div>
                            @elseif(Request::get('result') != null && Request::get('result') == 1)
                            <div class="alert alert-danger"><i class="fas fa-lg fa-times-circle"></i> Erro ao cadastrar
                                produto, tente novamente!</div>
                            @elseif(Request::get('result') != null && Request::get('result') == 2)
                            <div class="alert alert-success"><i class="fas fa-lg fa-check-circle"></i> Produto excluído!</div>
                            @endif
                        </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Código</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>
                                        <th width="17%">Ação</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                    @if($update)
                        <form action="{{ route('admin.produto.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-form justify-content-center">

                                <div class="col-xl-3 col-lg-4">
                                    <div class="form-group">
                                        <label for="group">Título do produto</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i class="fas fa-ad"></i></button>
                                            </div>
                                            <input type="text" value="{{ $product->name }}" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="barcode">Código</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fas fa-barcode"></i></button>
                                            </div>
                                            <input type="text" value="{{ $product->code }}" class="form-control" name="code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Preço</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fa fa-dollar-sign"></i></button>
                                            </div>
                                            <input type="text" value="{{ $product->price }}" class="form-control" id="price" name="price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Peso líquido (g)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fas fa-balance-scale-right"></i></button>
                                            </div>
                                            <input type="text" value="{{ $product->weight }}" class="form-control" name="weight">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gross_weight">Peso bruto (g)<span>(opcional)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fas fa-balance-scale-right"></i></button>
                                            </div>
                                            <input type="text" value="{{ $product->gross_weight }}" class="form-control" name="gross_weight">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="form-group">
                                        <label for="category">Categoria</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-paperclip"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="category" placeholder="Selecione"
                                                data-allow-clear="1">
                                                @foreach ($categories as $category)
                                                    @if($category->name === $product->category)
                                                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">Marca</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-copyright"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="brand" placeholder="Selecione"
                                                data-allow-clear="1">
                                                <option value=""></option>
                                                @foreach ($brands as $brand)
                                                    @if($brand->name === $product->brand)
                                                        <option selected value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @else
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="segment">Segmento</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-mouse-pointer"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="segment" placeholder="Selecione"
                                                data-allow-clear="1">
                                                <option value=""></option>
                                                    @if($product->segment === 1)
                                                        <option selected value="1">Agricultura</option>
                                                        <option value="2">Pecuária</option>
                                                    @else
                                                        <option value="1">Agricultura</option>
                                                        <option selected value="2">Pecuária</option>
                                                    @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="segment">Categoria animal <span>(opcional)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-paw"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="animal[]" multiple="multiple"
                                                placeholder="Selecione" data-allow-clear="1">
                                                <option value=""></option>
                                                @if($animals)
                                                    @foreach ($animals as $animal)
                                                        <option selected value="{{ $animal->name }}">{{ $animal->name }}</option>
                                                    @endforeach
                                                @endif
                                                <option value="Aves">Aves</option>
                                                <option value="Bovino">Bovino</option>
                                                <option value="Domésticos">Domésticos</option>
                                                <option value="Equino">Equino</option>
                                                <option value="Ovino">Ovino</option>
                                                <option value="Peixes">Peixes</option>
                                                <option value="Suíno">Suíno</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="form-group">
                                        <label for="category">Descrição</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-ad"></i></button>
                                            </div>
                                            <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Recomendações</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-ad"></i></button>
                                            </div>
                                            <textarea name="recomend" class="form-control" rows="4">{{ $product->recommendation }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bull">Bula <span>(opcional)</span></label>
                                        <textarea name="bull" id="summernote">{{ $product->bull ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5">
                                <div class="form-group col-lg-4 col-xl-3">
                                    <label for="img-n">Quant. de imagens</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i class="fas fa-image"></i></button>
                                        </div>
                                        <select class="custom-select" name="img_n" id="img-n">
                                            <option value="">Selecione</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 justify-content-center">
                                <div class="box-img img1 d-none">
                                    <div class="box">
                                        <div class="upload-options">
                                            <h2>IMAGEM 1</h2>
                                        </div>
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                            <label>
                                                <input name="img1" type="file" class="image-upload" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-img img2 d-none">
                                    <div class="box">
                                        <div class="upload-options">
                                            <h2>IMAGEM 2</h2>
                                        </div>
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                            <label>
                                                <input name="img2" type="file" class="image-upload" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="btn-group mt-5">
                            <button class="btn btn-b3" type="submit">ATUALIZAR</button>
                        </div>
                    </div>
                    </form>
                    @else
                        <form action="{{ route('admin.produto.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-form justify-content-center">

                                <div class="col-xl-3 col-lg-4">
                                    <div class="form-group">
                                        <label for="group">Título do produto</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i class="fas fa-ad"></i></button>
                                            </div>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="barcode">Código</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fas fa-barcode"></i></button>
                                            </div>
                                            <input type="text" class="form-control" name="code">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Preço</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fa fa-dollar-sign"></i></button>
                                            </div>
                                            <input type="text" class="form-control" id="price" name="price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Peso líquido (g)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fas fa-balance-scale-right"></i></button>
                                            </div>
                                            <input type="text" class="form-control" name="weight">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gross_weight">Peso bruto (g)<span>(opcional)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-b3"><i
                                                        class="fas fa-balance-scale-right"></i></button>
                                            </div>
                                            <input type="text" class="form-control" name="gross_weight">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-3 col-lg-4">
                                    <div class="form-group">
                                        <label for="category">Categoria</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-paperclip"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="category" placeholder="Selecione"
                                                data-allow-clear="1">
                                                <option value=""></option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">Marca</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-copyright"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="brand" placeholder="Selecione"
                                                data-allow-clear="1">
                                                <option value=""></option>
                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="segment">Segmento</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-mouse-pointer"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="segment" placeholder="Selecione"
                                                data-allow-clear="1">
                                                <option value=""></option>
                                                <option value="1">Agricultura</option>
                                                <option value="2">Pecuária</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="segment">Categoria animal <span>(opcional)</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-paw"></i></button>
                                            </div>
                                            <select class="data-single form-control" name="animal[]" multiple="multiple"
                                                placeholder="Selecione" data-allow-clear="1">
                                                <option value=""></option>
                                                <option value="Aves">Aves</option>
                                                <option value="Bovino">Bovino</option>
                                                <option value="Domésticos">Domésticos</option>
                                                <option value="Equino">Equino</option>
                                                <option value="Ovino">Ovino</option>
                                                <option value="Peixes">Peixes</option>
                                                <option value="Suíno">Suíno</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-xl-6 col-lg-8">
                                    <div class="form-group">
                                        <label for="category">Descrição</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-ad"></i></button>
                                            </div>
                                            <textarea name="description" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Recomendações</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-dark"><i
                                                        class="fas fa-ad"></i></button>
                                            </div>
                                            <textarea name="recomend" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="bull">Bula <span>(opcional)</span></label>
                                        <textarea name="bull" id="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5">
                                <div class="form-group col-lg-4 col-xl-3">
                                    <label for="img-n">Quant. de imagens</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i class="fas fa-image"></i></button>
                                        </div>
                                        <select class="custom-select" name="img_n" id="img-n">
                                            <option value="">Selecione</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 justify-content-center">
                                <div class="box-img img1 d-none">
                                    <div class="box">
                                        <div class="upload-options">
                                            <h2>IMAGEM 1</h2>
                                        </div>
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                            <label>
                                                <input name="img1" type="file" class="image-upload" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-img img2 d-none">
                                    <div class="box">
                                        <div class="upload-options">
                                            <h2>IMAGEM 2</h2>
                                        </div>
                                        <div class="js--image-preview"></div>
                                        <div class="upload-options">
                                            <label>
                                                <input name="img2" type="file" class="image-upload" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="btn-group mt-5">
                            <button class="btn btn-b3" type="submit">CADASTRAR</button>
                        </div>
                    </div>
                    </form>
                @endif
        </div>
        </section>
    </div>
    </div>

    <div id="preloader"><img src="{{ asset('img/logo.png') }}" alt="Logo 3B"></div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin_native.js') }}"></script>

    <script src="{{ asset('plugins/select2_4.0.13/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote-0.8.18/summernote.js') }}"></script>
    <script src="{{ asset('plugins/summernote-0.8.18/summernote-pt-BR.js') }}"></script>
    <script src="{{ asset('plugins/DataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables-1.10.20/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/admin_product.js') }}"></script>

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
        ajax: "{!! route('admin.produto.listar') !!}",
        columns: [{
                data: 'name',
                name: 'name',
            },
            {
                data: 'code',
                name: 'code',
            },
            {
                data: 'brand',
                name: 'brand',
            },
            {
                data: 'category',
                name: 'category',
            },
            {
                "data": "action",
                "render": function(data, type, row, meta) {
                    return '<a href="../../admin/produto/editar/' + row.id +
                        '" class="btn btn btn-b3" title="Editar"> <i class="fa fa-edit"></i></a> <a href="' +
                        '../../admin/produto/excluir/' + row.id + '" id="person-' +
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