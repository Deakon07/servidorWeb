<?php

/*Conexión a la base de datos

include('conexionBaseDeDatos.php');*/


//Desactivar la notificación y la visualización de errores en el código
error_reporting(0);

// Función de recogida de datos
function recoge($var, $m = "")
{
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

// Variables que recogen los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vivienda = recoge("vivienda");
    $zona = recoge("zona");
    $direccion = recoge("direccion");
    $dormitorios = recoge("dormitorios");
    $precio = recoge("precio");
    $tamano = recoge("tamano");
    $observaciones = recoge("observaciones");
}
if (isset($_POST["extras"])) {
    $extras = $_POST["extras"];
} else {
    $extras = array();
}


// Variables auxiliares de comprobación
$direccionOk = false;
$precioOk = false;
$tamanoOk = false;
$observacionesOk = false;
$dormitoriosOk= false;

// Validación de datos y generación de avisos según cada caso

echo "<p><strong>Tipo de vivienda:</strong> $vivienda</p>";
echo "<p><strong>La zona es:</strong> $zona</p>";

if ($direccion == "") {
    print "<p>No ha escrito ninguna dirección.</p>";
} elseif (is_numeric($direccion)) {
    print "<p>No es una dirección válida.</p>";
} elseif (strlen($direccion) > 200) {
    print "El campo de la dirección excede la longitud máxima permitida (200 caracteres).";
} elseif(preg_match("[A-Za-z0-9ºª\s/.,-]", $direccion)){
    print "La dirección no puede incluir caracteres especiales.";
}else {
    print "<p><strong>La dirección es: </strong>$direccion</p>";
    $direccionOk = true;
}


if ($dormitorios == "") {
    print "<p>No ha indicado nº de dormitorios.</p>";
}else{
    echo "<p><strong>Nº de dormitorios: </strong> $dormitorios</p>";
    $dormitorios= true;
    
}


if ($precio == "") {
    print "<p>No ha escrito ningún precio.</p>";
} elseif (!is_numeric($precio) || $precio <= 0) {
    print "<p>El precio no es válido</p>";
} else {
    print "<p><strong>El precio es de: </strong> $precio</p>";
    $precioOk = true;
}

if ($tamano == "") {
    print "<p>No ha escrito ningún tamaño.</p>";
} elseif (!is_numeric($tamano) || $tamano <= 0) {
    print "<p>El tamaño no es válido</p>";
} else {
    print "<p><strong>El tamaño es de: </strong> $tamano</p>";
    $tamanoOk = true;
}

if (!empty($extras)) {
    $extrasOption = implode(', ', $extras);
    echo "<p><strong>Los extras seleccionados son: </strong> $extrasOption<p>";
} else {
    echo "No se seleccionaron extras.<br>";
}

$imagenBol = true;
$imagen_size = $_FILES['imagen']['size'] . "<br>";
echo "El tamaño de la imagen es: " . $imagen_size . "<br>";

$imagen = $_FILES['imagen']['name'];
echo "El nombre del archivo de la imagen es: " . $imagen . "<br>";

$imagen_temporal = $_FILES['imagen']['tmp_name'];
echo "La carpeta temporal de la imagen es: " . $imagen_temporal . "<br>";

$imagen_tipo = $_FILES['imagen']['type'];
echo "El tipo de la imagen es: " . $imagen_tipo . "<br>";

$imagen_error = $_FILES['imagen']['error'];
echo "Error en la subida de la imagen: " . $imagen_error . "<br>";




if ($_FILES['imagen']['size']>200000)
{$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<br>";
    $imagenBol="false";}
    
    if (!($_FILES['imagen']['type'] =="image/jpeg" OR $_FILES['imagen']['type'] =="image/gif"))
    {$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<br>";
        $imagenBol="false";}
        
$imagen=$_FILES['imagen']['name'];
$add="$imagen";
        if($imagenBol=="true"){
            
            if(move_uploaded_file ($_FILES['imagen']['tmp_name'], $add)){
                echo " La imagen se ha subido correctamente";
            }else{echo "Error al subir el archivo.<br>";}
            
        }else{echo $msg;}

        
        echo "<p><img src='$imagen'></p>";
        
if (strlen($observaciones) > 200) {
     echo "El campo de observaciones excede la longitud máxima permitida (200 caracteres).";
     } else {
          print "<p><strong>Las observaciones son: </strong> $observaciones</p>";
          $observacionesOk = true;
    }
   


    /*
     // Insertar información en la base de datos
if ($direccionOk && $precioOk && $tamanoOk && $observacionesOk && $dormitoriosOk) {
   
    
    $sql = "INSERT INTO inmobiliaria (vivienda, zona, direccion, dormitorios, precio, tamano, extras, imagen, observaciones) 
            VALUES ('$vivienda', '$zona', '$direccion', '$dormitorios', '$precio', '$tamano', '" . implode(", ", $extras) . "', '$imagen', '$observaciones')";

    if ($conn->query($sql)) {
        $inserted_id = $conn->insert_id;
        echo "La vivienda se ha insertado correctamente con el ID: $inserted_id<br>";
    } else {
        echo "Error al insertar los datos de la vivienda en la base de datos: " . $conn->error . "<br>";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();*/
?>
    
  