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
        <p id='result' class='responceText'></p>
            <?php $i=0 ?>            
            <?php foreach($_SESSION['challengerPair'] as $key => $value): ?>
            
            
                <div class='challengerPairs'>
                <span class='numbering'><p><--  <?= $key+1 ?>  ---  <?php echo count($_SESSION['challengerPair']) ?>  --></p></span>    
                
                <input id='imgIdBlock<?= $i ?>' type="hidden" value='<?= ${challenger . $value[0]}->getIdBlock(); ?>'>
                <button onclick='multiButton(<?= $i ?>)' class='buttonChallengers'><img class='imgChallengers' src="../img/challenger/<?= ${challenger . $value[0]}->getName(); ?>.jpg"></button>
                     
                <input id='imgIdBlock<?= $i+1 ?>' type="hidden" value='<?= ${challenger . $value[1]}->getIdBlock(); ?>'>
                <button onclick='multiButton(<?= $i+1 ?>)' class='buttonChallengers'><img class='imgChallengers' src="../img/challenger/<?= ${challenger . $value[1]}->getName(); ?>.jpg"></button>
                                                                                                                                                                

                </div>
            <?php $i+=2 ; ?>
            <?php endforeach; ?>
        </div>
        <a href="process/getPost.php">getPost</a>
    </body>
    <script src='js/jsTournament.js'></script>
</html>
<?php






?>
