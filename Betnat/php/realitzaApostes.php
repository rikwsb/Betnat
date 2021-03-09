<?php

if (isset($_POST['des'])) {
    session_destroy();
    setcookie('apostesPagades', "", 0);
    header('Location: .');
}

if (!isset($_SESSION['apostes'])) {
    $_SESSION['apostes'] = array();
}

if (isset($_POST['bet'])) {
    $bet = $_POST['bet'];
    array_push($_SESSION['apostes'], $bet);
}


