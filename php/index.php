<!-- Página home -->
<?php
$title = "Inicio";
$JS = "index.js";
include "../assets/header.php";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $cumpleaños = birthdays($conn);
}
?>

<div class="container d-flex justify-content-end">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "Bienvenido(a), " . $user['p_nombre'] . " " . $user['s_nombre'] . " " . $user['p_apellido'] . " " . $user['s_apellido'];
    }
    ?>
</div>
<br>

<div class="container-fluid row">
    <div class="container col-sm-9">
        <div>
            <h3>Home</h3>
        </div>
        <br>
        <div>
            <h3>
                Historia
            </h3>
            <p>
                La Casa Matriz del Sector Agua Potable y Saneamiento (Sector APS) fue constituida el 24 de mayo de 1990, una vez liquidado el Instituto Nacional de Obras Sanitarias, INOS. Comienza a funcionar conjuntamente con diez Empresas Hidrológicas Regionales, teniendo como responsabilidad desarrollar políticas y programas en materia de abastecimiento de Agua Potable, Recolección y Tratamiento de Aguas Servidas y Drenajes Urbanos, así como el establecimiento de directrices para la administración, operación, mantenimiento y ampliación de los sistemas atendidos por cada una de sus Filiales; regula y supervisa a las empresas hidrológicas filiales y descentralizadas. Hace cumplir la Ley Orgánica para la prestación de los servicios de agua potable y saneamiento incentiva la participación ciudadana, y desarrolla proyectos planteados por las comunidades y las Mesas Técnicas de Agua.
            </p>
        </div>
        <div>
            <h3>
                Misión
            </h3>
            <p>
                La misión de la estructura normativa que regula la administración, en el sentido más amplio, de las aguas, es la de coadyuvar al desarrollo integral y sustentable, a través de la ejecución de proyectos de investigación y acción que modifiquen y mejoren la calidad de vida dando respuesta y desarrollo al artículo 304 de la Constitución Nacional que enmarca a éste recurso natural como un bien de dominio público de la Nación, indispensable y por ende insustituible para la vida y el desarrollo. Es decir, establecer las disposiciones necesarias para garantizar la protección del vital recurso hídrico, su aprovechamiento y recuperación, respetando las fases del ciclo hidrológico y los criterios de ordenación del territorio, bajo una organización institucional capacitada para cumplir y hacer cumplir las mismas.
            </p>
        </div>
        <div>
            <h3>
                Visión
            </h3>
            <p>
                La Compañía, tiene como misión ampliar la actuación de HIDROVEN a la ejecución de proyectos en los sectores de agua potable y saneamiento, manteniendo la regulación, rectoría y supervisión de las filiales y descentralizadas.
            </p>
        </div>
    </div>


    <div class="container col-sm-3">
        <div class="row">
            <a class="twitter-timeline" data-lang="es" data-width="300" data-height="600" href="https://twitter.com/HidrovenOficial?ref_src=twsrc%5Etfw">Tweets by HidrovenOficial</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        <br>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        <div class="row">
            <div class="container">
                <h5>Cumpleaños</h5>

                <?php

                if (is_string($cumpleaños)) {
                    echo $cumpleaños;
                } else {
                    foreach ($cumpleaños as $cumpleañero) {
                        echo $cumpleañero[0] . " " . $cumpleañero[1] . " " . $cumpleañero[2] . " " . $cumpleañero[3] . "<br>";
                    }
                }

                ?>
            </div>
        </div>
        <?php }?>

    </div>

</div>
<?php
include "../assets/footer.php";
?>