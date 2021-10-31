<?php
$title = "Bitácora";
$JS = "bitacora.js";
include "../assets/header.php";

session_name();

require("../functions/connection.php");

ob_start();
?>

<div class="col-md-12 text-center">
    <div class="row justify-content-center">
        <h3>Bitácora de navegación</h3>
        <br>
        <br>
        <br>
        <div class="col-md-10">
            <form name="reporte" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <div class="row justify-content-around">
                    <?php
                    echo '<input type="hidden" value="' . $_SESSION['userid'] . '">';

                    if ($user['admin'] == 1) {
                        $result = ListUsers();
                    }
                    ?>

                    <div class="form-group col-sm-2">
                        <select name="usuarioId" id="usuarioId" class="form-select">
                            <option value="">Usuario</option>
                            <?php
                            while ($users = $result->fetch_assoc()) {
                                echo '<option value = "' . $users['userid'] . '">' . $users['p_apellido'] . ' ' . $users['p_nombre'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-2">
                        <select name="dia" id="dia" class="form-select">
                            <option value="00">Día</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo '<option value="' . ($i < 10 ? '0' . $i : $i) . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-2">
                        <select name="mes" id="mes" class="form-select">
                            <option value="00">Mes</option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-2">
                        <select name="año" id="año" class="form-select">
                            <option value="0000">Año</option>
                            <?php
                            for ($i = 2021; $i <= 2030; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <br>

                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <input class="btn-primary form-control" type="submit" value="Buscar">
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-md-4 text-end">
                        <br>
                        <?php
                        $IdUsuario = isset($_GET['usuarioId']) ? $_GET['usuarioId'] : '';

                        $año = isset($_GET['año']) ? $_GET['año'] : '';
                        $mes = isset($_GET['mes']) ? $_GET['mes'] : '';
                        $dia = isset($_GET['dia']) ? $_GET['dia'] : '';

                        $fecha = $año . '-' . $mes . '-' . $dia;
                        $fechaPantalla = $dia . '-' . $mes . '-' . $año;

                        $results_per_page = 10;

                        $sql = "SELECT * FROM rutas WHERE usuario = '$IdUsuario' AND fecha LIKE '$fecha%';";
                        $result = mysqli_query($conn, $sql);

                        $num_results = mysqli_num_rows($result);
                        $num_pag = ceil($num_results / $results_per_page);

                        echo 'Total de registros: ' . $num_results . '<br>';
                        echo 'Total de páginas: ' . $num_pag  . '<br>';

                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }

                        $this_page_first_result = ($page - 1) * $results_per_page;

                        $sql = "SELECT * FROM rutas WHERE usuario = '$IdUsuario' AND fecha LIKE '$fecha%' LIMIT " . $this_page_first_result . "," . $results_per_page . ";";
                        $result = mysqli_query($conn, $sql);

                        ?>
                    </div>
                </div>
            </form>
            <br>
            <div class="row">
                <table class="table table-responsive">
                    <tr>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">URL</th>
                    </tr>

                    <?php
                    while ($ruta = mysqli_fetch_array($result)) {
                        echo "
                            <tr>
                                <td>" . $ruta['usuario'] . "</td>
                                <td>" . $ruta['fecha'] . "</td>
                                <td>" . $ruta['url'] . "</td>
                            </tr>
                            ";
                    }
                    ?>
                </table>
            </div>

            <div class="row justify-content-center">
                <nav aria-label="Page navigation" style="background: white;" max-size=10>
                    <ul id="bitacora-pagination" class="pagination justify-content-center">
                        <?php
                        if ($page > 1) { ?>
                            <li class="page-item">
                                <a href="bitacora.php?page=<?php echo ($page - 1) . '&usuarioId=' . $IdUsuario . '&año=' . $año . '&mes=' . $mes . '&dia=' . $dia; ?>" class="page-link">&laquo;</a>
                            </li>
                        <?php
                        }

                        for ($page = 1; $page <= $num_pag; $page++) {
                            echo "
                            <li class='page-item'>
                                <a href='bitacora.php?page=" . $page . "&usuarioId=" . $IdUsuario . "&año=" . $año . "&mes=" . $mes . "&dia=" . $dia . "' class='page-link'>" . $page . "</a>
                            </li>
                            ";
                        }

                        if ($_GET['page'] < $num_pag) { ?>
                            <li class="page-item">
                                <a href="bitacora.php?page=<?php echo ($_GET['page']+1) . '&usuarioId=' . $IdUsuario . '&año=' . $año . '&mes=' . $mes . '&dia=' . $dia; ?>" class="page-link">&raquo;</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include "../assets/footer.php";
?>