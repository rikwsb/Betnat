<?php

require('Aposta.php');
session_start();

if(isset($_SESSION['apostesConfirmades'])){
    $apostesRealitzades = $_SESSION['apostesConfirmades'];

    if(isset($_COOKIE['apostesPagades'])){
        $cookie = json_decode($_COOKIE['apostesPagades']);
    } else {
        setcookie('apostesPagades', json_encode(array()));
    }

    foreach($apostesRealitzades as $ap) {
        $values = $ap->dataAposta . ", " . $ap->clubSeleccionat . ", " . $ap->quotaSeleccionada . "x" . $ap->quantitat;
        $arrayCookie = array_push($cookie, $values);
        setcookie('apostesPagades', json_encode($cookie), time() + (86400 * 30), "/Betnat");
    }

    header('Location: ../index.php');

}

