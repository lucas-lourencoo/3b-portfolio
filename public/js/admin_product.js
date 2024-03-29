// Preloader
$(window).on('load', function() {
    if ($('#preloader').length) {
        $('#preloader').delay(100).fadeOut('slow', function() {
            $(this).remove();
        });
    }
});
$(document).ready(function() {
    active_bar('#product', '#product-manage');

    /* RESET INPUT UPLOAD */
    $('input[name="img1"] , input[name="img"] , select[name="img_n"]').val('');

    /*  MASK INPUT   */
    $('#price').mask("#.##0,00", { reverse: true });

    /*  VALIDATION FORM   */
    $('form').validate({
        rules: {
            name: {
                required: true,
                minlength: 5,
                maxlength: 30
            },
            code: {
                required: true,
            },
            price: {
                required: true,
            },
            weight: {
                required: true,
            },
            category: {
                required: true,
            },
            brand: {
                required: true,
            },
            group: {
                required: true,
            },
            segment: {
                required: true,
            },
            description: {
                required: true,
            },
            recomend: {
                required: true,
            },
            bull: {
                required: true,
            },
            img_n: {
                required: true,
            },
            img1: {
                required: true,
            },
            img2: {
                required: true,
            },
        },
        messages: {
            name: {
                minlength: 'Insira entre 5 e 30 caracteres',
                maxlength: 'Insira entre 5 e 30 caracteres',
            },
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

    /*  SHOW IMAGE UPLOAD */
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
                valid_images();
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

    /*  VALID AND SUBMIT FORM   */
    $('form').submit(function(e) {
        valid_images();
        if ($(this).valid() && valid_images()) {
            $(this).submit();
        }
    });

    /*  VALID IMAGES */
    function valid_images() {
        var img1 = $('input[name="img1"]').val().split('.').pop().toLowerCase();
        var img2 = $('input[name="img2"]').val().split('.').pop().toLowerCase();
        $('.box-img span').remove();
        if ($('#img-n').val() == 1) {
            img1 == "" ? $('.img1').append('<span class="error-img">Selecione uma imagem</span>') : true;
        } else if ($('#img-n').val() == 2) {
            img1 == "" ? $('.img1').append('<span class="error-img">Selecione uma imagem</span>') : true;
            img2 == "" ? $('.img2').append('<span class="error-img">Selecione uma imagem</span>') : true;
        }
    }

});