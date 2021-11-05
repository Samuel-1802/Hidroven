$(document).ready(function () {

    $("#form_fiscal").submit(function (event) {
        event.preventDefault();
        
        var n_fiscal = $("#n_fiscal").val();
        var submit_fiscal = $("#submit_fiscal").val();

        $("#form_fiscal").load("../functions/nuevo_fiscal.php", {
            n_fiscal: n_fiscal,
            submit_fiscal: submit_fiscal
        });

        location.reload();
    
    });

});