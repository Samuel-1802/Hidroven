$(document).ready(function () {

    $("#form_recibo").submit(function (event) {
        event.preventDefault();
        
        var usuario = $("#usuario").val();
        var ingreso = $("#ingreso").val();
        var sso = $("#sso").val();
        var lrpe = $("#lrpe").val();
        var faov = $("#faov").val();
        var mes = $("#mes").val();
        var submit_recibo = $("#submit_recibo").val();

        $("#result").load("../functions/subir_recibo.php", {
            usuario: usuario,
            ingreso: ingreso,
            sso: sso,
            lrpe: lrpe,
            faov: faov,
            mes: mes,
            submit_recibo: submit_recibo
        });
    
    });

});