<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ariketa 4</title>
    </head>
    <body>
        
       <!-- Zure kodea hemen -->
        <h1>Ariketa 4 </h1>
        <h2>Ariketa 4.1</h2>
        
        <?php
           $zenbakiak1 = []; //declaramos el array
            $batura = 0;
            
            // Aqui se crean 5 numeros aleatorios del 1 al 100. 
            for ($i = 0; $i < 5; $i++) {
                $zenbakiak1[] = rand(1, 100);
            }
            // sirve para poner los bordes de la tabla que hemos creado al principio. 
            echo "<table border='1'>";
            echo "<tr>";
        
            for ($i = 1; $i <= 5; $i++) {
                echo "<th>$i. zenbakia</th>";
            }
            echo "</tr><tr>";
            
            foreach ($zenbakiak1 as $zenbakia) {
                echo "<td>$zenbakia</td>";
                $batura += $zenbakia;
            }
            
            echo "</tr><tr>";
            echo "<td colspan='5' class='left-align'>Batura: $batura</td>";
            echo "</tr>";
            echo "</table>";




        // para hacer la suma : $batura = array_sum($zenbakiak1);
        ?>
            
        <h2>Ariketa 4.2</h2>
        <?php
        $herrialdeak = ["EH", "Frantzia", "Alemania", "Italia"]; //declaramos el array y le damos los valores con las ciudades 
            sort($herrialdeak); // La funcion sort sirve para ordenar cosas en orden alfabetico 
            
            echo "<table border='1'>";
            echo "<tr>";
            for ($i = 1; $i <= count($herrialdeak); $i++) {
                echo "<th>$i. herrialdea</th>";
            }
            echo "</tr><tr>";
            //el bucle llama a la funcion herrialdeak y la escribe en la tabla. 
            foreach ($herrialdeak as $herrialdea) {
                echo "<td>$herrialdea</td>";
            }
            echo "</tr>";
            echo "</table>";

        ?>

        <h2>Ariketa 4.3 </h2>
        <?php
        
        ?>

        <h2>Ariketa 4.4 </h2>

        <?php

        ?>

        <h2> Ariketa 4.5 </h2>
        <?php
        
        ?>
    </body>
</html>