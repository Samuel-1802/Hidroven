$(document).ready(function () {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear() - 18;
    var year2 = dtToday.getFullYear();

    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#n_fechanac').attr('max', maxDate);

    var maxDate2 = year2 + '-' + month + '-' + day;
    $('#n_fechaing').attr('max', maxDate2);

    $("#n_clave").on('keyup', function () {
        if ($("#n_clave").val() == "") {
            $("#confirm_clave").prop("disabled", true)
        }
        else {
            $("#confirm_clave").prop("disabled", false)
        }
    });

    $("#editar").submit(function (event) {

        event.preventDefault();

        window.scrollTo(0, 0);

        var n_cedula = $("#n_cedula").val();
        var np_nombre = $("#np_nombre").val();
        var ns_nombre = $("#ns_nombre").val();
        var np_apellido = $("#np_apellido").val();
        var ns_apellido = $("#ns_apellido").val();
        var n_nacionalidad = document.querySelector('input[name="n_nacionalidad"]:checked').value;
        var n_userid = $("#n_userid").val();
        var n_clave = $("#n_clave").val();
        var confirm_clave = $("#confirm_clave").val();
        var n_admin = document.querySelector('input[name="n_admin"]:checked').value;
        var n_fechanac = $("#n_fechanac").val();
        var n_fechaing = $("#n_fechaing").val();
        var n_cargo = $("#n_cargo").val();
        var n_departamento = $("#n_departamento").val();
        var userid = $("#userid").val();
        var cedula = $("#cedula").val();
        var submit_edit = $("#submit_edit").val();

        var inputs = $("#input", "#select").not($("#np_nombre, #np_apellido"));

        for (const input of inputs) {
            if (input == "") {
                input.removeClass("input-error, input-success");
                input.addClass("input-error");
            }
        }

        if ((n_clave !== "" && confirm_clave == "") || (n_clave !== confirm_clave)) {
            $("#result").load("../functions/confirm_pass.php", {
                n_clave: n_clave,
                confirm_clave: confirm_clave,
                submit_registro: submit_registro
            });

            $("#n_clave").addClass("input-error");
            $("#confirm_clave").addClass("input-error");

        } else if ((n_clave == "" && confirm_clave == "") || (n_clave == confirm_clave)) {

            var form = document.getElementById("editar");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].readOnly = true;
            }

            $("#submit_edit").prop("disabled",true);
            $("#n_departamento").prop("disabled",true);
            $(':radio:not(:checked)').attr('disabled', true);

            $("#result").load("../functions/actualizar_usuario.php", {
                n_cedula: n_cedula,
                np_nombre: np_nombre,
                ns_nombre: ns_nombre,
                np_apellido: np_apellido,
                ns_apellido: ns_apellido,
                n_nacionalidad: n_nacionalidad,
                n_userid: n_userid,
                n_clave: n_clave,
                n_admin: n_admin,
                n_fechanac: n_fechanac,
                n_fechaing: n_fechaing,
                n_cargo: n_cargo,
                n_departamento: n_departamento,
                userid: userid,
                cedula: cedula,
                submit_edit: submit_edit
            });
        }
    });
});