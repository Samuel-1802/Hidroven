$(document).ready(function() {
    $("login").submit(function(event) {
        event.preventDefault();

        var Username = $("#Username").val();
        var Password = $("#Password").val();
        var submit = $("#submit").val();

        $("result").load("../functions/auth.php", {
            Username: Username,
            Password: Password,
            submit: submit
        });
    });
});