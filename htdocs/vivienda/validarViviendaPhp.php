<?php
$nombre = $email = "";
$errorNombre = $errorEmail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Validación de datos
    if (empty($nombre)) {
        $errorNombre = "El campo Nombre es obligatorio.";
    }

    if (empty($email)) {
        $errorEmail = "El campo Email es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "El formato del Email no es válido.";
    }
}
?>