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
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/filepond/filepond.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }}">

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

                    <div class="row row-form justify-content-center">
                        <div class="col-lg-3">
                            <form action="{{ route('admin.vendedor.add') }}" method="post">
                                @csrf`
                                <div class="form-group">
                                    <input type="file" class="filepond" name="filepond"
                                        accept="image/png, image/jpeg" hidden="" />
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
                                        <input type="text" class="form-control" name="celphone">
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
                                        <button class="btn btn-b3-outline" type="submit">CADASTRAR</button>
                                        <button class="btn btn-b3-outline" type="button">LIMPAR
                                            CAMPOS</button>
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
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin_native.js') }}"></script>
    <script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('plugins/select2_4.0.13/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('plugins/filepond/filepond-plugin-image-preview.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-encode.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-image-crop.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-image-transform.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-image-resize.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-image-exif-orientation.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        active_bar('#seller', '#seller-manage');

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


    });
    </script>

    <script>
    /*
We need to register the required plugins to do image manipulation and previewing.
*/
    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    FilePond.create(
        document.querySelector('input'), {
            labelIdle: `Arraste e solte sua imagem aqui ou <span class="filepond--label-action">procure</span>`,
            imagePreviewHeight: 100,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleButtonRemoveItemPosition: 'center bottom'
        }
    );
    </script>
</body>

</html>