<?php
$con= mysqli_connect("localhost","root","","lindavista");


//Comprobar conexión
if(mysqli_connect_errno()) {
    echo "Fallo al conectar la base de datos: ".mysqli_connect_error();
   
    exit();
}
else{
    echo "¡¡Bienvenido a Inmobiliaria LindaVista, donde tus sueños se hacen realidad!! <br>";
    
}

?>
