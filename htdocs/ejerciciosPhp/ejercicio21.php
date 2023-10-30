<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 21</title>
</head>
<body>
<form action="/ejerciciosPhp/formulario21.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre"
        maxlength="30"><br>
        <label for="lname">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos"
        maxlength="80"><br>
        <label for="numero">Introduce un número:</label><br>
        <input type="number" id="number" name="number" placeholder="25"
        max="100"><br>
        <input type="submit" value="enviar">
      </form> 
</body>
</html>