<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ariketa 3</title>
    </head>
    <body>
        
       <!-- Zure kodea hemen -->
        <h1>Ariketa 3 </h1>
        <h2>Ariketa 3.1</h2>
        
        <?php
            $kontadorea = 0;
            $batuketa = 0;

            while ($kontadorea < 10 ){
                $auzazkozenbakia = rand (1,10);
                $batuketa += $auzazkozenbakia;
                $kontadorea++;
            }

            echo "Zenbakien batura hau da: ". $batuketa;

            
        ?>



        <h2>Ariketa 3.2</h2>
        <?php
        $biderketa = 1;
        for ($i = 1; $i <= 5; $i++) {
             $biderketa *= $i;
        }
        echo "5eko biderketa emaitza da: " . $biderketa;

        ?>

        <h2>Ariketa 3.3 </h2>
        <?php
        
        ?>

        <h2>Ariketa 3.4 </h2>

        <?php

        ?>

        <h2> Ariketa 3.5 </h2>
        <?php
        
        ?>
    </body>
</html>