$(document).ready(function() {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    $("#ci").on('keyup', function () {
        if ($("#ci").val() == "") {
            $("#submit_buscar").prop("disabled", true)
        }
        else {
            $("#submit_buscar").prop("disabled", false)
        }
    });

    $("#buscar").submit(function(event) {
        event.preventDefault();

        var ci = $("#ci").val();
        var submit_buscar = $("#submit_buscar").val();

        var inputs = $("#input:text");

        for (const input of inputs) {
            if (input == "") {
                input.removeClass("input-error, input-success");
                input.addClass("input-error");
            }
        }

        $("#result").load("../functions/buscar.php", {
            ci: ci,
            submit_buscar: submit_buscar
        });
    });
});