<?php


class NouEvent
{
    public $idEvent;
    public $dataEvent;
    public $club1;
    public $club2;
    public $quota1;
    public $quotax;
    public $quota2;
    public $logoClub1;
    public $logoClub2;

    /**
     * NouEvent constructor.
     * @param $idEvent
     * @param $dataEvent
     * @param $club1
     * @param $club2
     * @param $quota1
     * @param $quotaX
     * @param $quota2
     */
    public function __construct($idEvent, $dataEvent, $club1, $club2, $quota1, $quotaX, $quota2){
        $this->idEvent = $idEvent;
        $this->dataEvent = $dataEvent;
        $this->club1 = $club1;
        $this->club2 = $club2;
        $this->quota1 = $quota1;
        $this->quotax = $quotaX;
        $this->quota2 = $quota2;
        $this->logoClub1 = "media/" . strtolower(str_replace(' ', '', $club1)) . ".png"; //Agafem la ruta de la imatge basant-nos en el nom del equip
        $this->logoClub2 = "media/" . strtolower(str_replace(' ', '', $club2)) . ".png"; //Unicament tenim que guardar la foto amb el nom del equip, totes les lletres en minuscula i sense espais
    }

}