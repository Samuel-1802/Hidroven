$(document).ready(function () {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate() + 1;
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate = year + '-' + month + '-' + day;
    $('#fechavac1').attr('min', minDate);

    $("#fechavac1").on('change', function () {
        var minRegreso = $("#fechavac1").val();
        $("#fechavac2").attr('min', minRegreso);
        $("#fechavac2").prop("disabled", false);
    });

    $("#form_vac").submit(function (event) {
        event.preventDefault();

        var nombre = $("#nombre").val();
        var cedula = $("#cedula").val();
        var dpto = $("#dpto").val();
        var cargo = $("#cargo").val();
        var fechaing = $("#fechaing").val();
        var salario = $("#salario").val();
        var fechavac1 = $("#fechavac1").val();
        var fechavac2 = $("#fechavac2").val();
        var submit_vac = $("#submit_vac").val();

        $("#vac").remove();

        $("#result").load("../functions/generar_vacaciones.php", {
            nombre: nombre,
            cedula: cedula,
            dpto: dpto,
            cargo: cargo,
            fechaing: fechaing,
            salario: salario,
            fechavac1: fechavac1,
            fechavac2: fechavac2,
            submit_vac: submit_vac
        });
    });
});