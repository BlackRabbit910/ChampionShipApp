<?php
require('require.php');

?>
<html>

    <head>
        <link rel="stylesheet" href="css/tournament.css">
    </head>
    <body>
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

<pre>
    <?php
        print_r($linkDB);
    ?>
</pre>