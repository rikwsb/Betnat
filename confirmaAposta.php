<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>JSP Page</title>
    <link type="text/css" rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<h1 class="title-subpage">Apostes realitzades</h1>

<table class="w3-table-all w3-card-4">
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

<div class="action-buttons container">
    <form method="POST" action="php/guardarApostesCookies.php">
        <button class="w3-button w3-ripple" type="submit" name="setCookie" value="hola" style="background-color: #29333f; color: white;">TORNAR A LES MEVES APOSTES</button>
    </form>
</div>

</body>
</html>

