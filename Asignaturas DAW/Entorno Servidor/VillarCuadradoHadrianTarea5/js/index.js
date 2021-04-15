$(document).ready(function () {
    $("#montecastelo").click(function () {
        $('.login_form').toggle(function () { });
        $('.regist_form').toggle(function () { });
    });

    $('#montecastelo').hover(
        function () { $(this).addClass('animate__animated animate__heartBeat') },
        function () { $(this).removeClass('animate__animated animate__heartBeat') }
    )

    $('input[type=radio][name=sesion]').change(function() {
        if (this.value == '0') {
            $('#control_tiempo').show();
        }
        else if (this.value == '1') {
            $('#control_tiempo').hide();
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

});