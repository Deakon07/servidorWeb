<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>tipo 2</title>
    <link rel="stylesheet" href="tipo.css" />
  </head>
  <body>
  <?php

//Conexión a la base de datos
include('conexionBaseDeDatos.php');
//Función recoge que analiza y limpia los datos
include('funcionRecoge.php');


error_reporting(0);

// Variables para almacenar los mensajes de error
$errorDireccion = '';
$errorDormitorios = '';
$errorTamano = '';
$errorObservaciones = '';


 // Variables auxiliares de comprobación
 $direccionOk = false;
 $precioOk = false;
 $tamanoOk = false;
 $observacionesOk = false;
 $ndormitoriosOk= false;


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obteniendo los valores del formulario
    $tipo = recoge("tipo");
    $zona = recoge("zona");
    $direccion = recoge("direccion");
    $ndormitorios = recoge("dormitorios");
    $precio = recoge("precio");
    $tamano = recoge("tamano");
    $observaciones = recoge("observaciones");
    if (isset($_POST["extras"])) {
        $extras = $_POST["extras"];
    } else {
        $extras = array();
    }
    // Validación los datos
    if (empty($_POST[$direccion])) {
      $errorDireccion = "<p>No ha escrito ninguna dirección.</p>";
    } elseif (is_numeric($direccion)) {
        $errorDireccion = "<p>No es una dirección válida.</p>";
    } elseif (strlen($direccion) > 100) {
      $errorDireccion = "El campo de la dirección excede la longitud máxima permitida (100 caracteres).";
    } elseif(preg_match("[A-Za-z0-9ºª\s/.,-]", $direccion)){
      $errorDireccion = "La dirección no puede incluir caracteres especiales.";
    }else{
      $direccionOk = true;
    }
    
    
    if (empty($ndormitorios)) {
      $errorDormitorios = "Selecciona el número de dormitorios.";
    }else{
      $ndormitoriosOk = true;
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
      
      $fotoOK=true;
            
      if ($_FILES['foto']['size']>200000){$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo <br>";
        $fotoOK= false;
      }else if(!($_FILES['foto']['type'] =="image/jpeg" OR $_FILES['foto']['type'] =="image/gif"))
      {$msg=$msg." Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<br>";
        $fotoOK= false;
      } 

      if($fotoOK=="true"){

      /* $foto_size = $_FILES['foto']['size'] . "<br>";
      echo "El tamaño de la foto es: " . $foto_size . "<br>";
      
      $foto = $_FILES['foto']['name'];
      echo "El nombre del archivo de la foto es: " . $foto . "<br>";
      
      $foto_temporal = $_FILES['foto']['tmp_name'];
      echo "La carpeta temporal de la foto es: " . $foto_temporal . "<br>";
      
      $foto_tipo = $_FILES['foto']['type'];
      echo "El tipo de la foto es: " . $foto_tipo . "<br>";
     */ 

      $foto_error = $_FILES['foto']['error'];
      echo "Error en la subida de la foto: " . $foto_error . "<br>";

      $foto=$_FILES['foto']['name'];

      $ruta="img/".$foto;
        if($fotoOK){
          move_uploaded_file ($_FILES['foto']['tmp_name'], $ruta);
          echo " La foto se ha subido correctamente";
        }else{echo "Error al subir el archivo.<br>"; }
        
      }
    }
      //else{echo $msg;}
          
       //echo "<p><img src='$foto'></p>";
          
    // Insertar información en la base de datos
  //if ($direccionOk && $precioOk && $tamanoOk && $observacionesOk && $ndormitoriosOk && $fotoOK) {
   
    
    $sql = "INSERT INTO viviendas (TIPO, ZONA, DIRECCION, NDORMITORIOS, PRECIO, TAMANO, EXTRAS, FOTO, OBSERVACIONES) 
            VALUES ('$tipo', '$zona', '$direccion', '$ndormitorios', '$precio', '$tamano', '" . implode(", ", $extras) . "', '$foto', '$observaciones')";

    if ($conn->query($sql)) {
        $inserted_id = $conn->insert_id;
        echo "La tipo se ha insertado correctamente con el ID: $inserted_id<br>";
    } else {
        echo "Error al insertar los datos de la tipo en la base de datos: " . $conn->error . "<br>";
    }
//}

    // Cerrar la conexión a la base de datos
    $conn->close();  

  ?>

    <h1>Inserción de tipo 2</h1>
    <p>Introduzca los datos de la tipo:</p>
    
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="recuadro">
        <label for="tipo">Tipo de tipo</label>
        <select name="tipo" id="tipo">
          <option value="piso">Piso</option>
          <option value="adosado">Adosado</option>
          <option value="chalet">Chalet</option>
          <option value="casa">Casa</option>
        </select>
        <br /><br />

        <label for="zona">Zona:</label>
        <select name="zona" id="zona">
          <option value="centro">Centro</option>
          <option value="nervion">Nervión</option>
          <option value="Triana">Triana</option>
          <option value="Aljarafe">Aljarafe</option>
          <option value="Macarena">Macarena</option></select>

        <br /><br />

        <label for="direccion">Dirección:</label>
        <input
          type="text"
          name="direccion"
          id="direccion"
          maxlength="100"
          pattern="[A-Za-z0-9ºª\s/.,-]"
        />
        <br /><br />
        <span style="color: red">
        <?php echo $errorDireccion; ?></span>

        <br /><br />

        <label for="dormitorios">Número de dormitorios:</label>
        <input type="radio" name="dormitorios" id="1" value="1" />1
        <input type="radio" name="dormitorios" id="2" value="2" />2
        <input type="radio" name="dormitorios" id="3" value="3" />3
        <input type="radio" name="dormitorios" id="4" value="4" />4
        <input type="radio" name="dormitorios" id="5" value="5" />5 <br /><br />
        <span style="color: red"> 
        <?php echo $errorDormitorios; ?></span>
        <br /><br />

        <label for="precio">Precio:</label>
        <input
          type="number"
          name="precio"
          id="precio"
          min="0"
          maxlength="10"
          size="7"/>€ <br /><br />
        <span style="color: red">
        <?php echo $errorPrecio; ?></span>
        <br /><br />

        <label for="tamano">Tamaño:</label>
        <input
          type="number"
          name="tamano"
          id="tamano"
          min="0"
          maxlength="10"
          size="7"
        />
        metros cuadrados <br /><br />
        metros cuadrados
        <span style="color: red"><?php echo $errorTamano; ?></span>
        <br /><br />

        <label for="extras">Extras (marque los que procedan):</label>
        <input
          type="checkbox"
          name="extras[]"
          id="piscina"
          value="Piscina"
        />Piscina
        <input
          type="checkbox"
          name="extras[]"
          id="jardin"
          value="Jardín"
        />Jardín
        <input
          type="checkbox"
          name="extras[]"
          id="garaje"
          value="Garaje"
        />Garaje <br /><br />
        <span style="color: red"><?php echo $errorExtras; ?></span>
        <br /><br />

        <input type="file" name="foto" />
        <input
          type="submit"
          name="subirfoto"
          value="Enviar foto"
          height="50"
          width="50"
        />
        <br />
        <br /><br />

        <label for="observaciones">Observaciones:</label>
        <textarea
          name="observaciones"
          rows="10"
          cols="50"
          maxlength="200"
        ></textarea>
        <br /><br />
         <br /><br />
           
        <input type="submit" value="Insertar tipo" name="insertar" />
      </div>
    </form>
  </body>
</html>