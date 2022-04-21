<?php
require('apps/championShipApp/config.php');
session_start();

?>
<html>

    <head>
        <link rel="stylesheet" href="index.css">
    </head>
    
    <body>        
        <div class='navPanel'>
            <a href="championshipapp/tournament.php"><div class='navBlock'>Tournament</div></a> 
            <a href="championshipapp/scoreTable.php"><div class='navBlock'>SCORE</div></a>
            <a href="destroy.php"><div class='navBlock'>destroy</div></a>
        </div>


    </body>

    <?php require($urlMain . 'scoreTable.php'); ?>



</html>

