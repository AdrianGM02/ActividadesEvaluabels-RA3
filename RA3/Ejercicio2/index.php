
<?php

include("config/tests_cnf.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegir test</title>
</head>
<body>
    <h1>Elegir test</h1>
    <form action="preguntas.php" method="post">
        <?php 
    
            echo "<select name='testelegido'>";
            foreach ($aTests as $key => $value) {
                echo "<p>Elige un Test</p>";
                echo "<option value='".$key."'>"."Test". $key+1 ."</option>";
                
            }
            echo "</select>";
            echo "<input type='submit' name='enviar'>";
        ?>
        
    </form>
    
</body>
</html>


