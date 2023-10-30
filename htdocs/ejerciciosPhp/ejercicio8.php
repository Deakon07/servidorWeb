<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <?php

    $dia[0] = "Domingo"; 
    $dia[1] = "Lunes"; 
    $dia[2] = "Martes"; 
    $dia[3] = "Miércoles"; 
    $dia[4] = "Jueves"; 
    $dia[5] = "Viernes"; 
    $dia[6] = "Sábado"; 
     
    foreach ($dia as $indice => $valor) {
        echo $valor ." "."<br>";
        $indice++;   }
    ?>

</body>
</html>