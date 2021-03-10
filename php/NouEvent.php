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

    public function __construct($idEvent, $dataEvent, $club1, $club2, $quota1, $quotaX, $quota2){
        $this->idEvent = $idEvent;
        $this->dataEvent = $dataEvent;
        $this->club1 = $club1;
        $this->club2 = $club2;
        $this->quota1 = $quota1;
        $this->quotax = $quotaX;
        $this->quota2 = $quota2;
        $this->logoClub1 = "media/" . strtolower(str_replace(' ', '', $club1)) . ".png";
        $this->logoClub2 = "media/" . strtolower(str_replace(' ', '', $club2)) . ".png";
    }

}