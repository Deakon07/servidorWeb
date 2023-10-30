<?php
$nombre= $_REQUEST["nombre"];

switch ($nombre) {

    case is_numeric($nombre):
        print_r(is_numeric($nombre)."<br>");

    case is_null($nombre):

        print_r(is_null($nombre)."<br>");

    case isset($nombre):

        print_r(!isset($nombre)."<br>");

    case is_bool($nombre):

        print_r(is_bool($nombre)."<br>");

    case is_int($nombre):

        print_r(is_int($nombre)."<br>");

    case is_float($nombre):

        print_r(is_float($nombre)."<br>");

    case is_string($nombre):

        print_r(is_string($nombre)."<br>");

    case is_scalar($nombre):

        print_r(is_scalar($nombre)."<br>");

    case is_array($nombre):

        print_r(is_array($nombre)."<br>");

    case is_callable($nombre):

        print_r(is_callable($nombre)."<br>");

    case is_object($nombre):

        print_r(is_object($nombre)."<br>");

    case is_resource($nombre):

        print_r (is_resource($nombre)."<br>");

    case is_countable($nombre):

        print_r (is_countable($nombre)."<br>");

    case is_iterable($nombre):

        print_r(is_iterable($nombre)."<br>");

}

?>
