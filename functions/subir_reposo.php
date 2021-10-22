<?php

session_start();

if (isset($_POST['submit_reposo'])) {

    // Almacenar los documentos pertinentes al reposo medico

    $user = $_POST['id'];

    // Documento de cedula
    $cedula = $_FILES['cedula'];

    $nameCedula = $_FILES['cedula']['name'];
    $tmpnameCedula = $_FILES['cedula']['tmp_name'];
    $sizeCedula = $_FILES['cedula']['size'];
    $errorCedula = $_FILES['cedula']['error'];
    $typeCedula = $_FILES['cedula']['type'];

    $fileExt = explode('.', $nameCedula);
    $extCedula = strtolower(end($fileExt));

    // Documento de informe médico
    $informe = $_FILES['informe'];

    $nameInforme = $_FILES['informe']['name'];
    $tmpnameInforme = $_FILES['informe']['tmp_name'];
    $sizeInforme = $_FILES['informe']['size'];
    $errorInforme = $_FILES['informe']['error'];
    $typeInforme = $_FILES['informe']['type'];

    $fileExt = explode('.', $nameInforme);
    $extInforme = strtolower(end($fileExt));

    // Documento de prescripcion
    $prescripcion = $_FILES['prescripcion'];

    $namePres = $_FILES['prescripcion']['name'];
    $tmpnamePres = $_FILES['prescripcion']['tmp_name'];
    $sizePres = $_FILES['prescripcion']['size'];
    $errorPres = $_FILES['prescripcion']['error'];
    $typePres = $_FILES['prescripcion']['type'];

    $fileExt = explode('.', $namePres);
    $extPres = strtolower(end($fileExt));

    // Extensiones permitidas
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($extCedula, $allowed) && in_array($extInforme, $allowed) && in_array($extPres, $allowed)) {
        if ($errorCedula == 0 && $errorInforme == 0 && $errorPres == 0) {
            if ( $sizeCedula < 5000000 && $sizeInforme < 5000000 && $sizePres < 5000000) {
                
                // Crear carpeta de usuario si no existe
                if (!file_exists('../uploads/'.$user)) {
                    mkdir('../uploads/'.$user, 0777, true);
                }

                // No hubo error con los documentos, guardar en la carpeta
                $newCedula = uniqid('', true) ."." .$extCedula;
                $destino = '../uploads/'.$user ."/" .$newCedula;
                move_uploaded_file($tmpnameCedula, $destino);

                $newInforme = uniqid('', true) ."." .$extInforme;
                $destino = '../uploads/'.$user ."/" .$newInforme;
                move_uploaded_file($tmpnameInforme, $destino);

                $newPres = uniqid('', true) ."." .$extPres;
                $destino = '../uploads/'.$user ."/" .$newPres;
                move_uploaded_file($tmpnamePres, $destino);

                $_SESSION['mensaje'] = "Los documentos fueron subidos exitosamente.";
                $_SESSION['tipo_mensaje'] = 0;

            } else {
            
                // El tamaño de algún documento es muy grande
                $_SESSION['mensaje'] = "El tamaño del documento es muy grande, se permite un tamaño máximo de 5MB.";
                $_SESSION['tipo_mensaje'] = 1;

            }
        } else {

            // Hubo un error de subida
            $_SESSION['mensaje'] = "Hubo un error al intentar subir los documentos, intente más tarde.";
            $_SESSION['tipo_mensaje'] = 2;

        }
    } else {

        // El formato de algun documento no cumple con lo permitido
        $_SESSION['mensaje'] = "Este tipo de documento no está permitido. Solo puede ser en formato JPG, JPEG, PNG ó PDF.";
        $_SESSION['tipo_mensaje'] = 1;

    }
} else {

    // Se llegó mediante un método inusual
    header("location: index.php");
    exit();

}
