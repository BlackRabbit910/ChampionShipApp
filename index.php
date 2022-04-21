<?php
session_start();

print_r($_SESSION);
?>
<html>

    <head>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="championShipApp/css/scoreTable.css">
        <link rel="stylesheet" href="championShipApp/css/tournament.css">
    </head>
    
    <body>        
        <div class='navPanel'>
            <a href="championshipapp/tournament.php"><div class='navBlock'>Tournament</div></a> 
            <a href="championshipapp/scoreTable.php"><div class='navBlock'>SCORE</div></a>
            <a href="destroy.php"><div class='navBlock'>destroy</div></a>
        </div>


    </body>

</html>

