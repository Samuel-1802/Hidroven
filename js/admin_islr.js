$(document).ready(function () {

    $("#form_islr").submit(function (event) {
        event.preventDefault();
        
        var usuario = $("#usuario").val();
        var ingreso = $("#ingreso").val();
        var deduc = $("#deduc").val();
        var submit_islr = $("#submit_islr").val();

        $("#result").load("../functions/subir_islr.php", {
            usuario: usuario,
            ingreso: ingreso,
            deduc: deduc,
            submit_islr: submit_islr
        });
    
    });

});