$(document).ready(function () {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    });

    $("#form_constancia").submit(function (event) {
        event.preventDefault();

        var nombre = $("#nombre").val();
        var cedula = $("#cedula").val();
        var dpto = $("#dpto").val();
        var cargo = $("#cargo").val();
        var fechaing = $("#fechaing").val();
        var salario = $("#salario").val();
        var submit_const = $("#submit_const").val();

        $("#const_text").remove();
        $("#constancia").remove();

        $("#result").load("../functions/generar_constancia.php", {
            nombre: nombre,
            cedula: cedula,
            dpto: dpto,
            cargo: cargo,
            fechaing: fechaing,
            salario: salario,
            submit_const: submit_const
        });
    });
});