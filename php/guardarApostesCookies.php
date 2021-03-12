<?php

require('Aposta.php');
session_start();

if(isset($_SESSION['apostesConfirmades'])){
    $apostesRealitzades = $_SESSION['apostesConfirmades']; //Recuperem les apostes confirmades
    $cookie = array();

    if(isset($_COOKIE['apostesPagades'])){
        $cookie = json_decode($_COOKIE['apostesPagades']); //Recuperem les apostes confirmades anteriorment
//        setcookie('apostesPagades', json_encode(array()));
    }

    foreach($apostesRealitzades as $ap) { //Guardem les noves apostes en les cookies corresponents
        $values = $ap->dataAposta . ", " . $ap->clubSeleccionat . ", " . $ap->quotaSeleccionada . "x" . $ap->quantitat;
        array_push($cookie, $values);
    }

    //"Settegem" les cookies
    setcookie('apostesPagades', json_encode($cookie), time() + (86400 * 30)); //Aquesta afecta a la pagina realitzarApostes.php
    setcookie('apostesPagades', json_encode($cookie), time() + (86400 * 30), "/Betnat"); //Aquesta afecta a la pagina inicial

}

header('Location: ../index.php');

