<?php

    require('Aposta.php');
    require('NouEvent.php');

    session_start();

    $event = unserialize($_SESSION['events']);
    $apostes = $_SESSION['apostes'];

    $apostesRealitzades = array();
    $combinada = 0;
    $clubSeleccionat = "";
    $quota = 0;
    $i = 0;

    if(isset($_POST['delete'])){
        array_remove($event, $_POST['delete']);
        $_SESSION['apostes'] = $apostes;
        unset($_POST);
    } elseif(isset($_POST['bet']))header("Location: realitzarApostes.php");

    foreach($apostes as $aS){
        $seleccio = explode('-', $aS);
        $evSe = buscarEvent($seleccio[0], $event);

        if($seleccio[1] == 1){
            $quota = $evSe->quota1;
            $clubSeleccionat = $evSe->club1;
        }elseif ($seleccio[1] == "x"){
            $quota = $evSe->quotaX;
            $clubSeleccionat = 'Empat';
        }elseif ($seleccio[1] == 2){
            $quota = $evSe->quota2;
            $clubSeleccionat = $evSe->club2;
        }

        array_push($apostesRealitzades, new Aposta($i, $evSe->dataEvent, $evSe->club1, $evSe->club2, $clubSeleccionat, $quota));
        $_SESSION['apostat'] = $apostesRealitzades;
        $i++;
    }



    function mostrarApostar(){

        global $apostesRealitzades;

        foreach($apostesRealitzades as $ap){
            echo "<tr><form action='realitzarApostes.php' method='post'>";
            echo "<td>" . $ap->dataAposta . "</td>";
            echo "<td><table><tr><td>" . $ap->logoClub1 . "</td></tr><tr><td>" . $ap->logoClub2 . "</td></tr></table></td>";
            echo "<td><table><tr><td>" . $ap->club1 . "</td></tr><tr><td>" . $ap->club2 . "</td></tr></table></td>";
            echo "<td>" . $ap->clubSeleccionat . "</td>";
            echo "<td>" . $ap->quotaSeleccionada . "</td>";
            echo "<td><input type='number' name='quantitat'></td>";
            echo "<td><button type='submit' name='bet' value='" . $ap->idAposta . "'>BET</button><button type='submit' name='delete' value='" . $ap->idAposta . "'>DEL</button></td>";
            echo "</form></tr>";
        }
    }

    function buscarEvent($id, $array){
        $eventSelected = null;

        foreach($array as $event){
            if($id == $event->idEvent){
                $eventSelected = $event;
            }
        }

        return $eventSelected;
    }

/**
 * Remove each instance of an object within an array (matched on a given property, $prop)
 * @param array $array
 * @param mixed $value
 * @param string $prop
 * @return array
 */
function array_remove($array, $idToErase)
{
    foreach($array as $ar){
        if(buscarEvent($idToErase, $array) == buscarEvent($ar->idEvent, $array)){
            unset($array->$ar);
        }
    }
}

?>









