<!-- Función para editar usuarios -->

<!-- Página de Administración -->

<?php
$title = "Editar Usuario";
include "../assets/header.php";
?>

<h6><a href="./admin.php" class="text-decoration-none">← Regresar</a></h6>
<h3>Editar usuario</h3>

<?php
include "../assets/alert.php";
?>

<div class="container d-flex justify-content-center">
    <form action="../functions/actualizar_usuario_noadmin.php" method="POST">
        <div class="form-group container">
            <label for="n_cedula">Cédula</label>
            <input type="text" class="form-control" id="n_cedula" name="n_cedula" placeholder="Cédula" value="<?php echo $user['cedula']; ?>" required>
        </div>
        <br>
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_nombre">Primer nombre</label>
                <input type="text" class="form-control" id="np_nombre" name="np_nombre" placeholder="Primer nombre" value="<?php echo $user['p_nombre']; ?>" required>
            </div>
            <div class="container">
                <label for="ns_nombre">Segundo nombre</label>
                <input type="text" class="form-control" id="ns_nombre" name="ns_nombre" placeholder="Segundo nombre" value="<?php echo $user['s_nombre']; ?>" required>
            </div>
        </div>
        <br>
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_apellido">Primer apellido</label>
                <input type="text" class="form-control" id="np_apellido" name="np_apellido" placeholder="Primer apellido" value="<?php echo $user['p_apellido']; ?>" required>
            </div>
            <div class="container">
                <label for="ns_apellido">Segundo apellido</label>
                <input type="text" class="form-control" id="ns_apellido" name="ns_apellido" placeholder="Segundo apellido" value="<?php echo $user['s_apellido']; ?>" required>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <div>
                <label for="n_nacionalidad">Nacionalidad</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_nacionalidad" id="venezolano" value="1" <?php echo $user['nacionalidad'] == 1 ? "checked" : ""; ?>>
                <label class="form-check-label" for="venezolano">
                    Venezolano
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_nacionalidad" id="extranjero" value="0" <?php echo $user['nacionalidad'] == 0 ? "checked" : ""; ?>>
                <label class="form-check-label" for="exranjero">
                    Extranjero
                </label>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_userid">Nombre de Usuario</label>
            <input type="text" class="form-control" id="n_userid" name="n_userid" placeholder="Nombre de usuario" value="<?php echo $user['userid']; ?>" required>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_clave">Clave</label>
            <input type="password" class="form-control" id="n_clave" name="n_clave" placeholder="Clave">
        </div>
        <br>
        <div class="form-group container">
            <div>
                <label for="n_admin">Tipo de usuario</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_admin" id="admin" value="1" <?php echo $user['admin'] == 1 ? "checked" : ""; ?>>
                <label class="form-check-label" for="admin">
                    Administrador
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_admin" id="noadmin" value="0" <?php echo $user['admin'] == 0 ? "checked" : ""; ?>>
                <label class="form-check-label" for="exranjero">
                    No Administrador
                </label>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_fechanac">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="n_fechanac" name="n_fechanac" placeholder="dd-mm-aaaa" value="<?php echo $user['fecha_nac'] ?>">
        </div>
        <br>
        <div class="form-group container">
            <label for="n_fechanac">Fecha de ingreso</label>
            <input type="date" class="form-control" id="n_fechaing" name="n_fechaing" placeholder="dd-mm-aaaa" value="<?php echo $user['fecha_ing'] ?>">
        </div>
        <br>
        <div class="form-group container">
            <label for="n_cargo">Cargo</label>
            <input type="text" class="form-control" id="n_cargo" name="n_cargo" placeholder="Cargo" value="<?php echo $user['cargo']; ?>" required>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_departamento">Departamento</label>
            <select class="form-select" id="n_departamento" name="n_departamento" ria-label="Default select example" required>
                <option value="01" <?php echo ($user['dpto'] == "01" ? "selected" : ""); ?>>Junta Directiva</option>
                <option value="02" <?php echo ($user['dpto'] == "02" ? "selected" : ""); ?>>Auditoría Interna</option>
                <option value="03" <?php echo ($user['dpto'] == "03" ? "selected" : ""); ?>>Presidencia</option>
                <option value="04" <?php echo ($user['dpto'] == "04" ? "selected" : ""); ?>>Gerencia General de Seguridad Integral</option>
                <option value="05" <?php echo ($user['dpto'] == "05" ? "selected" : ""); ?>>Viceprecidencia de Gestión Administrativa</option>
                <option value="06" <?php echo ($user['dpto'] == "06" ? "selected" : ""); ?>>Viceprecidencia de Servicios Hidrológicos</option>
                <option value="07" <?php echo ($user['dpto'] == "07" ? "selected" : ""); ?>>Gerencia General de Administración</option>
                <option value="08" <?php echo ($user['dpto'] == "08" ? "selected" : ""); ?>>Gerencia General de Comercialización</option>
                <option value="09" <?php echo ($user['dpto'] == "09" ? "selected" : ""); ?>>Gerencia General de Talento Humano</option>
                <option value="10" <?php echo ($user['dpto'] == "10" ? "selected" : ""); ?>>Consultoría Jurídica</option>
                <option value="11" <?php echo ($user['dpto'] == "11" ? "selected" : ""); ?>>Gerencia General de Seguimiento</option>
                <option value="12" <?php echo ($user['dpto'] == "12" ? "selected" : ""); ?>>Gerencia General de Imagen y Comunicaciones</option>
                <option value="13" <?php echo ($user['dpto'] == "13" ? "selected" : ""); ?>>Gerencia General de Protección al Patrimonio</option>
                <option value="14" <?php echo ($user['dpto'] == "14" ? "selected" : ""); ?>>Gerencia General de Tecnología de la Información</option>
                <option value="15" <?php echo ($user['dpto'] == "15" ? "selected" : ""); ?>>Gerencia General de Planificación y Presupuesto</option>
                <option value="16" <?php echo ($user['dpto'] == "16" ? "selected" : ""); ?>>Gerencia General de Planificación de Proyecto</option>
                <option value="17" <?php echo ($user['dpto'] == "17" ? "selected" : ""); ?>>Gerencia General de Tratamiento, Operaciones y Mantenimiento</option>
                <option value="18" <?php echo ($user['dpto'] == "18" ? "selected" : ""); ?>>Gerencia General de Fortalecimiento del Poder Popular</option>
            </select>
        </div>
        <div class="form-group container">
            <input type="hidden" id="userid" name="userid" value="<?php echo $user['userid']; ?>">
            <input type="hidden" id="cedula" name="cedula" value="<?php echo $user['cedula']; ?>">
        </div>
        <div class="container">
            <button type="submit" class="btn btn btn-primary my-3">Editar</button>
        </div>
    </form>
</div>

<?php
include "../assets/footer.php";
?>