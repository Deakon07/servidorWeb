<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>
<body>

<p>Igual que el anterior</p>

    <?php

$a = 8;
$b = 3; 
$c = 3;

if($a == $b && $c > $b){

    echo 'True'."<br>";
}
else{
echo 'False'."<br>";
}


if($a == $b || $c == $b){

    echo 'True'."<br>";
}
else{
echo 'False'."<br>";
}


if (!($b <= $c)){

    echo 'True'."<br>";
}else{

    echo 'False'."<br>";
}

?>

</body>
</html>