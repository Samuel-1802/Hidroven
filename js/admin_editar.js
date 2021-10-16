$(document).ready(function() {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    $("#editar").submit(function(event) {
        
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
        var n_admin = document.querySelector('input[name="n_admin"]:checked').value;
        var n_fechanac = $("#n_fechanac").val();
        var n_fechaing = $("#n_fechaing").val();
        var n_cargo = $("#n_cargo").val();
        var n_departamento = $("#n_departamento").val();
        var userid = $("#userid").val();
        var cedula = $("#cedula").val();
        var submit_edit = $("#submit_edit").val();

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
    });
});