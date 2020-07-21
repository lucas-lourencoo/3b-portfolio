$(document).ready(function() {
    active_bar('#regional', '#regional-manage');

    $('form').submit(function(e) {
        $(this).valid();
    });

    /*  VALIDATION FORM   */
    $('form').validate({
        rules: {
            name: {
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