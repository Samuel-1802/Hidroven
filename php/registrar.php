<?php
$title = "Registrar Usuarios";
$JS = "registrar.js";
include "../assets/header.php";
?>

<h3>Registrar usuarios</h3>

<div class="container d-flex justify-content-center" id="result"></div>

<div class="container d-flex justify-content-center">
    <form id="registrar" action="../functions/nuevo_usuario.php" method="POST">
        <div class="form-group container">
            <label for="n_cedula">Cédula</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese la cédula del usuario<br>• Debe contener solo dígitos, sin puntos<br>• Debe tener una longitud máxima de 8 caracteres">
                <input type="text" class="form-control" id="n_cedula" name="n_cedula" placeholder="Cédula" required>
            </span>
        </div>
        <br>
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_nombre">Primer nombre</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el primer nombre del usuario">
                    <input type="text" class="form-control" id="np_nombre" name="np_nombre" placeholder="Primer nombre" required>
                </span>
            </div>
            <div class="container">
                <label for="ns_nombre">Segundo nombre</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el segundo nombre del usuario">
                    <input type="text" class="form-control" id="ns_nombre" name="ns_nombre" placeholder="Segundo nombre">
                </span>
            </div>
        </div>
        <br>
        <div class="form-group d-flex justify-content-around">
            <div class="container">
                <label for="np_apellido">Primer apellido</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el primer apellido del usuario">
                    <input type="text" class="form-control" id="np_apellido" name="np_apellido" placeholder="Primer apellido" required>
                </span>
            </div>
            <div class="container">
                <label for="ns_apellido">Segundo apellido</label>
                <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el segundo apellido del usuario">
                    <input type="text" class="form-control" id="ns_apellido" name="ns_apellido" placeholder="Segundo apellido">
                </span>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <div>
                <label for="n_nacionalidad">Nacionalidad</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_nacionalidad" id="venezolano" value="1">
                <label class="form-check-label" for="venezolano">
                    Venezolano
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_nacionalidad" id="extranjero" value="0">
                <label class="form-check-label" for="exranjero">
                    Extranjero
                </label>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_userid">Nombre de Usuario</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese el nombre de usuario.<br>Debe cumplir con las siguientes características:<br>• Solo puede tener caracteres alfabéticos<br>• Debe tener una longitud entre 3 y 12 caracteres">
                <input type="text" class="form-control" id="n_userid" name="n_userid" placeholder="Nombre de usuario" required>
            </span>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_clave">Clave</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Ingrese la clave.<br>Debe cumplir con las siguientes características:<br>• Longitud entre 8 y 16 caracteres<br>• Tener al menos una letra mayúscula y una minúscula<br>• Debe contener al menos un dígito entre el 0 y el 9<br>• Debe contener al menos un caracter especial: <b>.,@$!%*?&</b>">
                <input type="password" class="form-control" id="n_clave" name="n_clave" placeholder="Clave" required>
            </span>
        </div>
        <br>
        <div class="form-group container">
            <div>
                <label for="n_admin">Tipo de usuario</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_admin" id="admin" value="1">
                <label class="form-check-label" for="admin">
                    Administrador
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="n_admin" id="noadmin" value="0">
                <label class="form-check-label" for="exranjero">
                    No Administrador
                </label>
            </div>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_fechanac">Fecha de nacimiento</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Fecha de nacimiento del usuario">
                <input type="date" class="form-control" id="n_fechanac" name="n_fechanac" placeholder="dd-mm-aaaa" required>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_fechanac">Fecha de ingreso</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Fecha de ingreso del usuario a la institución">
                <input type="date" class="form-control" id="n_fechaing" name="n_fechaing" placeholder="dd-mm-aaaa" required>
            </span>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_cargo">Cargo</label>
            <span class="tt" data-toggle="tooltip" data-bs-placement="right" data-bs-html="true" data-bs-trigger="hover" title="Cargo del usuario">
                <input type="text" class="form-control" id="n_cargo" name="n_cargo" placeholder="Cargo" required>
            </span>
        </div>
        <br>
        <div class="form-group container">
            <label for="n_departamento">Departamento</label>
            <select class="form-select" id="n_departamento" name="n_departamento" ria-label="Default select example" required>
                <option value="01">Junta Directiva</option>
                <option value="02">Auditoría Interna</option>
                <option value="03">Presidencia</option>
                <option value="04">Gerencia General de Seguridad Integral</option>
                <option value="05">Viceprecidencia de Gestión Administrativa</option>
                <option value="06">Viceprecidencia de Servicios Hidrológicos</option>
                <option value="07">Gerencia General de Administración</option>
                <option value="08">Gerencia General de Comercialización</option>
                <option value="09">Gerencia General de Talento Humano</option>
                <option value="10">Consultoría Jurídica</option>
                <option value="11">Gerencia General de Seguimiento</option>
                <option value="12">Gerencia General de Imagen y Comunicaciones</option>
                <option value="13">Gerencia General de Protección al Patrimonio</option>
                <option value="14">Gerencia General de Tecnología de la Información</option>
                <option value="15">Gerencia General de Planificación y Presupuesto</option>
                <option value="16">Gerencia General de Planificación de Proyecto</option>
                <option value="17">Gerencia General de Tratamiento, Operaciones y Mantenimiento</option>
                <option value="18">Gerencia General de Fortalecimiento del Poder Popular</option>
            </select>
        </div>
        <div class="container">
            <button id="submit_registro" name="submit_registro" type="submit" class="btn btn btn-primary my-3">Agregar</button>
        </div>
    </form>
</div>

<?php
include "../assets/footer.php";
?>