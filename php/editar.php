<!-- Función para editar usuarios -->

<!-- Página de no administradores -->
<?php
$title = "Editar usuario";
$JS = "editar.js";
include "../assets/header.php";
?>

<h6><a href="./perfil.php" class="text-decoration-none">← Regresar</a></h6>
<h3>Editar usuario</h3>

<div class="container d-flex justify-content-center" id="result"></div>

<div class="container d-flex justify-content-center">
    <form id="editar" action="../functions/actualizar_usuario_noadmin.php" method="POST">
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_nombre">Primer nombre</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="Ingrese su primer nombre">
                    <input type="text" class="form-control" id="np_nombre" name="np_nombre" placeholder="Primer nombre" value="<?php echo $user['p_nombre']; ?>" required>
                </span>
            </div>
            <div class="container">
                <label for="ns_nombre">Segundo nombre</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="Ingrese su segundo nombre">
                <input type="text" class="form-control" id="ns_nombre" name="ns_nombre" placeholder="Segundo nombre" value="<?php echo $user['s_nombre']; ?>" required>
                </span>
            </div>
        </div>
        <br>
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_apellido">Primer apellido</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="Ingrese su primer apellido">
                <input type="text" class="form-control" id="np_apellido" name="np_apellido" placeholder="Primer apellido" value="<?php echo $user['p_apellido']; ?>" required>
                </span>
            </div>
            <div class="container">
                <label for="ns_apellido">Segundo apellido</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="Ingrese su segundo apellido">
                <input type="text" class="form-control" id="ns_apellido" name="ns_apellido" placeholder="Segundo apellido" value="<?php echo $user['s_apellido']; ?>" required>
                </span>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_clave">Clave</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" title="Ingrese una clave nueva si desea cambiarla.<br>Debe cumplir con las siguientes características:<br>• Longitud entre 8 y 16 caracteres<br>• Tener al menos una letra mayúscula y una minúscula<br>• Debe contener al menos un dígito entre el 0 y el 9<br>• Debe contener al menos un caracter especial: <b>.,@$!%*?&</b>">
            <input type="password" class="form-control" id="n_clave" name="n_clave" placeholder="Clave">
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