<?php
$con= mysqli_connect("localhost","root","","fp");


//Comprobar conexión
if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: ".mysqli_connect_error();
    exit();
}
else{
    echo "Conectada";

}

?>
