<?php
    //Fitxers de les clases
    require('Aposta.php');
    require('NouEvent.php');

    session_start();

    //Aquest codi s'executa en el cas de que rebem una "peticio" d'esborrar una aposta
    if(isset($_POST['delete'])){
        $event = unserialize($_SESSION['events']); //Recuperem les dades actuals
        $aposta = $_SESSION['apostes'];
        $index = arrayRemoveAposta($event ,$aposta, $_POST['delete']); //Les procesem
        $_SESSION['apostes'] = $index; //Les sobreescribim per les procesades
        unset($_POST['delete']); //Evitem que, en el cas de que es recarregui la pagina, no es torni a enviar el mateix POST, el qual podria esborrar una aposta en cada refresh
        header("Location: realitzarApostes.php"); //Recarreguem la pagina
        exit; //Parem l'execucio del codi, ja que ens interesa recarregar la página i no seguir executant el script
    }elseif (isset($_POST['bet'])){ //En el cas de que s'hagui fet una aposta, es redirigira a la pagina corresponent
        $_SESSION['bet'] = $_POST['bet']; //Guardem les dades del post en una sessio per poder treballar amb les dades en la seguent pagina
        if(isset($_POST['quantitat'])){ //Creem persistencia amb la cantitat introduida
            $_SESSION['quantitat'] = $_POST['quantitat'];
        }
        header("Location: confirmaAposta.php");
        exit;
    }

    $event = unserialize($_SESSION['events']);
    $apostes = $_SESSION['apostes'];
    $GLOBALS['quotaCombi'] = 0;

    $apostesRealitzades = array();
    $clubSeleccionat = "";
    $quota = 0;
    $quotaTotal = 0;

    foreach($apostes as $aS){ //Recorrem totes les apostes
        $seleccio = explode('-', $aS); //Separem el id del event del id de la quota marcada
        $evSe = buscarEvent($seleccio[0], $event); //Busquem les dades del event i les recuperem

        //Busquem quina es la quota seleccionada i el equip seleccionat, i ho guardem
        if($seleccio[1] == 1){
            $quota = $evSe->quota1;
            $clubSeleccionat = $evSe->club1;
        }elseif ($seleccio[1] == "x"){
            $quota = $evSe->quotax;
            $clubSeleccionat = 'Empat';
        }elseif ($seleccio[1] == 2){
            $quota = $evSe->quota2;
            $clubSeleccionat = $evSe->club2;
        }


        $quotaTotal += floatval($quota);
        $GLOBALS['$quotaTotal'] = $quotaTotal;
        array_push($apostesRealitzades, new Aposta($aS, $evSe->dataEvent, $evSe->club1, $evSe->club2, $clubSeleccionat, $quota)); //Creem un nou objecte/aposta

        $_SESSION['apostat'] = $apostesRealitzades;
    }

    /**
     * Funcio que ens permet mostrar les apostes per html i interactuar amb aquests
     */
    function mostrarApostar(){
        global $apostesRealitzades;
        foreach($apostesRealitzades as $ap){
            echo "<tr><form action='realitzarApostes.php' method='post'>";
            echo "<td>" . $ap->dataAposta . "</td>";
            //echo "<td><table><tr><td>" . $ap->logoClub1 . "</td></tr><tr><td>" . $ap->logoClub2 . "</td></tr></table></td>";
            echo "<td><table style='margin: 0;' class='w3-table w3-bordered'><tbody><tr><td>" . $ap->club1 . "</td></tr><tr><td>" . $ap->club2 . "</td></tr></tbody></table></td>";
            echo "<td>" . $ap->clubSeleccionat . "</td>";
            echo "<td>" . $ap->quotaSeleccionada . "</td>";
            echo "<td><input class='w3-input' type='number' name='quantitat'></td>";
            echo "<td><button class='w3-button w3-green' type='submit' name='bet' value='" . $ap->idAposta . "'>BET</button><button class='w3-button w3-red' type='submit' name='delete' value='" . $ap->idAposta . "'>DEL</button></td>";
            echo "</form></tr>";
        }

    }

    /**
     * Funcio que ens permet mostrar el bloc de l'aposta combinada i interactuar amb aquest
     */
    function mostrarCombi(){
       echo "<form action='realitzarApostes.php' method='post'>
            <tr>
            <td></td>
            <td></td>
            <td>COMBINADA</td>
            <td>" . getQuotaCombinada() . "</td>
            <td><input class='w3-input' type='number' name='quantitat'></td>
            <td><button class='w3-button w3-green' type='submit' name='bet' value='combi'>BET</button></td>
            </tr>
            </form>";
    }

    /**
     * Funcio que ens permet retornar un event i consultar l'informacio d'aquest
     * @param $id Id del event a buscar
     * @param $array Array en el que buscar aquest id
     * @return mixed|null l'objecte aposta dessitjat
     */
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
 * Funcio que ens retorna un array sense l'objecte a eliminar
 * @param $arrayEvent Array on hi ha els events
 * @param $arrayApostes Array on hi ha les apostes
 * @param $idToErase Id de l'aposta que dessitgem esborrar
 * @return array
 */
function arrayRemoveAposta($arrayEvent, $arrayApostes, $idToErase)
{
    $index = array();
    foreach($arrayApostes as $ar){
        if($ar != $idToErase){
                array_push($index, $ar);
        }
    }
    return $index;
}

/**
 * @return mixed Ens permet obtenir la quota total en el cas de que es faci una aposta combinada
 */
function getQuotaCombinada(){
    return $GLOBALS['quotaTotal'];
}


?>









