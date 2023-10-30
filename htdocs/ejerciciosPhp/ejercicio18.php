<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
</head>

<head>
    <style>
        table {
            border: 1px solid black;
            margin: 0 auto; 
            text-align: center; 
        }

        th, td {
            padding: 5px;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>

<?php
echo '<table>';
echo '<tr>';
echo '<th>Ángulo</th>';
echo '<th>Seno</th>';
echo '<th>Coseno</th>';
echo '</tr>';

for ($i=0; $i<=2 ; $i= $i+0.01) { 
    echo '<tr>';
    echo '<td>'.$i.'<br></td>';
if(sin($i)<0){
    echo '<td style= "color: red">'.sin($i).'<br></td>';
}else{
    echo '<td style= "color: blue">'.sin($i).'<br></td>';
}

if(cos($i)<0){
    echo '<td style= "color: red">'.cos($i).'<br></td>';
}else{
    echo '<td style= "color: blue">'.cos($i).'<br></td>';
}
}



echo '</tr>';
echo '</table>';
?>
</body>
</html>