<?php

require("Aposta.php");

session_start();

$idApostaConfirmada = null;

//if(isset($_POST['bet'])){
    $apostes = $_SESSION['apostat'];
    $quantitat = $_SESSION['quantitat'];
    $idApostaConfirmada = $_SESSION['bet'];

    if($idApostaConfirmada == "combi"){

        $quotaTotal = 0;
        $quotaTotal = $_SESSION['quotaCombi'];

        foreach($apostes as $ap){ //En el cas de que sigui combinada, agafem totes les apostes i les procesem
            $apostaSeleccionada = buscarAposta($ap->idAposta, $apostes); //Seleccionem l'aposta (objecte)
            $apostaSeleccionada->setQuantitat(floatval(round(($quantitat / count($apostes)), 1, PHP_ROUND_HALF_UP))); //L'assignem la quantitat al objecte i redondejem el primer decimal per evitar mostrar 20 numeros decimals
            guardaAposta($apostaSeleccionada);
            mostrarApostat($apostaSeleccionada);
        }
        combinada($quantitat, $quotaTotal);
    } else {
        $apostaSeleccionada = buscarAposta($idApostaConfirmada, $apostes);
        $apostaSeleccionada->setQuantitat($quantitat);
        guardaAposta($apostaSeleccionada);
        mostrarApostat($apostaSeleccionada);
    //}
}

/**
 * Funcio que ens permet mostrar les apostes confirmades per HTML
 * @param $ap
 */
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

/**
 * Metode que ens permet mostrar el bloc de la combinada per HTML
 * @param $total
 * @param $quota
 */
function combinada($quantitat, $quota){
    $ganancies = $quota * $quantitat;
    echo '<tr class="w3-dark-grey">';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td>COMBINADA</td>';
    echo '<td>' . $quota . '</td>';
    echo '<td>' . $quantitat . '</td>';
    echo '<td>' . $ganancies . '</td>';
    echo '</tr>';
}

/**
 * Metode que ens permet buscar un objecte de tipus Aposta i retornar-lo
 * @param $id
 * @param $array
 * @return mixed|null
 */
function buscarAposta($id, $array){
    $betSelected = null;

    foreach($array as $bet){
        if($id == $bet->idAposta){
            $betSelected = $bet;
        }
    }

    return $betSelected;
}

/**
 * Metode que ens permet guardar les apostes confirmades
 * @param $aposta
 */
function guardaAposta($aposta){
    if(!isset($_SESSION['apostesConfirmades'])){
        $_SESSION['apostesConfirmades'] = array();
    }
    array_push($_SESSION['apostesConfirmades'], $aposta);
}