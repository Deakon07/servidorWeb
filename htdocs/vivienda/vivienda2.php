<?php

/*Conexión a la base de datos

include('conexionBaseDeDatos.php');*/


error_reporting(0);

// Variables para almacenar los mensajes de error
$errorDireccion = '';
$errorDormitorios = '';
$errorPrecio = '';
$errorTamano = '';
$errorExtras = '';
$errorObservaciones = '';


 // Variables auxiliares de comprobación
 $direccionOk = false;
 $precioOk = false;
 $tamanoOk = false;
 $observacionesOk = false;
 $dormitoriosOk= false;


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $vivienda = recoge("vivienda");
    $zona = recoge("zona");
    $direccion = recoge("direccion");
    $dormitorios = recoge("dormitorios");
    $precio = recoge("precio");
    $tamano = recoge("tamano");
    $observaciones = recoge("observaciones");
    if (isset($_POST["extras"])) {
        $extras = $_POST["extras"];
    } else {
        $extras = array();
    }

    // Validar los datos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["$direccion"])) {
        $errorDireccion = "<p>No ha escrito ninguna dirección.</p>";
    } elseif (is_numeric($direccion)) {
        $errorDireccion = "<p>No es una dirección válida.</p>";
    } elseif (strlen($direccion) > 200) {
        $errorDireccion = "El campo de la dirección excede la longitud máxima permitida (200 caracteres).";
    } elseif(preg_match("[A-Za-z0-9ºª\s/.,-]", $direccion)){
        $errorDireccion = "La dirección no puede incluir caracteres especiales.";
    }else{
        $direccionOk = true;
    }

    
    if (empty($dormitorios)) {
        $errorDormitorios = "Selecciona el número de dormitorios.";
    }else{
        $dormitoriosOk = true;

    }


    if (empty($precio) || !is_numeric($precio) || $precio <= 0) {
        $errorPrecio = "Ingresa un precio válido.";
    }else{
        $precioOk = true;

    }
    

    if (empty($tamano) || !is_numeric($tamano) || $tamano <= 0) {
        $errorTamano = "Ingresa un tamaño válido.";
    }else{
        $tamanoOk = true;

    }

    if (empty($extras)) {
        $errorExtras = "Selecciona al menos un extra.";
    }
    else{
        $extrasOption = implode(', ', $extras);
    echo "<p><strong>Los extras seleccionados son: </strong> $extrasOption<p>";

    }

    $imagenOK = true;
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
            if($imagenOK=="true"){
                
                if(move_uploaded_file ($_FILES['imagen']['tmp_name'], $add)){
                    echo " La imagen se ha subido correctamente";
                }else{echo "Error al subir el archivo.<br>";}
                
            }else{echo $msg;}
    
            
            echo "<p><img src='$imagen'></p>";

    if (strlen($observaciones) > 200) {
        $errorObservaciones = "Las observaciones exceden el límite de 200 caracteres.";
    }









   /*
     // Insertar información en la base de datos
if ($direccionOk && $precioOk && $tamanoOk && $observacionesOk && $dormitoriosOk &&imagenOK) {
   
    
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
}
}
?>
