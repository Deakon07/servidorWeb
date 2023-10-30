<?php
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
$vivienda= recoge("vivienda"); 
$zona = recoge("zona"); 
$direccion = recoge("direccion"); 
$dormitorios= recoge("dormitorios"); 
$precio = recoge("precio"); 
$tamano = recoge("tamano"); 
$extras = recoge("extras"); 
$observaciones = recoge("observaciones");


// Variables auxiliares de comprobación

$direccionOk = false; 
$precioOk = false;
$tamanoOk = false;
$observacionesOk = false;

// Validación de datos y generación de avisos
if ($direccion == "") {
    print "<p>No ha escrito ninguna dirección.</p>\n";

}elseif(!is_string($direccion)) {
    print " <p>No es una dirección<p>";

} elseif(is_numeric($direccion)) {
    print "  <p>No es una dirección completa</p>\n";
    print "\n";
}
else {
     $direccionOK = true;
}

if ($precio == "") {
    print "<p>No ha escrito ningun precio.</p>\n";

} elseif($precio<=0){
    print "  <p>No se puede numeros negativos</p>\n";
    print "\n";
}
else {
     $precioOK = true;
}

   



