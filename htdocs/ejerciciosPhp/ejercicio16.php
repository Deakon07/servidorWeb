<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
    <?php

    $hoy = date('d');
    echo 'El dia de hoy es: ' .$hoy."<br>";

    if($hoy > 10){
        echo 'El sitio está activo'."<br>";
    }else
    echo 'El sitio no está activo'."<br>";

    ?>


</body>
</html>