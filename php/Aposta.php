<?php


class Aposta
{

    public $idAposta;
    public $dataAposta;
    public $club1;
    public $club2;
    public $logoClub1;
    public $logoClub2;
    public $clubSeleccionat;
    public $quotaSeleccionada;
    public $quantitat;

    /**
     * Aposta constructor.
     * @param $idAposta
     * @param $dataAposta
     * @param $club1
     * @param $club2
     * @param $clubSeleccionat
     * @param $quotaSeleccionada
     */
    public function __construct($idAposta, $dataAposta, $club1, $club2, $clubSeleccionat, $quotaSeleccionada){
        $this->idAposta = $idAposta;
        $this->dataAposta = $dataAposta;
        $this->club1 = $club1;
        $this->club2 = $club2;
        $this->clubSeleccionat = $clubSeleccionat;
        $this->quotaSeleccionada = $quotaSeleccionada;
        $this->logoClub1 = "media/" . strtolower(str_replace(' ', '', $club1)) . ".png";
        $this->logoClub2 = "media/" . strtolower(str_replace(' ', '', $club2)) . ".png";

    }

    /**
     * Funcio que ens permet asignar una cantitat a l'aposta
     * @param $value
     */
    public function setQuantitat($value){
        $this->quantitat = $value;
    }

    /**
     * Metode que ens permet calcular les ganancies potencials
     * @return int
     */
    public function calculaGanancies(){
        return floatval($this->quantitat * $this->quotaSeleccionada);
    }

}