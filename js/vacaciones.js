$(document).ready(function () {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    var today = new Date();
    var vacdate = new Date();
    vacdate.setDate(vacdate.getDate() + 7);

    var entry = new Date($("#fechaing").val());

    var timediff = Math.floor((today.getTime() - entry.getTime()) / (1000 * 3600 * 24 * 365));

    if (timediff > 1) {
        $("#vac").remove();
        $("#result").append("<div class='alert alert-info text-center' role='alert'>Usted ha laborado menos de un año dentro de la empresa, por lo tanto no califica para solicitar vacaciones.</div>")
    } else {

        var month = vacdate.getMonth() + 1;
        var day = vacdate.getDate();
        var year = vacdate.getFullYear();

        vacdate.setDate(vacdate.getDate() + 1);

        var month2 = vacdate.getMonth() + 1;
        var day2 = vacdate.getDate();
        var year2 = vacdate.getFullYear();

        var addDays = 15;
        var count = 0;

        while (count < addDays) {

            if (vacdate.getDay() != 0 && vacdate.getDay() != 6) {
                
                count++;
            }
            vacdate.setDate(vacdate.getDate() + 1);
        }

        var month3 = vacdate.getMonth() + 1;
        var day3 = vacdate.getDate();
        var year3 = vacdate.getFullYear();

        count = 0;
        addDays = timediff - 1;

        while (count < addDays) {

            if (vacdate.getDay() != 0 && vacdate.getDay() != 6) {
                count++;
            }
            vacdate.setDate(vacdate.getDate() + 1);
        }

        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        if (month2 < 10)
            month2 = '0' + month.toString();
        if (day2 < 10)
            day2 = '0' + day.toString();
        if (month3 < 10)
            month3 = '0' + month.toString();
        if (day3 < 10)
            day3 = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;
        var minDate2 = year2 + '-' + month2 + '-' + day2;
        var maxDate = year3 + '-' + month3 + '-' + day3;
        
        $('#fechavac1').attr('min', minDate);

        $("#fechavac1").on('change', function () {
            $("#fechavac2").attr('min', minDate2);
            $('#fechavac2').attr('max', maxDate);
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
    }
});