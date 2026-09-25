<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ariketa 1</title>
    </head>
    <body>
        
       <!-- Zure kodea hemen -->
        <h1>Ariketa 1 </h1>
        <h2>Ariketa 1.1</h2>
        
        <?php

            //Zenbaki bat biztaratu:
            $zenbaki = 15;

            echo "Nire zenbakia: ".$zenbaki;

        ?>



        <h2>Ariketa 1.2</h2>
        <?php
            if($zenbaki < 10){
            echo "Zure zenbakia txikia da";
            } else { 
            echo "zure zenbakia handia da";
            }
        ?>

        <h2>Ariketa 1.3 </h2>
        <?php
        
        //Erosketa kopurua zebakiarekin balioztatu
        $erosketa = $zenbaki;
        
        //if buklea egin 
         if($erosketa > 10 ){
            echo "erosketa gehiegia";
         } else{
            echo "erosketa onargarria";
         }
        ?>

        <h2>Ariketa 1.4 </h2>

        <?php
        //Kontua blokeatu pin 

        $pin = 123;
        $pintxarra = 1234;

        //iff buklea egin 

        if($pin == $pintxarra){
            echo "pin ona !";
        } else {
            echo "pin okerra ";
        }

        ?>

        <h2> Ariketa 1.5 </h2>
        <?php
        
        $baimendutako_mezua ="Gure lokalera sartu ahal zara ";
        $adina = 18;
        $ezinezko_mezua = "ezin zara sartu";

        if ($adina > 20 ){
            echo "$baimendutako_mezua";
        }else{
            echo "$ezinezko_mezua";
        }
        ?>
    </body>
</html>
