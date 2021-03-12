<?php

if (isset($_POST['des'])) {
    destroyCookies();
}

if (!isset($_SESSION['apostes'])) {
    $_SESSION['apostes'] = array();
}

if (isset($_POST['bet'])) {
    $bet = $_POST['bet']; //Agafem el id a apostar
    array_push($_SESSION['apostes'], $bet); //El guardem en una sessio per procesar-ho mes tard
    unset($_POST); //Esborrem el post per assegurar-nos de que no es fa una nova aposta cada cop que carreguem la pagina
}

/**
 * Funcio que ens permet destruir totes les cookies de la pagina i la sessio
 */
function destroyCookies(){
    session_destroy(); //Destruim la sessio
    setcookie('apostesPagades', '', 1, "/Betnat/php"); //Destruim les cookies de les pagines on s'usen aquestes
    setcookie('apostesPagades', '', 1, "/Betnat");
    header('Location: .'); //Recarreguem la pagina
    unset($_POST);
    exit;
}


