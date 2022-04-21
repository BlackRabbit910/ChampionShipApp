<?php

require($urlMain . 'process/procTournament.php');

session_start();
?>

<html>

    <head>
        <link rel="stylesheet" href="<?= $urlMain ?>css/tournament.css">
    </head>
    <body>        
        <div class='challengers'>            
        <p id='result' class='responceText'></p>
            <?php $i=0 ?>            
            <?php foreach($_SESSION['challengerPair'] as $key => $value): ?>
            
            
                <div class='challengerPairs'>
                <span class='numbering'><p><--  <?= $key+1 ?>  ---  <?php echo count($_SESSION['challengerPair']) ?>  --></p></span>    
                
                <input id='imgIdBlock<?= $i ?>' type="hidden" value='<?= ${challenger . $value[0]}->getIdBlock(); ?>'>
                <button onclick='multiButton(<?= $i ?>)' class='buttonChallengers'><img class='imgChallengers' src="<?= $imgUrl ?><?= ${challenger . $value[0]}->getName(); ?>.jpg"></button>
                     
                <input id='imgIdBlock<?= $i+1 ?>' type="hidden" value='<?= ${challenger . $value[1]}->getIdBlock(); ?>'>
                <button onclick='multiButton(<?= $i+1 ?>)' class='buttonChallengers'><img class='imgChallengers' src="<?= $imgUrl ?><?= ${challenger . $value[1]}->getName(); ?>.jpg"></button>
                                                                                                                                                                

                </div>
            <?php $i+=2 ; ?>
            <?php endforeach; ?>
        </div>

    </body>
    <script src='/<?= $urlMain ?>js/jsTournament.js'></script>
</html>
<?php






?>
