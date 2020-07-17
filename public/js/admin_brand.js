$(document).ready(function() {
    active_bar('#brand', '#brand-manage');

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
            brand: {
                required: true,
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

});