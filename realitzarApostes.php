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
    <h1>Hello World!</h1>

    <table>
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
            <?php mostrarApostar(); ?>
        </tbody>

    </table>

</body>
</html>
