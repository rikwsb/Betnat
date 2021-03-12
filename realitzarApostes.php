<?php
    require('php/apostar.php');
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>JSP Page</title>
    <link type="text/css" rel="stylesheet" href="CSS/styles.css">
</head>
<body>
    <h1 class="title-subpage">Les teves apostes</h1>

    <table class="w3-table-all w3-card-4">
        <thead>
        <tr>
            <th>DATA</th>
            <th>EQUIPS</th>
            <th>EQUIP SELECCIONAT</th>
            <th>QUOTA</th>
            <th>CANTITAT</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php if(count($_SESSION['apostes']) != 0) { //Nomes mostrem les apostes si s'ha realitzat alguna
                mostrarApostar(); //Mostrem les apostes
                mostrarCombi(); //Mostrem el bloc que l'aposta combinada
            }else{
                echo "<tr><td colspan='6' style='text-align: center'>No hi ha apostes</td></tr>";
            }?>
        </tbody>

    </table>

    <div class="action-buttons container">
        <form action="index.php">
            <button class="w3-button w3-ripple" type="submit" style="background-color: #29333f; color: white;">TORNAR A L'INICI</button>
        </form>
    </div>

</body>
</html>

