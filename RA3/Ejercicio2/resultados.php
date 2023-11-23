<?php
include('config/tests_cnf.php');

var_dump($_POST);  // o echo $_POST['testelegido'];


$testElegido = $_POST['testelegido'];  
$test = $aTests[$testElegido]['Preguntas'];
$soluciones = $aTests[$testElegido]['Corrector'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Resultado de test</h1>
    <?php
    $resp = "";
    $contAciertos = 0;
    foreach ($test as $indicePregunta => $pregunta) {
        echo "<p>".$pregunta["Pregunta"]."</p>";
        foreach ($pregunta['respuestas'] as $indiceRespuesta => $respuesta) {
            $class = "";
            if($respuesta[0] == $soluciones[$indicePregunta][0]){
                $class = "laqueescorrecta";}
            
            if (array_key_exists($indicePregunta, $_POST)){
                if ($respuesta == $_POST[$indicePregunta]){
                    if ($respuesta[0]==$soluciones[$indicePregunta][0]) {
                        $class = "correcto";
                        $contAciertos++;
                    }    
                     else {
                        $class = "fallo";
                    }

                }
            }
            echo "<p class=\"".$class."\">".$respuesta."</p></br>";
            
            if ($contAciertos > 5) {
                $resp = "Has aprobado";
            } else {
                $resp = "Has suspendido";

            }



        
    }}
            echo $resp;
    ?>

    
</body>
</html>