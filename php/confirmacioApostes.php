<?php

require("Aposta.php");

session_start();

$idApostaConfirmada = null;

//if(isset($_POST['bet'])){
    $apostes = $_SESSION['apostat'];
    $quantitat = $_SESSION['quantitat'];
    $idApostaConfirmada = $_SESSION['bet'];

    if($idApostaConfirmada == "combi"){
        foreach($apostes as $ap){
            $apostaSeleccionada = buscarAposta($ap->idAposta, $apostes);
            $apostaSeleccionada->setQuantitat($quantitat);
            guardaAposta($apostaSeleccionada);
            mostrarApostat($apostaSeleccionada);
        }
    } else {
        $apostaSeleccionada = buscarAposta($idApostaConfirmada, $apostes);
        $apostaSeleccionada->setQuantitat($quantitat);
        guardaAposta($apostaSeleccionada);
        mostrarApostat($apostaSeleccionada);
    //}
}

function mostrarApostat($ap){

    echo "<tr>";
    echo "<td>" . $ap->dataAposta . "</td>";
    echo "<td><table><tr><td>" . $ap->club1 . "</td></tr><tr><td>" . $ap->club2 . "</td></tr></table></td>";
    echo "<td>" . $ap->clubSeleccionat . "</td>";
    echo "<td>" . $ap->quotaSeleccionada . "</td>";
    echo "<td>" . $ap->quantitat . "</td>";
    echo "<td>" . $ap->calculaGanancies() . "</td>";
    echo "</tr>";
}

function buscarAposta($id, $array){
    $betSelected = null;

    foreach($array as $bet){
        if($id == $bet->idAposta){
            $betSelected = $bet;
        }
    }

    return $betSelected;
}

function guardaAposta($aposta){
    $_SESSION['apostesConfirmades'] = array();
    array_push($_SESSION['apostesConfirmades'], $aposta);
}