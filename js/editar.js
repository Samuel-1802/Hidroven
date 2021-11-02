$(document).ready(function () {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

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

        var np_nombre = $("#np_nombre").val();
        var ns_nombre = $("#ns_nombre").val();
        var np_apellido = $("#np_apellido").val();
        var ns_apellido = $("#ns_apellido").val();
        var n_clave = $("#n_clave").val();
        var confirm_clave = $("#confirm_clave").val();
        var submit_edit = $("#submit_edit").val();
        var userid = $("#userid").val();
        var cedula = $("#cedula").val();

        var inputs = $("#input:text").not($("#np_nombre, #np_apellido"));

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
                submit_edit: submit_edit
            });

            $("#n_clave").addClass("input-error");
            $("#confirm_clave").addClass("input-error");

        } else if ((n_clave == "" && confirm_clave == "") || (n_clave == confirm_clave)) {
            $("#result").load("../functions/actualizar_usuario_noadmin.php", {
                np_nombre: np_nombre,
                ns_nombre: ns_nombre,
                np_apellido: np_apellido,
                ns_apellido: ns_apellido,
                n_clave: n_clave,
                submit_edit: submit_edit,
                userid: userid,
                cedula: cedula
            });
        }
    });
});