<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Ingreso</title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>  
    <body>
    <?php 

    echo "Login";

    ?>

    <form class="form" id="loginForm" action="./index.php" method="POST">
        <div class="form-group">
            <label for="usernameInput"> Username </label>
            <input type="text" id="usernameInput" name="username" required/>
        </div>
        <div class="form-group">
            <label for="passwordInput"> Password </label>
            <input type="password" id="passwordInput" name="pass" required />
        </div>
        <button type="submit" class="btn" id="loginBtn" name="submit"> Log in </button>
    </form>

    </body>
</html>