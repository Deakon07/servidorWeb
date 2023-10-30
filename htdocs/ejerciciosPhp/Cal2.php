<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

    <?php
   if(isset($_GET['submit'])){ 
    $operando1 = $_GET['numeroA'];
    $operando2 = $_GET['numeroB'];
    $submit = $_GET['submit'];

    if($submit == "Suma"){
        $solucion = $operando1 + $operando2;
        echo $operando1.'+'.$operando2.' es '.$solucion;
    } else if($submit == "Resta"){
        $solucion = $operando1 - $operando2;
        echo $operando1.'-'.$operando2.' es '.$solucion;
    } else if($submit == "Multiplicación"){
        $solucion = $operando1 * $operando2;
        echo $operando1.'*'.$operando2.' es '.$solucion;
    } else if($submit == "División"){
        $solucion = $operando1 / $operando2;
        echo $operando1.'/'.$operando2.' es '.$solucion;
    }
}
    ?>
<body>
    <form action="/ejerciciosPhp/Cal2.php" method="get">
        <label for="numeroA">A: </label>
        <input type="number" id="numeroA" name="numeroA" placeholder="5" max="100">
        <label for="numeroB">B: </label>
        <input type="number" id="numeroB" name="numeroB" placeholder="5" max="100"><br>
        
        <input type="submit" value="Suma" name="submit">
        <input type="submit" value="Resta" name="submit">
        <input type="submit" value="Multiplicación" name="submit">
        <input type="submit" value="División" name="submit">
    </form>


</body>

</html>

