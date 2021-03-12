<?php

    require("php/Aposta.php");

    session_start();

    require("php/NouEvent.php");
    require("php/realitzaApostes.php");

    $events = array();

    array_push($events, new NouEvent(0, "13/08/2021", "FC Barcelona", "Real Madrid", 1.3, 2.3, 2.8));
    array_push($events, new NouEvent(1, "14/08/2021", "ARRIBA el Beti", "Espanyol", 1.4, 2.5, 2.6));
    array_push($events, new NouEvent(2, "15/08/2021", "PSG", "Manchester United", 1.7, 2.8, 2.9));
    array_push($events, new NouEvent(3, "16/08/2021", "Auron FC", "FC COCO", 2, 5, 2));

    $_SESSION['events'] = serialize($events);

    function mostrarEvents($events)
    {

        foreach ($events as $event) {
            echo "<div class='box-aposta w3-card-4'>";
            echo "<h3>" . $event->dataEvent . "</h3>";
            echo "<p>" . $event->club1 . " x " . $event->club2 . "</p>";
            echo "<div class='teams-logos'>";
            echo "<img class='logo-team1' src='" . $event->logoClub1 . "'>";
            echo "<img class='logo-team2' src='" . $event->logoClub2 . "'>";
            echo "</div>";
            echo "<div class='buttons-bet'>";
            echo "<button type='submit' name='bet' value='" . $event->idEvent . "-1'>". $event->quota1 ."</button>";
            echo "<button type='submit' name='bet' value='" . $event->idEvent . "-x'>". $event->quotax ."</button>";
            echo "<button type='submit' name='bet' value='" . $event->idEvent . "-2'>". $event->quota2 ."</button>";
            echo "</div>";
            echo "</div>";
        }


    }

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Betnat :)</title>
    <link type="text/css" rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <nav class="menu w3-card">
        <ul class="menu-list">
            <li><a href="#"><h1>BETNAT EL FERRER</h1></a></li>
            <li><a href="#"><img width="72" src="media/index.png"></a></li>
            <li><a href="#"><h2>NUMERO D'APOSTES <?php echo count($_SESSION['apostes']); ?></h2></a></li>
        </ul>
    </nav>

        <h1 class="title">PROXIMS EVENTS</h1>

        <form name="ey" action="" method="POST">
            <div class="container">

                <?php mostrarEvents($events); ?>

            </div>
        </form>

    <div class="action-buttons container">
        <form action="." method="post">
            <button class="w3-button w3-ripple w3-deep-orange" type="submit" name="des" value="true" style="background-color: #29333f; color: white;">ESBORRAR SESSIO</button>
        </form>

        <form action="realitzarApostes.php" method="POST">
            <button class="w3-button w3-ripple w3-green" type="submit" style="background-color: #29333f; color: white;">REALITZAR APOSTES</button>
        </form>
    </div>

    <div class="container">
        <div class="cookies w3-card-2 w3-container w3-margin-bottom">
            <?php
            if(isset($_COOKIE['apostesPagades'])){
                $lmao = json_decode($_COOKIE['apostesPagades']);
                echo 'APOSTES COMPLETADES: <br>';
                foreach($lmao as $galetaxd){
                    echo $galetaxd . '<br>';
                }
            }
            ?>
        </div>
    </div>

</body>
</html>