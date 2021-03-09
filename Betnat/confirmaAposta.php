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
        <th>RESULTAT APOSTAT</th>
        <th>QUOTA</th>
        <th>CANTITAT APOSTA</th>
        <th>GANANCIES POTENCIALS</th>
    </tr>
    </thead>

    <tbody>
        <?php require("php/confirmacioApostes.php"); ?>
    </tbody>

</table>

<form method="POST" action="php/guardarApostesCookies.php">
    <button type="submit" name="setCookie" value="hola">TORNAR A LES MEVES APOSTES</button>
</form>

</body>
</html>

