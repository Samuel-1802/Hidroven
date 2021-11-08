$(document).ready(function () {

    $("#solicitud").submit(function (event) {
        event.preventDefault();
        
        var fiscal = $("#fiscal").val();
        var cedula = $("#cedula").val();
        var submit_search = $("#submit_search").val();

        $("#result").load("../functions/buscar_islr.php", {
            fiscal: fiscal,
            cedula: cedula,
            submit_search: submit_search
        });
    })

});