<?php
require('process/procScoreTable.php');

?>

<head>
    <link rel="stylesheet" href="/apps/championshipapp/css/scoreTable.css">
</head>
    
<div class='scoreTable'>

    <h1>Score Table</h1>

    <?php foreach($arrayDB as $arr): ?>


    <div class='scoreBlock'>

        <h3><?= $arr['name'] ?></h3>

        <img src="<?= $imgUrl ?><?= $arr['name'] ?>.jpg">

        <div class='scoreBlockText'>
            <span><p>Score : <?= $arr['score'] ?></p></span>
            <span><p>Call count : <?= $arr['numChoises'] ?></p></span>
        </div>

    </div>
    

    <?php endforeach; ?>

</div>

        

