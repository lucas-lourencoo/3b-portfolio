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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2_4.0.13/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bs4-theme-select2/select2-bootstrap4.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin/includes/menu')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h3 class="info"><img src="{{ asset('img/logo.png') }}" alt="Imagem do título da página"> Grupos |
                        Adicionar</h3>

                    <div class="row row-form justify-content-center">
                        <div class="col-lg-3">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="group">Nome do grupo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i
                                                    class="fas fa-ad"></i></button>
                                        </div>
                                        <input type="text" class="form-control" name="group">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seller">Vendedor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i
                                                    class="fas fa-user-tie"></i></button>
                                        </div>
                                        <select class="data-single form-control" name="seller" placeholder="Selecione"
                                            data-allow-clear="1">
                                            <option value=""></option>
                                            <option value="1"><img src="{{ asset('img/logo.png') }}" alt=""> Cráudio
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="btn-group mt-5">
                                    <button class="btn btn-b3-outline btn-lg" type="submit">CADASTRAR</button>
                                    <button class="btn btn-b3-outline btn-lg" type="button">LIMPAR
                                        CAMPOS</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin_native.js') }}"></script>
    <script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('plugins/select2_4.0.13/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        active_bar('#group', '#group-add');

        /*  INITIALIZE INPUTS SELECT2 */
        $('.data-single').each(function() {
            $(this).select2({
                theme: 'bootstrap4',
                width: 'style',
                placeholder: $(this).attr('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        });

        $('form').submit(function(e) {
            $(this).valid();
        });

        /*  VALIDATION FORM   */
        $('form').validate({
            rules: {
                group: {
                    required: true,
                },
                seller: {
                    required: true,
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        /*
        $('.color , .tags').each(function() {
            $(this).select2({
                theme: 'bootstrap4',
                tags: true,
                tokenSeparators: [',', ' '],
                placeholder: $(this).attr('placeholder')
            });
        });*/
    });
    </script>
</body>

</html>