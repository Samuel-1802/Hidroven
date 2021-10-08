<!-- Perfil de usuarios -->

<?php
    $title = "Perfil";
    include "../assets/header.php";
?>

            <h3>Perfil de usuario</h3>

            <table class="table">
                
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $_SESSION['nombre'] .' ' .$_SESSION['apellido']; ?></td>
                </tr>
                <tr>
                    <th>Cedula</th>
                    <td><?php echo $_SESSION['cedula']; ?></td>
                </tr>
                <tr>
                    <th>Nacionalidad</th>
                    <td><?php echo $_SESSION['nacionalidad']; ?></td>
                </tr>
                <tr>
                    <th>Nombre de usuario</th>
                    <td><?php echo $_SESSION['userid']; ?></td>
                </tr>
                
            </table>

            <form action="./editar.php" method="POST">
                <button type="submit" class="btn btn btn-primary mb-2">Editar</button>
            </form>

        </div>
        
<?php
    include "../assets/footer.php";
?>