$(document).ready(function () {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    $("#editar").submit(function (event) {
        event.preventDefault();

        var np_nombre = $("#np_nombre").val();
        var ns_nombre = $("#ns_nombre").val();
        var np_apellido = $("#np_apellido").val();
        var ns_apellido = $("#ns_apellido").val();
        var n_clave = $("#n_clave").val();
        var submit_edit = $("#submit_edit").val();
        var userid = $("#userid").val();
        var cedula = $("#cedula").val();

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
    });
});