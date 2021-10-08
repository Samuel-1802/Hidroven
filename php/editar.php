<!-- Función para editar usuarios -->

<!-- Página de no administradores -->
<?php
    $title = "Editar usuario";
    include "../assets/header.php";
?>

            <h6><a href="./perfil.php">← Regresar</a></h6>
            <h3>Editar usuario</h3>
            <br>

            <div class="container d-flex justify-content-center">
                <?php 
                
                    if (isset($_SESSION['confirm'])) {
                        ?>
                        <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['confirm'];
                        unset($_SESSION['confirm']);?>
                    </div>
                    <?php
                    }
                ?> 
            </div>

            <form action="./update_usuario_noadmin.php" method="POST">
                <div class="form-group">
                    <label for="n_cedula">Cédula</label>
                    <input type="text" class="form-control" id="n_cedula" name="n_cedula" placeholder="Cédula" value=<?php echo $_SESSION['cedula'];?> step="1" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="n_nombre">Nombre</label>
                    <input type="text" class="form-control" id="n_nombre" name="n_nombre" placeholder="Nombre" value="<?php echo $_SESSION['nombre'];?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="n_apellido">Apellido</label>
                    <input type="text" class="form-control" id="n_apellido" name="n_apellido" placeholder="Apellido" value="<?php echo $_SESSION['apellido'];?>" required>
                </div>
                <br>
                <label for="n_nacionalidad">Nacionalidad</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="n_nacionalidad" id="venezolano" value="Venezolano" <?php echo $_SESSION['nacionalidad'] == "Venezolano" ? "checked" : "";?>>
                    <label class="form-check-label" for="venezolano">
                        Venezolano
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="n_nacionalidad" id="extranjero" value="Extranjero" <?php echo $_SESSION['nacionalidad'] == "Extranjero" ? "checked" : "";?>>
                    <label class="form-check-label" for="exranjero">
                        Extranjero
                    </label>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="n_userid">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="n_userid" name="n_userid" placeholder="Nombre de usuario" value="<?php echo $_SESSION['userid'];?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="n_clave">Clave</label>
                    <input type="password" class="form-control" id="n_clave" name="n_clave" placeholder="Clave">
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn btn-primary">Editar</button>
            </form>

<?php
    include "../assets/footer.php";
?>