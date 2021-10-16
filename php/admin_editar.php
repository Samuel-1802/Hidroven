<!-- Función para editar usuarios -->

<!-- Página de Administración -->

<?php
$title = "Editar Usuario";
$JS = "admin_editar.js";
include "../assets/header.php";

$edit = fetch_user($conn, $_SESSION['search_userid']);
?>

<h6><a href="./buscar.php" class="text-decoration-none">← Regresar</a></h6>
<h3>Editar usuario</h3>

<br>

<div class="container d-flex justify-content-center" id="result"></div>

<div class="container d-flex justify-content-center">
    <form id="editar" action="../functions/actualizar_usuario.php" method="POST">
        <div class="form-group container">
            <label for="n_cedula">Cédula</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese la cédula del usuario<br>• Debe contener solo dígitos, sin puntos<br>• Debe tener una longitud máxima de 8 caracteres">
                <input type="text" class="form-control" id="n_cedula" name="n_cedula" placeholder="Cédula" value="<?php echo $edit['cedula']; ?>" required>
            </span>
        </div>
        <br>
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_nombre">Primer nombre</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el primer nombre del usuario">
                    <input type="text" class="form-control" id="np_nombre" name="np_nombre" placeholder="Primer nombre" value="<?php echo $edit['p_nombre']; ?>" required>
                </span>
            </div>
            <div class="container">
                <label for="ns_nombre">Segundo nombre</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el segundo nombre del usuario">
                    <input type="text" class="form-control" id="ns_nombre" name="ns_nombre" placeholder="Segundo nombre" value="<?php echo $edit['s_nombre']; ?>">
                </span>
            </div>
        </div>
        <br>
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_apellido">Primer apellido</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el primer apellido del usuario">
                    <input type="text" class="form-control" id="np_apellido" name="np_apellido" placeholder="Primer apellido" value="<?php echo $edit['p_apellido']; ?>" required>
                </span>
            </div>
            <div class="container">
                <label for="ns_apellido">Segundo apellido</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el segundo apellido del usuario">
                    <input type="text" class="form-control" id="ns_apellido" name="ns_apellido" placeholder="Segundo apellido" value="<?php echo $edit['s_apellido']; ?>">
                </span>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <div>
                <label for="n_nacionalidad">Nacionalidad</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_nacionalidad" id="venezolano" value="1" <?php echo $edit['nacionalidad'] == 1 ? "checked" : ""; ?>>
                <label class="form-check-label" for="venezolano">
                    Venezolano
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_nacionalidad" id="extranjero" value="0" <?php echo $edit['nacionalidad'] == 0 ? "checked" : ""; ?>>
                <label class="form-check-label" for="exranjero">
                    Extranjero
                </label>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_userid">Nombre de Usuario</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el nombre de usuario.<br>Debe cumplir con las siguientes características:<br>• Solo puede tener caracteres alfabéticos<br>• Debe tener una longitud entre 3 y 12 caracteres">
                <input type="text" class="form-control" id="n_userid" name="n_userid" placeholder="Nombre de usuario" value="<?php echo $edit['userid']; ?>" required>
            </span>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_clave">Clave</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese la clave.<br>Debe cumplir con las siguientes características:<br>• Longitud entre 8 y 16 caracteres<br>• Tener al menos una letra mayúscula y una minúscula<br>• Debe contener al menos un dígito entre el 0 y el 9<br>• Debe contener al menos un caracter especial: <b>.,@$!%*?&</b>">
                <input type="password" class="form-control" id="n_clave" name="n_clave" placeholder="Clave">
            </span>
        </div>
        <br>
        <div class="form-group container">
            <div>
                <label for="n_admin">Tipo de usuario</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_admin" id="admin" value="1" <?php echo $edit['admin'] == 1 ? "checked" : ""; ?>>
                <label class="form-check-label" for="admin">
                    Administrador
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_admin" id="noadmin" value="0" <?php echo $edit['admin'] == 0 ? "checked" : ""; ?>>
                <label class="form-check-label" for="exranjero">
                    No Administrador
                </label>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_fechanac">Fecha de nacimiento</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Fecha de nacimiento del usuario">
                <input type="date" class="form-control" id="n_fechanac" name="n_fechanac" placeholder="dd-mm-aaaa" value="<?php echo $edit['fecha_nac'] ?>">
            </span>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_fechanac">Fecha de ingreso</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Fecha de ingreso del usuario a la institución">
                <input type="date" class="form-control" id="n_fechaing" name="n_fechaing" placeholder="dd-mm-aaaa" value="<?php echo $edit['fecha_ing'] ?>">
            </span>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_cargo">Cargo</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Cargo del usuario">
                <input type="text" class="form-control" id="n_cargo" name="n_cargo" placeholder="Cargo" value="<?php echo $edit['cargo']; ?>" required>
            </span>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_departamento">Departamento</label>
            <select class="form-select" id="n_departamento" name="n_departamento" ria-label="Default select example" required>
                <option value="01" <?php echo ($edit['dpto'] == "01" ? "selected" : ""); ?>>Junta Directiva</option>
                <option value="02" <?php echo ($edit['dpto'] == "02" ? "selected" : ""); ?>>Auditoría Interna</option>
                <option value="03" <?php echo ($edit['dpto'] == "03" ? "selected" : ""); ?>>Presidencia</option>
                <option value="04" <?php echo ($edit['dpto'] == "04" ? "selected" : ""); ?>>Gerencia General de Seguridad Integral</option>
                <option value="05" <?php echo ($edit['dpto'] == "05" ? "selected" : ""); ?>>Viceprecidencia de Gestión Administrativa</option>
                <option value="06" <?php echo ($edit['dpto'] == "06" ? "selected" : ""); ?>>Viceprecidencia de Servicios Hidrológicos</option>
                <option value="07" <?php echo ($edit['dpto'] == "07" ? "selected" : ""); ?>>Gerencia General de Administración</option>
                <option value="08" <?php echo ($edit['dpto'] == "08" ? "selected" : ""); ?>>Gerencia General de Comercialización</option>
                <option value="09" <?php echo ($edit['dpto'] == "09" ? "selected" : ""); ?>>Gerencia General de Talento Humano</option>
                <option value="10" <?php echo ($edit['dpto'] == "10" ? "selected" : ""); ?>>Consultoría Jurídica</option>
                <option value="11" <?php echo ($edit['dpto'] == "11" ? "selected" : ""); ?>>Gerencia General de Seguimiento</option>
                <option value="12" <?php echo ($edit['dpto'] == "12" ? "selected" : ""); ?>>Gerencia General de Imagen y Comunicaciones</option>
                <option value="13" <?php echo ($edit['dpto'] == "13" ? "selected" : ""); ?>>Gerencia General de Protección al Patrimonio</option>
                <option value="14" <?php echo ($edit['dpto'] == "14" ? "selected" : ""); ?>>Gerencia General de Tecnología de la Información</option>
                <option value="15" <?php echo ($edit['dpto'] == "15" ? "selected" : ""); ?>>Gerencia General de Planificación y Presupuesto</option>
                <option value="16" <?php echo ($edit['dpto'] == "16" ? "selected" : ""); ?>>Gerencia General de Planificación de Proyecto</option>
                <option value="17" <?php echo ($edit['dpto'] == "17" ? "selected" : ""); ?>>Gerencia General de Tratamiento, Operaciones y Mantenimiento</option>
                <option value="18" <?php echo ($edit['dpto'] == "18" ? "selected" : ""); ?>>Gerencia General de Fortalecimiento del Poder Popular</option>
            </select>
        </div>
        <div class="form-group container">
            <input type="hidden" id="userid" name="userid" value="<?php echo $edit['userid']; ?>">
            <input type="hidden" id="cedula" name="cedula" value="<?php echo $edit['cedula']; ?>">
        </div>
        <div class="container">
            <button id="submit_edit" name="submit_edit" type="submit" class="btn btn btn-primary my-3">Editar</button>
        </div>
    </form>
</div>

<?php
include "../assets/footer.php";
?>