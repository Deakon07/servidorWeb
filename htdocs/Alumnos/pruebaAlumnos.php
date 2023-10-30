<?php

/*Conexión a la base de datos*/

$con = mysqli_connect('localhost','root','','fp');


//Comprobar conexión
if(mysqli_connect_errno()) {
    echo "Error al conectar a MySQL: " . mysqli_connect_error();
    exit();
}
else{
    echo "La base de datos se ha conectado correctamente <br>";
    }  


/*Desactivar la notificación y la visualización de errores en el código*/
error_reporting(0);


/* Función de recogida de datos*/
function recoge($var, $m = ""){
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

/* Variables que recogen los datos*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = recoge("nombre");
    $apellidos = recoge("apellidos");
    $curso = recoge("curso");
    $ciclo = recoge("ciclo");
    $nota_final = recoge("nota_final");
   }


/* Variables auxiliares de comprobación*/
$nombreOk = false;
$apellidosOk = false;
$nota_finalOK= false;

/* Validación de datos y generación de avisos según cada caso*/

if ($nombre == "") {
    print "<p>No ha escrito ningún nombre.</p>";
} elseif (is_numeric($nombre)) {
    print "<p>No es un nombre válido.</p>";
} elseif (strlen($nombre) > 50) {
    print "<p>El campo del nombre excede la longitud máxima permitida (50 caracteres).</p>";
} elseif (preg_match("/^[A-Za-z0-9áéíóúÁÉÍÓÚüÜñÑ\s/.,'-]+$/", $nombre)) {
    print "<p>El nombre no puede incluir caracteres especiales.</p>";
} else {
    $nombreOk = true;
}

if ($apellidos == "") {
    print "<p>No ha escrito ningún apellido.</p>";
} elseif (is_numeric($apellidos)) {
    print "<p>No es un apellido válido.</p>";
} elseif (strlen($apellidos) > 50) {
    print "<p>El campo de los apellidos excede la longitud máxima permitida (50 caracteres).</p>";
} elseif (preg_match("/^[A-Za-z0-9áéíóúÁÉÍÓÚüÜñÑ\s/.,'-]+$/", $apellidos)) {
    print "<p>Los apellidos no pueden incluir caracteres especiales.</p>";
} else {
    $apellidosOk = true;
}


if ($nota_final == "") { 
    print "<p>No ha introducido ninguna nota.</p>";
} elseif (!is_numeric($nota_final) || $nota_final <= 0 || $nota_final > 10) { 
    print "<p>La nota no es válida.</p>";
} else {
    $nota_finalOk = true;
}


if ($nombreOk && $apellidosOk && $nota_finalOk) {
    $sql = "INSERT INTO alumnos (NOMBRE, APELLIDOS, CURSO, CICLO, NOTA_FINAL) VALUES ('$nombre', '$apellidos', '$curso', '$ciclo', $nota_final)";

if (mysqli_query($con, $sql)) {
    $inserted_id = mysqli_insert_id($con);
    echo "El alumno se ha insertado correctamente con el ID: $inserted_id <br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
mysqli_close($con);
 
?>

    

        