<?php

/**
 * @author Adrian <email>
 * @
 */

include('config/config.php');




$numeroVerbos = "";
$dificultad = "";
$claseErrorVerbo = "";
$procesarFormulario = false;
$enviar = "enviar";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["enviar"])) {
        
        $procesarFormulario = true;
        if ($_POST['verbos'] < 0 || empty($_POST['verbos'])) {
            $claseErrorVerbo = "El numero de verbos es incorrecto";
            $procesarFormulario = false;
            
        } else {
            $numeroVerbos = $_POST['verbos'];
            $dificultad = $_POST['dificultad'];
            $arrayNumerosAleatorios = array();

            for ($i=1; $i <= $numeroVerbos; $i++) {
                do {
                    $numeroRandom = random_int(1, count($verbosIrregulares)-1);
                } while (in_array($numeroRandom, array_keys($arrayNumerosAleatorios))); 
                $arrayNumerosAleatorios[$numeroRandom] = array();


                for ($j=1; $j <= $dificultad; $j++) { 
                    do {
                        $numeroHuecosAleatorios = random_int(0,3);
                    } while (in_array($numeroHuecosAleatorios, $arrayNumerosAleatorios[$numeroRandom]));
                    array_push($arrayNumerosAleatorios[$numeroRandom], $numeroHuecosAleatorios);

                    
                }
            }




            $enviar = 'comprobar';





        }






        
    }

    if (isset($_POST['comprobar']) ) {
        $enviar = 'comprobar';
        $procesarFormulario = true;
        $arrayNumerosAleatorios = [];
        $acierto = 0;
        foreach($_POST['verbo'] as $key => $value) {
            $arrayNumerosAleatorios[$key] = array_keys($value);
            foreach($value as $indice => $respuesta) {
                if ($verbosIrregulares[$key][$indice] == $respuesta) {
                    $acierto++;
                };
            }
            
        }
        
    }


    

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <h1>Verbos irregulares</h1>
    <form action="index.php" method='post'>
        <?php if (!$procesarFormulario) { ?>
            <label for="">Numero de verbos:</label>
            <input type="text" name="verbos"><p style="color: red;"><?php echo $claseErrorVerbo ?></p></br>
            <label for="">Dificultad</label>
            <select name="dificultad" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>

            </select>


        <?php } else {
            echo "<table>";

            foreach ($arrayNumerosAleatorios as $indice => $huecos) {
                echo "<tr>";
                foreach ($verbosIrregulares[$indice] as $key => $distintasFormasVerbos) {
                    

                    if (in_array($key, $huecos)) {
                        $respuesta = "";
                        $color = "";

                        if (isset($_POST['verbo'][$indice][$key])) {
                            $respuesta = $_POST['verbo'][$indice][$key];
                            if ($respuesta == $distintasFormasVerbos) {
                                $color = 'claseVerde';
                            } else {
                                $color = 'claseRojo';

                            }
                        }

                        echo '<td><input type="text" name="verbo['.$indice.']['.$key.']" class="'.$color.'" value="'.$respuesta.'" />';
                        
                        
                    } else {
                        echo "<td>". $distintasFormasVerbos ."</td>" ;
                    }
                    
                }
                echo "</tr>";
            }
            echo "</table>";




        }
        ?>
        <input type="submit" name="<?php echo $enviar ?>"></br>
        <a href="index.php">Volver a la pagina principal</a>
        <?php
            if (isset($acierto)) {
                echo "Has acertado: ". $acierto;

            }
        ?>

    </form>


    
</body>
</html>