$(document).ready(function () {

    var tooltips = document.querySelectorAll('.tt')
    tooltips.forEach(t => {
        new bootstrap.Tooltip(t)
    })

    $("#login").submit(function (event) {
        event.preventDefault();

        var Username = $("#Username").val();
        var Password = $("#Password").val();
        var submit_login = $("#submit_login").val();

        $("#result").load("../functions/auth.php", {
            Username: Username,
            Password: Password,
            submit_login: submit_login
        });
    });
});