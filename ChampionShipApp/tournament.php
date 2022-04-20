<?php

require('require.php');

session_start();
print_r($arrayPairs);

?>
<pre><?php print_r($challenger3);?></pre>
<?php



?>
<html>

    <head>
        <link rel="stylesheet" href="css/tournament.css">
    </head>
    <body>        
        <div class='navPanel'>
            <a href="../index.php"><div class='navBlock'>Tournament</div></a> 
            <a href="../championshipapp/scoreTable.php"><div class='navBlock'>SCORE</div></a>
            <a href="destroy.php"><div class='navBlock'>destroy</div></a>
        </div>
        <div class='challengers'>


            <div class='challengerPairs'>
                
            <button class='buttonChallengers'><img class='imgChallengers' src="../img/challenger/<?= $challenger1->getIdBlock(); ?>.jpg"></button>

            <button class='buttonChallengers'><img class='imgChallengers' src="../img/challenger/<?= $challenger2->getIdBlock(); ?>.jpg"></button>

            </div>


        </div>
    </body>
</html>
<br>
            <a href="process/procTournament.php">qweqwe</a>
<?php






?>
