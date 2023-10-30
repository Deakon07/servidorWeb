<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    $errores = array();

    // Validación del nombre
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    } elseif (preg_match('/\s/', $nombre)) {
        $errores[] = "El nombre no debe contener espacios en blanco.";
    }

    // Validación del correo electrónico
    if (empty($email)) {
        $errores[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    // Validación de la contraseña
    if (empty($contrasena)) {
        $errores[] = "La contraseña es obligatoria.";
    } elseif (strlen($contrasena) < 8) {
        $errores[] = "La contraseña debe tener al menos 8 caracteres.";
    }

    // Evitar caracteres especiales de HTML en todos los campos
    $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $contrasena = htmlspecialchars($contrasena, ENT_QUOTES, 'UTF-8');

    // Si no hay errores, puedes proceder a registrar al usuario en la base de datos o realizar otras acciones.
    if (empty($errores)) {
        // Realiza la acción deseada, como registrar al usuario en la base de datos.
        // Por ejemplo, aquí puedes imprimir un mensaje de éxito.
        echo "¡Usuario registrado con éxito!";
    } else {
        // Si hay errores, muestra los mensajes de error al usuario.
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
}
?>

