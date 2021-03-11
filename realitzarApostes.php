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
        <form action='realitzarApostes.php' method='post'>
            <tr>
                <td></td>
                <td></td>
                <td>COMBINADA</td>
                <td><?php echo getQuotaCombinada(); ?></td>
                <td><input type='number' name='quantitat'></td>
                <td><button type='submit' name='bet' value='combi'>BET</button></td>
            </tr>
        </form>
        </tbody>

    </table>

</body>
</html>
