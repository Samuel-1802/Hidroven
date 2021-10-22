$(document).ready(function() {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    });
    
    // Verificar los documentos a subir
    $("#reposo").submit(function (event) {
        event.preventDefault();

        var cedula = $("#cedula").prop('files')[0];
        var informe = $("#informe").prop('files')[0];
        var prescripcion = $("#prescripcion").prop('files')[0];
        var id = $("#id").val();
        var submit_reposo = $("#submit_reposo").val();
        var formData = new FormData();

        formData.append("cedula", cedula);
        formData.append("informe", informe);
        formData.append("prescripcion", prescripcion);
        formData.append("id", id);
        formData.append("submit_reposo", submit_reposo);

        $.ajax({
            url: "../functions/subir_reposo.php",
            type: "POST",
            dataType: "script",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,

            success: function() {
                $("#result").load("../assets/alert.php", {});
                $("#reposo").remove();
            }
        });
    });
});