<?php
include("config/tests_cnf.php");

$procesa = false;
$testElegido = "";
$enviar = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["enviar"])) {
        $testElegido = $_POST['nombreTest']; // Corrected the input name
        $procesa = true;
    } else {

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Adrián González">
    <title>Ejercicio 2</title>
</head>
<body>
    <h1>Test</h1>
    <form action="" method="post">
        <?php
        if (!$procesa) {
            echo '<select name="nombreTest">';
            foreach ($aTests as $key => $value) {
                echo '<option value="'.$aTests[$key]["idTest"].'">Test '.$aTests[$key]["idTest"].'</option>'; 
            }
            echo '</select>';
            echo '<input type="submit" name="enviar">';
        } else {
            foreach ($aTests[$testElegido]["Preguntas"] as $key => $value) {
                echo $value["Pregunta"]. "</br>";
                foreach ($value["respuestas"] as $indice => $valor) {
                    echo "<input type='checkbox' name='respuesta[".$indice."]'>".$valor."</input></br>";
                }
            }

            echo '<input type="submit" name="comprobar">';
            
        }
        ?>
    </form>
</body>
</html>
