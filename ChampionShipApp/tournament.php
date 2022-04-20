<?php

require('require.php');

session_start();


?>
<!-- <pre><?php print_r($challenger3);?></pre> -->
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
            <?php foreach($_SESSION['challengerPair'] as $key => $value): ?>
            <?php echo $value;?>
            <?php ?>
            <?php ?>            
                <span class='numbering'><p><--  <?= $key+1 ?>  ---  <?php echo count($_SESSION['challengerPair']) ?>  --></p></span>
                <div class='challengerPairs'>
                    
                                                                                                                                                                
                <button class='buttonChallengers'><img class='imgChallengers' src="../img/challenger/<?= ${challenger . $value[0]}->getName(); ?>.jpg"></button>
                                                                                                                                                                
                <button class='buttonChallengers'><img class='imgChallengers' src="../img/challenger/<?= ${challenger . $value[1]}->getName(); ?>.jpg"></button>
                                                                                                                                                                

                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>
<br>
            <a href="process/procTournament.php">qweqwe</a>
<?php






?>
