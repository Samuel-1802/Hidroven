$(document).ready(function() {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    });
    
    // Verificar los documentos a subir
    // $("#reposo").submit(function (event) {
    //     event.preventDefault();

    //     var cedula = $("#cedula").val();
    //     var informe = $("#informe").val();
    //     var prescripcion = $("#prescripcion").val();
    //     var id = $("#id").val();
    //     var submit_reposo = $("#submit_reposo").val();

    //     $("#result").load("../functions/subir_reposo.php", {
    //         cedula: cedula,
    //         informe: informe,
    //         prescripcion: prescripcion,
    //         id: id,
    //         submit_reposo: submit_reposo
    //     });
    // });

});