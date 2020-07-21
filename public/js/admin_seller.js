// Preloader
$(window).on('load', function() {
    if ($('#preloader').length) {
        $('#preloader').delay(100).fadeOut('slow', function() {
            $(this).remove();
        });
    }
});

$(document).ready(function() {
    active_bar('#seller', '#seller-manage');


    /* RESET INPUT UPLOAD */
    $('input[name="profile"]').val('');


    /*  INITIALIZE MASK INPUT */
    $('#celphone').mask('(00) 00000-0000', {
        placeholder: "(__) _____-____"
    });

    /*  INITIALIZE INPUTS SELECT2 */
    $('.data-single').each(function() {
        $(this).select2({
            theme: 'bootstrap4',
            width: 'style',
            placeholder: $(this).attr('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    });

    /*  SUBMIT FORM  */
    $('form').submit(function(e) {
        valid_images();
        if ($(this).valid() && valid_images()) {
            $(this).submit();
        }
    });

    /*  VALID IMAGES */
    function valid_images() {
        var profile = $('input[name="profile"]').val().split('.').pop().toLowerCase();
        $('.box-profile span').remove();
        profile == "" ? $('.box-profile').append('<span class="error-img">Selecione uma imagem de perfil</span>') : true;
    }

    /*  VALIDATION FORM   */
    $('form').validate({
        rules: {
            salesman: {
                required: true,
                minlength: 5,
                maxlength: 30
            },
            celphone: {
                required: true,
                minlength: 15
            },
            email: {
                required: true,
            },
            profile: {
                required: true,
            },
            regional: {
                required: true,
            }
        },
        messages: {
            salesman: {
                minlength: 'Insira entre 5 e 30 caracteres',
                maxlength: 'Insira entre 5 e 30 caracteres',
            },
            celphone: {
                minlength: 'Insira um número válido'
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
            valid_images();
        }

    }

    var boxes = document.querySelectorAll('.box-profile');
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

});