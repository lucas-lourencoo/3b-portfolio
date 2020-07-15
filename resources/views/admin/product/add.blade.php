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
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote-0.8.18/summernote.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin/includes/menu')
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <h3 class="info"><img src="{{ asset('img/logo.png') }}" alt="Imagem do título da página"> Produtos |
                        Adicionar</h3>

                    <form action="" method="post">
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
                                        <input type="text" class="form-control" name="barcode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Preço</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i
                                                    class="fa fa-dollar-sign"></i></button>
                                        </div>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Peso líquido</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-b3"><i
                                                    class="fas fa-balance-scale-right"></i></button>
                                        </div>
                                        <input type="text" class="form-control" name="weight">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gross_weight">Peso bruto</label>
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
                                            <option value=""></option>
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
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="group">Grupo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-dark"><i
                                                    class="fas fa-layer-group"></i></button>
                                        </div>
                                        <select class="data-single form-control" name="group" placeholder="Selecione"
                                            data-allow-clear="1">
                                            <option value=""></option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="segment">Segmento</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-dark"><i
                                                    class="fas fa-arrows-alt"></i></button>
                                        </div>
                                        <select class="data-single form-control" name="segment" placeholder="Selecione"
                                            data-allow-clear="1">
                                            <option value=""></option>
                                            <option value="1">Agricultura</option>
                                            <option value="2">Pecuária</option>
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
                                    <label for="bull">Bula</label>
                                    <textarea name="bull" id="summernote"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-lg-4 col-xl-3">
                                <label for="img-n">Quant. de imagens</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-b3"><i class="fas fa-image"></i></button>
                                    </div>
                                    <select class="custom-select" id="img-n">
                                        <option value="0">Selecione</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="box img1 d-none">
                                <div class="upload-options">
                                    <h2>IMAGEM 1</h2>
                                </div>
                                <div class="js--image-preview"></div>
                                <div class="upload-options">
                                    <label>
                                        <input name="image1" type="file" class="image-upload" />
                                    </label>
                                </div>
                            </div>
                            <div class="box img2 d-none">
                                <div class="upload-options">
                                    <h2>IMAGEM 2</h2>
                                </div>
                                <div class="js--image-preview"></div>
                                <div class="upload-options">
                                    <label>
                                        <input name="image2" type="file" class="image-upload" />
                                    </label>
                                </div>
                            </div>
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
        </section>
    </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin_native.js') }}"></script>
    <script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('plugins/select2_4.0.13/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote-0.8.18/summernote.js') }}"></script>
    <script src="{{ asset('plugins/summernote-0.8.18/summernote-pt-BR.js') }}"></script>

    <script>
    $(document).ready(function() {
        active_bar('#product', '#product-manage');


        $('#summernote').summernote({
            placeholder: 'Insira a bula do produto aqui',
            tabsize: 2,
            height: 120,
            lang: 'pt-BR',
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol']],
            ]
        });

        $('#img-n').change(function(e) {
            if ($(this).val() == 1) {
                $('.img1').removeClass('d-none');
                $('.img2').removeClass('d-none').addClass('d-none');
            } else if ($(this).val() == 2) {
                $('.img1, .img2').removeClass('d-none');
            } else {
                $('.img1, .img2').removeClass('d-none').addClass('d-none');
            }

        });

        /*  UPLOAD FUNCTIONS */
        function initImageUpload(box) {
            let uploadField = box.querySelector('.image-upload');

            uploadField.addEventListener('change', getFile);

            function getFile(e) {
                let file = e.currentTarget.files[0];
                checkType(file);
            }

            function previewImage(file) {
                let thumb = box.querySelector('.js--image-preview'),
                    reader = new FileReader();

                reader.onload = function() {
                    thumb.style.backgroundImage = 'url(' + reader.result + ')';
                }
                reader.readAsDataURL(file);
                thumb.className += ' js--no-default';
            }

            function checkType(file) {
                let imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    throw 'ERRO 01';
                } else if (!file) {
                    throw 'ERRO 02';;
                } else {
                    previewImage(file);
                }
            }

        }

        var boxes = document.querySelectorAll('.box');
        for (let i = 0; i < boxes.length; i++) {
            let box = boxes[i];
            initDropEffect(box);
            initImageUpload(box);
        }

        function initDropEffect(box) {
            let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
            area = box.querySelector('.js--image-preview');
            area.addEventListener('click', fireRipple);

            function fireRipple(e) {
                area = e.currentTarget
                if (!drop) {
                    drop = document.createElement('span');
                    drop.className = 'drop';
                    this.appendChild(drop);
                }
                drop.className = 'drop';
                areaWidth = getComputedStyle(this, null).getPropertyValue("width");
                areaHeight = getComputedStyle(this, null).getPropertyValue("height");
                maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

                drop.style.width = maxDistance + 'px';
                drop.style.height = maxDistance + 'px';

                dropWidth = getComputedStyle(this, null).getPropertyValue("width");
                dropHeight = getComputedStyle(this, null).getPropertyValue("height");

                x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
                y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;

                drop.style.top = y + 'px';
                drop.style.left = x + 'px';
                drop.className += ' animate';
                e.stopPropagation();
            }

            function includeBrand() {
                window.open("" + secao + "", "_parent");
            }
        }

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