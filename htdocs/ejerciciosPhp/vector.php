<!DOCTYPE html>
<html>

<head>
    <title>Ejercicio vector</title>
</head>

<body>
    <form method="get" action="">
        <ol>
            <li><input type="number" name="elemento0"></li>
            <li><input type="number" name="elemento1"></li>
            <li><input type="number" name="elemento2"></li>
            <li><input type="number" name="elemento3"></li>
            <li><input type="number" name="elemento4"></li>
            <li><input type="number" name="elemento5"></li>
            <li><input type="number" name="elemento6"></li>
            <li><input type="number" name="elemento7"></li>
        </ol>
        <input type="submit" value="Calcular Sumatoria">
    </form>

    <?php
if(isset($_GET['elemento0'])) {
    $elementos = array(
        $_GET["elemento0"],
        $_GET["elemento1"],
        $_GET["elemento2"],
        $_GET["elemento3"],
        $_GET["elemento4"],
        $_GET["elemento5"],
        $_GET["elemento6"],
        $_GET["elemento7"]
    );

    $sumatoria = array_sum($elementos);
    echo "<h2>La sumatoria es : $sumatoria</h2>";

}
?>

</body>

</html>