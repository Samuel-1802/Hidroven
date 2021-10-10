<!-- Función para editar usuarios -->

<!-- Página de no administradores -->
<?php
    $title = "Editar usuario";
    include "../assets/header.php";
?>

            <h6><a href="./perfil.php" class="text-decoration-none">← Regresar</a></h6>
            <h3>Editar usuario</h3>
            <br>

            <div class="container d-flex justify-content-center">
                <?php 
                
                    include_once "../assets/alert.php";
                ?> 
            </div>

            <div class="container d-flex justify-content-center">
            <form action="./update_usuario_noadmin.php" method="POST">
                <div class="form-group container">
                    <label for="n_cedula">Cédula</label>
                    <input type="text" class="form-control" id="n_cedula" name="n_cedula" placeholder="Cédula" value=<?php echo $user['cedula'];?> step="1" required>
                </div>
                <br>
                <div class="form-group d-flex justify-content-around">
                    <div class="container">
                    <label for="n_nombre">Primer nombre</label>
                    <input type="text" class="form-control" id="np_nombre" name="n_nombre" placeholder="Nombre" value="<?php echo $user['p_nombre'];?>" required>
                    </div>
                    <div class="container">
                    <label for="n_nombre">Segundo nombre</label>
                    <input type="text" class="form-control" id="ns_nombre" name="n_nombre" placeholder="Nombre" value="<?php echo $user['s_nombre'];?>" required>
                    </div>
                </div>
                <br>
                <div class="form-group d-flex justify-content-around">
                    <div class="container">
                    <label for="n_apellido">Primer apellido</label>
                    <input type="text" class="form-control" id="np_apellido" name="n_apellido" placeholder="Apellido" value="<?php echo $user['p_apellido'];?>" required>
                    </div>
                    <div class="container">
                    <label for="n_apellido">Segundo apellido</label>
                    <input type="text" class="form-control" id="ns_apellido" name="n_apellido" placeholder="Apellido" value="<?php echo $user['s_apellido'];?>" required>
                    </div>
                </div>
                <br>
                <div class="form-group container">
                    <div>
                <label for="n_nacionalidad">Nacionalidad</label>
</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="n_nacionalidad" id="venezolano" value="Venezolano" <?php echo $user['nacionalidad'] == 1 ? "checked" : "";?>>
                    <label class="form-check-label" for="venezolano">
                        Venezolano
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="n_nacionalidad" id="extranjero" value="Extranjero" <?php echo $user['nacionalidad'] == 0 ? "checked" : "";?>>
                    <label class="form-check-label" for="exranjero">
                        Extranjero
                    </label>
                </div>
</div>
                <br>
                <div class="form-group container">
                    <label for="n_userid">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="n_userid" name="n_userid" placeholder="Nombre de usuario" value="<?php echo $user['userid'];?>" required>
                </div>
                <br>
                <div class="form-group container">
                    <label for="n_clave">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="n_clave" name="n_clave" placeholder="dd-mm-yyyy" value="<?php echo $user['fecha_nac']?>">
                </div>
                <button type="submit" class="btn btn btn-primary my-3">Editar</button>
            </form>
            </div>
<?php
    include "../assets/footer.php";
?>