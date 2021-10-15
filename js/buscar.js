$(document).ready(function() {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    $("#buscar").submit(function(event) {
        event.preventDefault();

        var ci = $("#ci").val();
        var submit_buscar = $("#submit_buscar").val();

        $("#result").load("../functions/buscar.php", {
            ci: ci,
            submit_buscar: submit_buscar
        });
    });
});