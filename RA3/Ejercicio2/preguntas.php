<?php
include('config/tests_cnf.php');
var_dump($_POST);  // o echo $_POST['testelegido'];

$testElegido = $_POST['testelegido'];
$nombreImagen = "ejemplo.jpg"; // Reemplaza con el nombre de tu imagen
$rutaImagen = "dir_img_test/";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="resultados.php" method="POST">

 <?php
    
        echo "<h1>Test Elegido</h1>";
        $cont = 0;

        foreach ($aTests[$_POST["testelegido"]]["Preguntas"] as $clavePregunta => $pregunta) {
            echo "<p>".$pregunta["Pregunta"]."</p>";
            echo "<br>";
            echo "<img src='dir_img_test".$aTests[$_POST["testelegido"]]["idTest"]."/img".$pregunta["idPregunta"].".jpg' alt='Descripción de la imagen'></br>";
            $cont++;
            foreach ($pregunta["respuestas"] as $claveRespuesta => $respuesta) {
                echo "<input type='radio' name='".$clavePregunta."' value='".$respuesta."'>".$respuesta."</br>";
            }

        
           
        }
        echo "<input type='hidden' name='testelegido' value='".$testElegido."'>";
        echo "<input type='submit' name='comprobar' value='Comprobar'>";
    
    ?>

    </form>
   
    
</body>
</html>