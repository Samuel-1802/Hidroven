<!-- Perfil de usuarios -->

<?php
    session_start();
    include_once './connection.php';
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Ingreso</title>
        <script src="../js/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="icon" type="image/png" href="../img/favicon.png"/>
    </head>

    <body>

        <?php
            include "../assets/header.php";
        ?>

        <div class="container-fluid" style="width: 80%">
            <div>
                <h3>
                    Historia
                </h3>
                <p class="text-justify">
                    La Casa Matriz del Sector Agua Potable y Saneamiento (Sector APS) fue constituida el 24 de mayo de 1990, una vez liquidado el Instituto Nacional de Obras Sanitarias, INOS. Comienza a funcionar conjuntamente con diez Empresas Hidrológicas Regionales, teniendo como responsabilidad desarrollar políticas y programas en materia de abastecimiento de Agua Potable, Recolección y Tratamiento de Aguas Servidas y Drenajes Urbanos, así como el establecimiento de directrices para la administración, operación, mantenimiento y ampliación de los sistemas atendidos por cada una de sus Filiales; regula y supervisa a las empresas hidrológicas filiales y descentralizadas. Hace cumplir la Ley Orgánica para la prestación de los servicios de agua potable y saneamiento incentiva la participación ciudadana, y desarrolla proyectos planteados por las comunidades y las Mesas Técnicas de Agua.
                </p>
            </div>

            <div>
                <h3>
                    Mision
                </h3>
                <p class="text-justify">
                    La misión de la estructura normativa que regula la administración, en el sentido más amplio, de las aguas, es la de coadyuvar al desarrollo integral y sustentable, a través de la ejecución de proyectos de investigación y acción que modifiquen y mejoren la calidad de vida dando respuesta y desarrollo al artículo 304 de la Constitución Nacional que enmarca a éste recurso natural como un bien de dominio público de la Nación, indispensable y por ende insustituible para la vida y el desarrollo. Es decir, establecer las disposiciones necesarias para garantizar la protección del vital recurso hídrico, su aprovechamiento y recuperación, respetando las fases del ciclo hidrológico y los criterios de ordenación del territorio, bajo una organización institucional capacitada para cumplir y hacer cumplir las mismas.
                </p>
            </div>

            <div>
                <h3>
                    Visión
                </h3>
                <p class="text-justify">
                    La Compañía, tiene como misión ampliar la actuación de HIDROVEN a la ejecución de proyectos en los sectores de agua potable y saneamiento, manteniendo la regulación, rectoría y supervisión de las filiales y descentralizadas.
                </p>
            </div>
        </div>

        <?
            include "../assets/footer.php";
        ?>
    </body>
</html>